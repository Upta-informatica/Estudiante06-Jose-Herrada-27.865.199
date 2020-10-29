<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegistroModel;

class Registro extends BaseController
{
	public function index()
	{
		return view('registro');
	}

	public function formulario_registro()
	{

		$db = \Config\Database::connect();
		$session = \Config\Services::session();

		$session = session();

		$reg = new RegistroModel();

		$token = $this->token_generate(random_int(1, 100000));

		// Registramos usuario

		$datos = [
			'nombre' => $this->request->getPost('nombre'),
			'apellido' => $this->request->getPost('apellido'),
			'numero' => $this->request->getPost('numero'),
			'tipo_usuario' => 1,
			'cedula' => $this->request->getPost('cedula'),
			'estado' => 'activo',
			'correo' => $this->request->getPost('correo'),
			'clave' => password_hash($this->request->getPost('clave'), PASSWORD_BCRYPT),
			'fecha_creacion' => 'NOW()',
			'token' => $token
		];

		$reg->insert($datos);

		$correo = $datos['correo'];
		$nombre = $datos['nombre'];
		$apellido = $datos['apellido'];

		// Creamos la sesion 

		$datos_session = [
			'token' => $token,
			'nombre' => $this->request->getPost('nombre'),
			'logged_in' => true
		];

		$session->set('token', $datos_session);


	    return redirect()->to(base_url('dashboard'));
	}

	public function token_generate($id, $rep = NULL, $token = NULL)
	{

		$string = '';
		$t = $rep !== NULL ? $rep : 11;
		for ($x = 0, $y = 0; $x <= $t; $x++) {
			$y = round(random_int(97, 122));
			$string .= utf8_encode(chr($y));
			$y = 0;
		}
		if ($token === null) {
			$string .= '-' . $id . '$cryp';
		} else {
			$string .= $token;
		}
		return $string;
	}

	//--------------------------------------------------------------------

}
