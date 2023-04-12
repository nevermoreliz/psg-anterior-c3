<?php defined('BASEPATH') or exit('No direct script access allowed');
/** 
 * Institucion: Unidad de Posgrado
 * Sistema: 
 * Módulo: Requisito tramite
 * Descripcion: Controlador del módulo de Requisito tramite
 * Fecha: 18/08/2020
 */
class Requisito_tramite extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('requisito_tramite_model');
        // $this->load->helper('form');
    }
    /**
     * Descripción  : 
     * esta funcion index se encarga de mostrar 
     * la pagina por defecto lista de requisito tramite
     */
    public function index()
    {
        if ($this->input->is_ajax_request()) {
            $this->data['listar_tramite'] = $this->listar_tramite_html()->final_output;
            // var_dump($this->data['listar_tramite']);
            // exit();
            // $lista_tramite = array();
            // $lista_requisitos = $this->requisito_tramite_model->listar_requisito();
            // if (!empty($lista_requisitos)) {
            //     foreach ($lista_requisitos as $lista_requisitos_fila) {
            //         $id_requisito = $lista_requisitos_fila['id_requisito'];
            //         $listar_requisito_tramite = $this->requisito_tramite_model->listar_requisito_tramite($id_requisito);
            //         //echo print_r($listar_requisito_tramite).'<br><br><br><br><br>'; 
            //         $lista_tramite[$id_requisito] = $listar_requisito_tramite;
            //     }
            // }
            // $this->data['lista_requisitos'] = $lista_requisitos;
            // $this->data['lista_tramite'] = $lista_tramite;
            $this->templater->view_horizontal_admin('/requisito_tramite/listar_requisito_tramite', $this->data);
        }
    }
    public function listar_tramite_html()
    {
        $listar_tramite = $this->requisito_tramite_model->listar_tramite();
        $color = $this->color_html();
        $x = 0;
        $html = '<div class="demo-radio-button">';
        foreach ($listar_tramite as $listar_tramite_fila) {
            $html .= '
            <input name="nombre_tramite" value="' . $listar_tramite_fila['id_tramite'] . '" type="radio" id="radio_' . $x . '" class="with-gap radio-col-' . $color[$x] . '" checked="">
            <label class="small" for="radio_' . $x . '">' . $listar_tramite_fila['tipo_tramite'] . ' >' . $listar_tramite_fila['nombre_tramite'] . '</label>
                <hr>
            ';
            $x++;
        }
        $html .= '</div>';
        return $this->output->set_content_type('text/html')->set_output($html);
    }
    public function color_html()
    {
        return array(
            0 => 'red',
            1 => 'orange',
            2 => 'purple',
            3 => 'black',
            4 => 'indigo',
            5 => 'blue',
            6 => 'grey',
            7 => 'cyan',
            8 => 'teal',
            9 => 'green',
            10 => 'lime',
            11 => 'yellow',
            12 => 'amber',
            13 => 'brown'


        );
    }
    public function listar_requisito()
    {
        if ($this->input->is_ajax_request()) {
            //var_dump($id_tramite);exit;
            //echo '<script>alert('.$id_tramite.');</script>';

            $table = 'psg_requisito';
            $primaryKey = 'id_requisito';
            $columns = array(
                array('db' => 'id_requisito', 'dt' => 0),
                array('db' => 'descripcion_requisito', 'dt' => 3),
                // array('db' => 'estado_requisito', 'dt' => 4)
            );
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)));

            /*  $buscar = [];
            if ($this->input->get('id_tramite') != '') {
                $buscar['id_requisito'] = $this->input->get('id_tramite');
            }
            
        
            $this->db->where("id_requisito = ".$this->input->get('id_tramite'));
            $this->db->get_where('psg_requisito', $buscar);


            $table = 'psg_requisito';
            $primaryKey = 'id_requisito';
            $where =  (substr($this->db->last_query(), strpos($this->db->last_query(), 'WHERE') + 6));
           $columns = array(
            array('db' => 'id_requisito', 'dt' => 0),
            array('db' => 'descripcion_requisito', 'dt' => 2),
            array('db' => 'estado_requisito', 'dt' => 3)
        );
            $sql_details = array('user' => $this->db->username, 'pass' => $this->db->password, 'db' => $this->db->database, 'host' => $this->db->hostname);
            $this->output->set_content_type('application/json')->set_output(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        
        */
        }
    }
    public function verificar_requisito()
    {
        $id_tramite = $this->input->post('id_tramite');
        $id_requisito = $this->input->post('id_requisito');
        $listar_requisito_tramite = $this->requisito_tramite_model->listar_requisito_tramite($id_requisito, $id_tramite);
        // Linea cambiada por esta otra
        // echo json_encode($listar_requisito_tramite);

        $this->output->set_content_type('application/json')->set_output(json_encode($listar_requisito_tramite));
    }
    public function registrar_requisito_tramite()
    {
        if ($this->input->is_ajax_request()) {
            $id_tramite = $this->input->post('id_tramite');
            $id_requisito = $this->input->post('id_requisito');
            $tipo_requisito = $this->input->post('tipo_requisitos');
            $estado = $this->input->post('estado');

            $listar_requisito_tramite = $this->requisito_tramite_model->listar_requisito_tramite($id_requisito, $id_tramite);
            if (!empty($listar_requisito_tramite)) {
                //echo json_encode((object)array('checked' => true));

                if (!empty($estado)) {
                    $this->requisito_tramite_model->psg_requisito_tramite(
                        'update',
                        array(
                            'id_tramite' => $id_tramite,
                            'id_requisito' => $id_requisito,
                        ),
                        array(
                            'tipo_requisito' => $tipo_requisito,
                            'estado_requisito_tramite' => 'REGISTRADO',

                        )
                    );
                } else {
                    $this->requisito_tramite_model->psg_requisito_tramite(
                        'update',
                        array(
                            'id_tramite' => $id_tramite,
                            'id_requisito' => $id_requisito,
                        ),
                        array(
                            'tipo_requisito' => $tipo_requisito,
                            'estado_requisito_tramite' => 'ELIMINADO',

                        )
                    );
                }
            } else {
                $id_requisito_tramite = $this->requisito_tramite_model->psg_requisito_tramite(
                    'insert',
                    null,
                    array(
                        'id_tramite' => $id_tramite,
                        'id_requisito' => $id_requisito,
                        'tipo_requisito' => $tipo_requisito,
                        'descripcion_requisito_tramite' => '',
                        'estado_requisito_tramite' => 'REGISTRADO',
                    )
                );
            }
            //echo json_encode((object)array('checked' => $id_tramite,'id_requisito' => $id_requisito,'estado' => $estado));
        }
    }
    public function nuevo_tramite()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->helper(array('form', 'url'));
            $this->templater->view_horizontal_admin('requisito_tramite/campos_tramite', $this->data);
        }
    }
    public function insertar_tramite()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tipo_tramite', 'Tipo Tramite', 'required|max_length[250]');
            $this->form_validation->set_rules('nombre_tramite', 'Nombre Tramite', 'required|max_length[100]');
            $this->form_validation->set_rules('costo_tramite', 'Costo Tramite', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $correcto = $this->requisito_tramite_model->insertar_nuevo_tramite(
                    'insert',
                    null,
                    [
                        'tipo_tramite' => $this->input->post('tipo_tramite'),
                        'nombre_tramite' => $this->input->post('nombre_tramite'),
                        'costo_tramite' => $this->input->post('descripcion_tramite'),
                        'id_usuario' => $this->input->cookie('id_usuario'),
                        'estado_tramite' => 'REGISTRADO'
                    ]
                );
                if (is_numeric($correcto))
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $correcto]));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al insetar el Programa (' . $correcto . ').']));
            }
        }
    }
    public function insertar_requisito()
    {
        if ($this->input->is_ajax_request()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tipo_tramite', 'Tipo Tramite', 'required|max_length[250]');
            $this->form_validation->set_rules('nombre_tramite', 'Nombre Tramite', 'required|max_length[100]');
            $this->form_validation->set_rules('costo_tramite', 'Costo Tramite', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('error' => validation_errors())));
            } else {
                $correcto = $this->requisito_tramite_model->insertar_nuevo_tramite(
                    'insert',
                    null,
                    [
                        'tipo_tramite' => $this->input->post('tipo_tramite'),
                        'nombre_tramite' => $this->input->post('nombre_tramite'),
                        'costo_tramite' => $this->input->post('descripcion_tramite'),
                        'id_usuario' => $this->input->cookie('id_usuario'),
                        'estado_tramite' => 'REGISTRADO'
                    ]
                );
                if (is_numeric($correcto))
                    $this->output->set_content_type('application/json')->set_output(json_encode(['exito' => $correcto]));
                else
                    $this->output->set_content_type('application/json')->set_output(json_encode(['error' => 'Error al insetar el Programa (' . $correcto . ').']));
            }
        }
    }
}
