<?php namespace App\Controllers;

class EditarMascota extends BaseController
{

	public function index()
	{
        $db = \Config\Database::connect();
		$session = \Config\Services::session();
		$session = session();

		return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/editar_mascota').view('dashboard/templates/footer');
	}

	public function editar_mascota()
	{
		$db = \Config\Database::connect();

		extract($this->request->getPost());

		$db->query("UPDATE datos_mascota SET nombre = '$nombre', raza = '$raza', color = '$color', peso = '$peso', estatura = '$estatura', estado = '$estado' WHERE id_dato_mascota = '$id'");
		return redirect()->to(base_url('dashboard'));
	}

	public function borrar_mascota()
	{
		$db = \Config\Database::connect();

		$id = $_GET['id'];

		$db->query("UPDATE datos_mascota SET estado = 'inactivo' WHERE id_dato_mascota = '$id'");

		return redirect()->to(base_url('dashboard'));
	}

	//--------------------------------------------------------------------

}
