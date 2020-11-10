<?php namespace App\Controllers;

use App\Models\PedirCitaModel;

class Citas extends BaseController
{

	public function index()
	{
		/*$session = \Config\Services::session();
		$session = session();

		
		return view('templates/header').view('home');*/
	}

    public function pedir_cita()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $session = session();

        $id = $session->get('token')['id'];

        // Insertamos la cita

        $reg = new PedirCitaModel();

        $datos = [
            'id_mascota' => $this->request->getPost('mascota'),
            'id_doctor' => $this->request->getPost('doctor'),
            'estado' => 'activo',
            'fecha_cita' => $this->request->getPost('fecha_cita'),
            'fecha_registro' => 'NOW()',
            'id_usuario' => $id
        ];

        $reg->insert($datos);

        return redirect()->to(base_url('dashboard'));

    }

    public function borrar_cita()
    {
        $db = \Config\Database::connect();

        $id = $_GET['id'];

        $db->query("UPDATE citas SET estado = 'inactivo' WHERe id_cita = '$id'");

        return redirect()->to(base_url('dashboard/agenda_citas'));
    }
	//--------------------------------------------------------------------

}
