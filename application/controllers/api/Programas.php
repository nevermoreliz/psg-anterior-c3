<?php defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH . 'libraries/RestController.php');
require(APPPATH . 'libraries/Format.php');


class Programas extends RestController
{
    function __construct()
    {
        parent::__construct();
    }

    public function lista_get()
    {
        $programas = [
            ['id' => 1, 'nombre_programa' => 'Programa 1', 'tipo_programa' => 'DIPLOMADO'],
            ['id' => 2, 'nombre_programa' => 'Programa 2', 'tipo_programa' => 'MAESTRÍA'],
            ['id' => 3, 'nombre_programa' => 'Programa 3', 'tipo_programa' => 'DOCTORADO'],
        ];
        $id = $this->get('id');
        if ($id === null) {
            if ($programas) {
                $this->response($programas, 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'No se han encontrado programas.'
                ], 404);
            }
        } else {
            if (array_key_exists($id, $programas)) {
                $this->response($programas[$id-1], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'No se han encontrado programas.'
                ], 404);
            }
        }
    }
}