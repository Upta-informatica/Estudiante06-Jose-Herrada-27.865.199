<?php namespace App\Controllers;

class Doctores extends BaseController
{

	public function index()
	{
        $db = \Config\Database::connect();
		$session = \Config\Services::session();
		$session = session();

		return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/editar_doctor').view('dashboard/templates/footer');
	}

    public function borrar_doctor()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $session = session();

        $id = $_GET['id'];

        $db->query("UPDATE doctores SET estado = 'inactivo' WHERe id_doctor = '$id'");

        // bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Inhabilitar doctor', 'Inhabilitar', NOW())");

        return redirect()->to(base_url('dashboard/doctores'));
    }

    public function editar_doctor()
    {
        $db = \Config\Database::connect();

        extract($_POST);

        $db->query("UPDATE doctores SET estado = '$estado' WHERE id_usuario = '$id'");

        $db->query("UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', numero = '$numero', cedula = '$cedula' WHERE id_usuario = '$id'");
        
        // bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Edicion de doctor', 'Actualizar', NOW())");

        return redirect()->to(base_url('dashboard/doctores'));

    }

    public function agregar_doctor()
    {
        $db = \Config\Database::connect();

        extract($this->request->getPost());

        $db->query("UPDATE usuarios SET tipo_usuario = '3' WHERE id_usuario = '$doctor'");

        $db->query("INSERT INTO doctores(id_usuario, estado, fecha_creacion) VALUES('$doctor', 'activo', NOW())");

        // bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Se ha agregado nuevo usuario tipo doctor', 'Agregar', NOW())");

        return redirect()->to(base_url('dashboard/doctores'));
    }
	//--------------------------------------------------------------------

}
