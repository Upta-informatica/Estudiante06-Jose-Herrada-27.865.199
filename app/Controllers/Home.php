<?php namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$session = \Config\Services::session();
		$session = session();

		
		return view('templates/header').view('home');
	}

	public function agregar_mascota()
	{
		$db = \Config\Database::connect();
		$session = \Config\Services::session();
		$session = session();

		extract($_POST);

		$edad = intval((time() - strtotime($nacimiento)) / 31536000);
		$id_usuario = $session->get('token')['id'];

		$db->query("INSERT INTO datos_mascota(nombre, raza, color, peso, estatura, sexo, edad, fecha_nacimiento, fecha_creacion, estado)
		VALUES(
			'$nombre',
			'$raza',
			'$color',
			'$peso',
			'$estatura',
			'$sexo',
			'$edad',
			'$nacimiento',
			NOW(),
			'activo'
		)");

		$id_datos_mascota = $db->query("SELECT id_dato_mascota FROM datos_mascota WHERE 
			nombre = '$nombre' AND raza = '$raza' AND color = '$color' AND peso = '$peso' AND estatura = '$estatura' AND sexo = '$sexo' AND edad = '$edad'
			AND fecha_nacimiento = '$nacimiento'
		");
		$id_datos_mascota = $id_datos_mascota->getResult()[0]->id_dato_mascota;

		$db->query("INSERT INTO mascotas(id_doctor, id_usuario, id_datos_mascota, fecha_creacion)
		VALUES(
			'$doctor',
			'$id_usuario',
			'$id_datos_mascota',
			NOW()
		)");

		return redirect()->to(base_url('dashboard'));

	}

	// Ajax editar mascota

	public function editar_mascota()
	{
		$db = \Config\Database::connect();

		$id = $this->request->getPost('id_pet');

		
	}

	//--------------------------------------------------------------------

}
