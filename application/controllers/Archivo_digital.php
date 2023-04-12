<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author: Team PSG
 * Institucion: Posgrado
 * Sistema: PSG
 * Módulo: Persona
 * Descripcion: El objetivo de este controlador es: Realizar respaldos digitales del personal de Posgrado.
 **/

use setasign\Fpdi\Fpdi;

class Archivo_digital extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('archivo_digital_model');
        $this->ruta_carpeta_vista = '/archivo_digital/archivo_digital_';
        $this->ruta_carpeta_vista_json = '/archivo_digital/archivo_digital_';
        $this->pdf = new FPDF();
    }
    public function index()
    {
        $tipos_respaldo_persona =  [];
        foreach ($this->archivo_digital_model->tipo_respaldo('select') as $key => $value) {
            $documento_presentado_persona = ['respaldos' => $this->archivo_digital_model->documento_presentado_persona('select', ['id_tipo_respaldo' => $value->id_tipo_respaldo, 'id_persona' => $this->input->post('id_persona')])];
            $tipos_respaldo_persona[] =  (object)array_merge((array)$value, (array)$documento_presentado_persona);
        }
        $this->data['tipos_respaldo'] = $tipos_respaldo_persona;
        $this->data['ci'] = $this->input->post('ci');
        $this->data['id_persona'] = $this->input->post('id_persona');
        $this->vista('listar', $this->data);
    }
    public function archivo_digital_imprimir()
    {
        if ($this->input->is_ajax_request()) {
            $tipos_respaldo_persona =  [];
            foreach ($this->archivo_digital_model->tipo_respaldo('select') as $key => $value) {
                $documento_presentado_persona = ['respaldos' => $this->archivo_digital_model->documento_presentado_persona('select', ['id_tipo_respaldo' => $value->id_tipo_respaldo, 'id_persona' => $this->input->post('id_persona')])];
                $tipos_respaldo_persona[] =  (object)array_merge((array)$value, (array)$documento_presentado_persona);
            }

            require_once APPPATH . '/controllers/Reportes/Reporte_archivo_digital.php';
            $reporte = new Reporte_archivo_digital();
            $this->output->set_content_type('application/pdf')->set_output('data:application/pdf;base64,' . base64_encode($reporte->imp($tipos_respaldo_persona)));
        }
    }
    public function archivo_digital_guardar()
    {
        $tipo_respaldo = $this->archivo_digital_model->tipo_respaldo('select', ['id_tipo_respaldo' => $this->input->get('id_tipo_respaldo')]);
        $ruta = "img/respaldo_digital/{$this->input->get('ci')}";
        if (!file_exists($ruta)) {
            if (!mkdir($ruta, 0777, true)) {
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => "No se puede crear una carpeta con el CI {$this->input->get('ci')}"]));
                exit;
            }
        }
        $configuraciones =  array(
            'allowed_types' => 'pdf',
            'max_size' => $tipo_respaldo[0]->tamano * 1024,
            'file_name' => "{$tipo_respaldo[0]->nombre_corto}_" . time() . "_" . date("Y-m-d H-i-s")

        );
        $archivos_subidos = $this->subir_archivos_multipes($ruta, $configuraciones, 'archivo', $_FILES['archivo']);
        if (is_array($archivos_subidos)) {
            if (!copy($archivos_subidos[0]['full_path'], "{$archivos_subidos[0]['file_path']}backup.pdf")) {
                $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al intentar copear']));
            }
            $cadena = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dBATCH -sOutputFile=\"{$archivos_subidos[0]['full_path']}\" \"{$archivos_subidos[0]['file_path']}backup.pdf\"";
            shell_exec($cadena);
            unlink("{$archivos_subidos[0]['file_path']}backup.pdf");
            switch ($this->input->get('accion')) {
                case 'insertar':
                    foreach ($archivos_subidos as $key => $value) {
                        $id_documento_presentado_persona = $this->archivo_digital_model->documento_presentado_persona('insert', null, [
                            'id_persona' => $this->archivo_digital_model->persona('select', ['ci' => $this->input->get('ci')])[0]->id_persona,
                            'id_tipo_respaldo' => $this->input->get('id_tipo_respaldo'),
                            'ruta_documento' => $ruta . '/' . $value['file_name'],
                            'fecha_vencimiento' => $this->input->get('fecha_vencimiento'),
                            'fecha_presentacion' => date("Y-m-d H:i:s"),
                            'id_usuario' => $this->data['usuario']['id_persona'],
                            'estado' => 'REGISTRADO'
                        ]);
                        is_numeric($id_documento_presentado_persona)
                            ? $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => true, 'id_documento_presentado_persona' => $id_documento_presentado_persona, 'ext' => $value['file_ext']]))
                            : $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El archivo no se guardo' . $id_documento_presentado_persona]));
                    }
                    break;
                case 'adjuntar':
                    try {
                        $documento_presentado_persona = $this->archivo_digital_model->documento_presentado_persona('select', ['id_documento_presentado_persona' => $this->input->get('id_documento_presentado_persona')]);
                        $pdf = new Fpdi();
                        $pdfs_juntar = [$documento_presentado_persona[0]->ruta_documento, $ruta . '/' . $archivos_subidos[0]['file_name']];

                        foreach ($pdfs_juntar as $file) {
                            $pageCount = $pdf->setSourceFile($file);
                            for ($i = 0; $i < $pageCount; $i++) {
                                $tpl = $pdf->importPage($i + 1, '/MediaBox');
                                $pdf->addPage();
                                $pdf->useTemplate($tpl);
                            }
                        }
                        unlink($ruta . '/' . $archivos_subidos[0]['file_name']);
                        $pdf->Output('F', $documento_presentado_persona[0]->ruta_documento);
                        $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => true]));
                    } catch (Exception $e) {
                        $this->output->set_content_type('application/json')->set_output(json_encode(['error' =>  $e->getMessage()]));
                    }
                    break;
                case 'reemplazar':
                    foreach ($archivos_subidos as $key => $value) {
                        $documento_presentado_persona = $this->archivo_digital_model->documento_presentado_persona('update', ['id_documento_presentado_persona' => $this->input->get('id_documento_presentado_persona')], [
                            'ruta_documento' => $ruta . '/' . $value['file_name'],
                            'fecha_vencimiento' => $this->input->get('fecha_vencimiento'),
                            'fecha_presentacion' => date("Y-m-d H:i:s"),
                            'id_usuario' => $this->data['usuario']['id_persona'],
                            'estado' => 'REGISTRADO'
                        ]);
                        ($documento_presentado_persona) == true
                            ? $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => true, 'documento_presentado_persona' => $documento_presentado_persona, 'ext' => $value['file_ext']]))
                            : $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'El archivo no se reemplazo' . $documento_presentado_persona]));
                    }
                    break;
            }
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(['error' => $archivos_subidos]));
        }
    }
}
