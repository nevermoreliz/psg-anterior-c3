<?php defined('BASEPATH') or exit('No direct script access allowed');

class Coordinador extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('coordinador_model');
    }

    public function index()
    {
        // var_dump($this->input->post('filtro'));
        // exit();

        $this->data['titulo'] = 'Programas publicados para Información e Inscripción';
        // echo '<pre>';
        // var_dump($this->usuario['id_persona']);
        // echo '</pre>';
        // exit();

        $programas_coordinador = $this->sql_psg->listar_tabla('psg_grupo_usuario', ['id_persona' => $this->usuario['id_persona'], 'id_grupo' => 10], null, 'row');

        // echo '<pre>';
        // var_dump($programas_coordinador->publicaciones);
        // echo '</pre>';
        // exit();

        // $this->data['publicaciones'] = $this->coordinador_model->datos_publicaciones(es(array('SUPERADMIN', 'ADMINISTRADOR')) ? TRUE : $programas_coordinador->publicaciones)->result();
        // echo '<pre>';
        // var_dump($this->data['publicaciones']);
        // echo '</pre>';
        // exit();


        if ($this->input->post('filtro') == NULL) {
            $this->data['publicaciones'] = $this->coordinador_model->datos_publicaciones(es(array('SUPERADMIN', 'ADMINISTRADOR')) ? TRUE : $programas_coordinador->publicaciones, "vp.estado_publicacion='PUBLICADO' or vp.estado_publicacion='INFORMACIONES' ")->result();
        } elseif ($this->input->post('filtro') == 'Ambos') {
            $this->data['publicaciones'] = $this->coordinador_model->datos_publicaciones(es(array('SUPERADMIN', 'ADMINISTRADOR')) ? TRUE : $programas_coordinador->publicaciones, "vp.estado_publicacion='PUBLICADO' or vp.estado_publicacion='INFORMACIONES' or vp.estado_publicacion='FINALIZADO'")->result();
        } elseif ($this->input->post('filtro') == 'Finalizados') {
            $this->data['publicaciones'] = $this->coordinador_model->datos_publicaciones(es(array('SUPERADMIN', 'ADMINISTRADOR')) ? TRUE : $programas_coordinador->publicaciones, ['vp.estado_publicacion' => 'FINALIZADO'])->result();
        } elseif ($this->input->post('filtro') == 'Vigentes') {
            $this->data['publicaciones'] = $this->coordinador_model->datos_publicaciones(es(array('SUPERADMIN', 'ADMINISTRADOR')) ? TRUE : $programas_coordinador->publicaciones, "vp.estado_publicacion='PUBLICADO' or vp.estado_publicacion='INFORMACIONES' ")->result();
        }

        // $this->data['publicaciones'] = $this->coordinador_model->datos_publicaciones(es(array('SUPERADMIN', 'ADMINISTRADOR')) ? TRUE : $programas_coordinador->publicaciones)->result();

        // echo '<pre>';
        // var_dump($this->data['publicaciones']);
        // echo '</pre>';
        // exit();

        $this->data['gestion_vigente'] = $this->sql_psg->listar_tabla('gestion', ['estado_gestion' => 'ACTIVO'], 'id_gestion desc', 'row');
        // echo '<pre>';
        // var_dump($this->data['gestion_vigente']);
        // echo '</pre>';
        // exit;

        $this->data['filtro'] = $this->input->post('filtro');
        $this->templater->view('coordinador/index', $this->data);
    }

    public function publicacion_excel($id_publicacion)
    {
        $publicacion = $this->coordinador_model->datos_publicaciones($id_publicacion)->row();
        // echo '<pre>';
        // var_dump($publicacion);
        // echo '</pre>';
        // exit();

        $this->load->model('marketing_model');
        // $persona_inscrita = $this->marketing_model->persona_inscrita(['id_planificacion_programa' => $publicacion->id_planificacion_programa]);
        // echo '<pre>';
        // var_dump($persona_inscrita);
        // echo '</pre>';
        // exit();

        $preinscritos = $this->coordinador_model->datos_preinscritos($publicacion->id_publicacion)->result();
        // echo '<pre>';
        // var_dump($preinscritos);
        // echo '</pre>';
        // exit();

        $inscrito_array = [];
        foreach ($preinscritos as $preinscrito) {

            $archivos_inscripcion = [];
            foreach (['CI_ANVERSO', 'CI_REVERSO', 'DEPOSITO_CUOTA_INICIAL', 'DEPOSITO_MATRICULA', 'DIPLOMA'] as $key => $value) {
                $archivo = $this->marketing_model->listar_archivo_inscripcion(
                    ['i.id_inscripcion' => $preinscrito->id_inscripcion, 'm.etiqueta' => $value],
                    ['m.estado_archivo', ['ELIMINADO']],
                    'row'
                );
                $archivos_inscripcion[$value] = empty($archivo) ? null : $archivo;
                // echo '<pre>';
                // var_dump($archivo);
                // var_dump($this->db->last_query());
                // echo '</pre>';
            }

            $inscrito_array[] = array_merge((array)$preinscrito, $archivos_inscripcion);
        }

        // exit;
        // echo '<pre>';
        // var_dump($inscrito_array);
        // echo '</pre>';
        // exit;

        $this->load->library('psg_preinscritos_excel');
        $this->psg_preinscritos_excel->publicacion_excel($inscrito_array, $publicacion->descripcion_grado_academico . ' EN ' . $publicacion->nombre_programa . '|' . $publicacion->nombre_tipo_programa . ' VERSIÓN ' . $publicacion->numero_version . ' SEDE: ' . $publicacion->denominacion_sede);
    }

    function publicacion_pdf($id_publicacion)
    {
        $this->load->library('reportes_inscritos_programa');
        $this->reportes_inscritos_programa->imprimir_formularios(array($id_publicacion));
    }
}
