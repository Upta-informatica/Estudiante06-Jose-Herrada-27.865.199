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

	// Buscamos si ya existe la cuenta x correo

	public function _exists($correo)
	{
		$db = \Config\Database::connect();

		$find = $db->query("SELECT * FROM usuarios WHERE correo = '$correo'");

		$find = $find->getResult();

		if (count($find) > 0) {

			echo '<script>
                    alert("La cuenta ya exisste con ese correo");
                    document.location.href = "'.base_url().'/login"; 
                </script>';
		}
	}

	public function formulario_registro()
	{
		$this->_exists($this->request->getPost('correo'));

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

		$email = $this->request->getPost('correo');

		$find = $db->query("SELECT * FROM usuarios WHERE correo = '$email'");

		$id = $find->getResult()[0]->id_usuario;
		$id_nivel = $find->getResult()[0]->tipo_usuario;

		$nivel = $db->query("SELECT * FROM tipo_usuario WHERE id_tipo_usuario = '$id_nivel'");
		$nivel = $nivel->getResult()[0]->usuario;

		// Creamos la sesion 

		$datos_session = [
			'token' => $token,
			'id' => $id,
			'nivel' => $nivel,
			'nombre' => $this->request->getPost('nombre'),
			'logged_in' => true,
			'time_session' => time() + 86400
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
