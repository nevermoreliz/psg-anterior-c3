<?php defined('BASEPATH') or exit('No direct script access allowed');

class PSG_Controller extends CI_Controller
{
    protected $usuario;
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->usuario = autentificado();
        if (!$this->usuario) {
            $this->session->set_flashdata('info', 'Escriba su Nombre de Usuario y su Clave de Acceso, para verificar su identidad.');
            redirect(base_url('login'));
        }
        $this->data['usuario'] = $this->usuario;
        $this->data['accesos'] = (new Auth_model)->datos_usuario($this->input->cookie('id_persona', TRUE), TRUE);
        /** 
         * agregado por jhonatan 
         * descripcion: si el usuario no tiene datos llenados
         * */

        if (es(array('DOCENTE_POSGRADO', 'POSGRADUANTE'))) {
            $this->data['datos_del_participante'] = esta_completo_datos_participante($this->usuario['id_persona']);
        }

        setlocale(LC_TIME, 'es_BO.0utf8');
    }

    function date_valid($date, $fecha_pasada = null)
    {
        // echo $fecha_pasada;
        // exit;
        $d = DateTime::createFromFormat('Y-m-d', $date);

        // comprueba si es un formato de fecha valida
        if ($d && $d->format('Y-m-d') === $date) {
            if ($fecha_pasada != null) {
                switch ($fecha_pasada) {
                    case 'f_pasada':
                        if ($this->fecha_mayor_10_anios($date)) {
                            $this->form_validation->set_message('date_valid', 'El campo {field} no puede pasar de 10 años');
                            return false;
                        }else{
                            return true;
                        }
                        return true;
                        break;
                    case 'f_nacimiento':
                        if ($this->fecha_nacimiento($date)) {
                            return true;
                        } else {
                            $this->form_validation->set_message('date_valid', '{field}: Ud. debe ser mayor a 18 años');
                            return false;
                        }
                        break;
                    case 'f_deposito':
                        ////caso: para controlar que las fechas de depostio no acepte fechas futuras
                        if ($this->fecha_pasada($date)) {
                            return true;
                        } else {
                            $this->form_validation->set_message('date_valid', 'El campo {field} no acepta fechas futuras');
                            return false;
                        }
                        break;
                }
            } else {
                if ($this->fecha_pasada($date)) {
                    $this->form_validation->set_message('date_valid', 'El campo {field} es una fecha pasada');
                    return false;
                } else {
                    if ($this->fecha_mayor_10_anios($date)) {
                        $this->form_validation->set_message('date_valid', 'El campo {field} no puede pasar de 10 años');
                        return false;
                    }
                }
                return true;
            }
            return true;
        } else {
            $this->form_validation->set_message('date_valid', 'El campo {field} no es una fecha válida' . $date);
            return false;
        }
    }
    public function fecha_pasada($date)
    {
        //comprueba si no es una fecha pasada
        if ($date < date('Y-m-d')) {
            return true;
        } else {
            return false;
        }
    }
    public function fecha_mayor_10_anios($date)
    {
        //comprueba si la fecha no pasa de los 10 años
        if ($date > (date('Y-m-d', strtotime(date('Y-m-d') . "+ 10 year")))) {
            return true;
        } else {
            return false;
        }
    }
    public function fecha_nacimiento($date)
    {
        //comprueba si la fecha de nacimiento es menor a 18 años atras
        if ($date <= (date('Y-m-d', strtotime(date('Y-m-d') . "- 18 year")))) {
            return true;
        } else {
            return false;
        }
    }
    public function fecha_matricula($date)
    {
        //comprueba que la fecha de deposito no pase de 1 año atras
    }
    public function file_check($str, $param)
    {
        $param = preg_split('/,/', $param);
        $file_name = $param[0];
        if (!empty($_FILES[$file_name]['name'])) {
            if (isset($_FILES[$file_name]['name']) && $_FILES[$file_name]['name'] != "") {
                if (in_array(pathinfo($_FILES[$file_name]['name'], PATHINFO_EXTENSION), explode(' ', $param[2]))) {
                    return true;
                } else {
                    $this->form_validation->set_message('file_check', 'El archivo ' . pathinfo($_FILES[$file_name]['name'], PATHINFO_FILENAME) . ' debe pertenecer a una de estas extensiones ' . $param[2]);
                    return false;
                }
            }
        } else {
            $this->form_validation->set_message('file_check', 'Seleccione un archivo ' . $param[1]);
            return false;
        }
        var_dump(pathinfo($_FILES[$file_name]['name'], PATHINFO_EXTENSION));
    }

    //TODO: metodo para llamar una vista atravez de ajax : vista('verbo', 'datos');
    //TODO: ejemplo: vista('listar',$this->data)
    //TODO: el primer parametro se concatena con una variable global $ruta_carpeta_vista.verbo
    public function vista($verbo = null, $data = null)
    {
        $this->templater->view_horizontal_admin($this->ruta_carpeta_vista . $verbo, $data);
    }

    //TODO: metodo para llamar una vista atravez de json : json(array,verbo,datos) 
    //TODO: ejemplo: json(['exito' => true],'listar',$this->data)
    //TODO: el segundo parametro se concatena con una variable global $ruta_carpeta_vista_json.verbo
    function json($array_mensaje = null, $verbo = null, $data = null)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode(array_merge(['vista' => $this->templater->view_horizontal_admin($this->ruta_carpeta_vista_json . $verbo, $data)], $array_mensaje)));
    }

    //TODO: metodo para verificar si es ajax 
    //TODO: si no es ajax redicciona al inicio 
    public function is_ajax()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url('/auth/terminar'));
        }
    }

    /**
     * Descripción de la funcion  : Se encarga de subir multiples archivos al servidor
     * Descripción de los parametros :
     * ruta                 : directorio donde se almacenara los archivos ejemplo("img/uploads") 
     * configuraciones		: las configuraciones como ser path,size, etc y tiene que estar en un array.
     * nombre_input_file    : el nombre que se le asigno al atributo "name=nombre[]" de un input de tipo * file
     * archivos             : aqui el array que contiene el $_FILES['nombre_input_file']
     */
    public function subir_archivos_multipes($ruta, $configuraciones, $nombre_input_file, $archivos)
    {
        $this->load->library('upload', $configuraciones);

        $archivos_subidos = array();
        $archivos_erroneos = '';
        if (is_array($archivos['name'])) {
            $files = count($archivos['name']);
            for ($i = 0; $i < $files; $i++) {

                $_FILES[$nombre_input_file]['name'] = $archivos['name'][$i];
                $_FILES[$nombre_input_file]['type'] = $archivos['type'][$i];
                $_FILES[$nombre_input_file]['tmp_name'] = $archivos['tmp_name'][$i];
                $_FILES[$nombre_input_file]['error'] = $archivos['error'][$i];
                $_FILES[$nombre_input_file]['size'] = $archivos['size'][$i];
                $configuraciones['upload_path'] = $ruta;

                $this->upload->initialize($configuraciones);
                if ($this->upload->do_upload($nombre_input_file)) {
                    $archivos_subidos[] = $this->upload->data();
                } else {
                    $archivos_erroneos .= strip_tags($this->upload->display_errors()) . '<br>' . $archivos['name'][$i] . '</b><br>';
                }
            }
        } else {
            $_FILES[$nombre_input_file]['name'] = $archivos['name'];
            $_FILES[$nombre_input_file]['type'] = $archivos['type'];
            $_FILES[$nombre_input_file]['tmp_name'] = $archivos['tmp_name'];
            $_FILES[$nombre_input_file]['error'] = $archivos['error'];
            $_FILES[$nombre_input_file]['size'] = $archivos['size'];
            $configuraciones['upload_path'] = $ruta;

            $this->upload->initialize($configuraciones);
            if ($this->upload->do_upload($nombre_input_file)) {
                $archivos_subidos[] = $this->upload->data();
            } else {
                $archivos_erroneos .= strip_tags($this->upload->display_errors()) . '<br>' . $archivos['name'] . '</b><br>';
            }
        }
        if (isset($archivos_erroneos[0])) {
            foreach ($archivos_subidos as $key => $archivo_subido) {
                unlink($ruta . $archivo_subido['file_name']);
            }
            return $archivos_erroneos;
        } else {
            return $archivos_subidos;
        }
    }
}
