<?php defined('BASEPATH') or exit('No direct script access allowed');
class Reporte extends PSG_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		
    }
	
	public function formulario_pdf($id_planificacion_programa=null)
	{
		require_once APPPATH . '/controllers/Reportes/Formulario.php';
		$form = new Formulario();
		$form->formulario_registro();
	}

	public function decodifica_array_utf8($datos)
	{
		$datos_decodificados=array();
		for ($i=0; $i < count($datos); $i++) { 
			$datos[$i] = array_values($datos[$i]);
			for ($j=0; $j < count($datos[$i]); $j++) { 
				$datos_decodificados[$i][$j] = utf8_decode($datos[$i][$j]);
			}
		}
		return $datos_decodificados;
	}

	public function reporte_permisos($datos=null)
	{
		require_once APPPATH . '/controllers/Reportes/Reporte_usuarios.php';
		$usuarios = new Reporte_usuarios();

		// $datos['datos'] = $datos;
		$this->db->select('*');
		$this->db->from('grupo');
		$datos['datos'] = $this->db->get()->result_array();
		if (count($datos['datos']) == 0) {
			echo 'No exiten registros en esta tabla';
			exit;
		}
		
		// return var_dump($datos['datos']);
		$key = array_keys(array_change_key_case($datos['datos'][0],CASE_UPPER));
		$k = array_keys($datos['datos'][0]);
		////// reemplaza el caracter '_' por un espacio en los keys
		for ($i=0; $i < count($key); $i++) { 
			$keys[$i] = str_replace('_',' ',$key[$i]);
		};
		$datos['datos'] = $this->decodifica_array_utf8($datos['datos']);
		$datos['keys'] = $keys;
		// return var_dump($datos['datos']);
		$usuarios->listar($datos);
	}

	public function reporte_usuarios()
	{
		require_once APPPATH . '/controllers/Reportes/Reporte_usuarios.php';
		$usuarios = new Reporte_usuarios();
		$this->db->select("p.ci, (p.nombre||' '||p.paterno||' '||p.materno) as Nombre, u.nombre_usuario , string_agg(g.nombre_grupo,', ') grupos, p.fecha_nacimiento , gu.fecha_inicio ,gu.fecha_fin, p.estado_persona");
		$this->db->from('persona p');
		$this->db->join('usuario u','p.id_persona = u.id_usuario');
		$this->db->join('grupo_usuario gu','p.id_persona = gu.id_persona');
		$this->db->join('grupo g','gu.id_grupo = g.id_grupo');
		$this->db->group_by(['p.id_persona','u.nombre_usuario','gu.fecha_inicio','gu.fecha_fin']);
		$this->db->order_by('p.nombre ASC','p.paterno ASC','p.materno ASC');
		$datos['datos'] = $this->db->get()->result_array();
		#return var_dump($datos['usuarios']);
		
		///// obtiene los key de un array para ponerlos en la cabecera del reporte
		$key = array_keys(array_change_key_case($datos['datos'][0],CASE_UPPER));
		$k = array_keys($datos['datos'][0]);
		////// reemplaza el caracter '_' por un espacio en los keys
		for ($i=0; $i < count($key); $i++) { 
			$keys[$i] = str_replace('_',' ',$key[$i]);
		};
		$datos['keys'] = $keys;
		#return var_dump($datos['datos'][0]['grupos']);
		// for ($i=0; $i < count($datos['datos']); $i++) { 
		// 	foreach ($datos['datos'][$i] as $key ) {
		// 		$grupos = str_replace('_',' ',$key/*[$i]*/[$k[3]]);
		// 		#echo str_replace('_',' ',$key/*[$i]*/[$k[3]]).'<br>';
		// 		#echo $datos['datos'][$i][$k[3]].' '.$datos['datos'][$i]['nombre'].'<br>';
		// 	}
		// 	$datos['datos'][$i][$k[3]]=$grupos;
		// 	echo $datos['datos'][$i][$k[3]].' '.$datos['datos'][$i]['nombre'].'<br>';
		// }
		// exit;
		// return var_dump($datos['datos'][10540]['grupos'],$datos['datos'][10540]['nombre']);
		#exit;
		#return var_dump($datos['datos'][0][$k[3]]);
		
		#return var_dump($datos);
		$usuarios->listar($datos);
	}

	public function solicitud()
	{
		require_once APPPATH . '/controllers/Reportes/Reporte_usuarios.php';
		$usuarios = new Reporte_usuarios();
		$datos = $this->db->get_where('persona', ['id_persona'=>14065])->row_array();
		// return var_dump($datos);
		$usuarios->solicitud($datos);
	}

}