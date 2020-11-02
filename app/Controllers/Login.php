<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		return view('login');
	}

	public function formulario_login()
	{
		$db = \Config\Database::connect();

		$email = $this->request->getPost('email');
		$clave = $this->request->getPost('clave');

		// Buscamos el usuario por correo

		$find = $db->query("SELECT * FROM usuarios WHERE correo = '$email'");

		if (count($find->getResult()) <= 0) {
			return redirect()->to(base_url('login'));
		}
		$clave_bd = $find->getResult()[0]->clave;
		if (password_verify($clave, $clave_bd)) {

			$session = \Config\Services::session();
			$session = session();

			$token = $find->getResult()[0]->token;

			$nombre = $find->getResult()[0]->nombre;

			// Nivel

			$id = $find->getResult()[0]->id_usuario;

			$id_nivel = $find->getResult()[0]->tipo_usuario;
			$nivel = $db->query("SELECT * FROM tipo_usuario WHERE id_tipo_usuario = '$id_nivel'");
			$nivel = $nivel->getResult()[0]->usuario;

			$datos_session = [
				'token' => $token,
				'id' => $id,
				'nivel' => $nivel,
				'nombre' => $nombre,
				'logged_in' => true,
				'time_session' => time() + 86400
			];

			$session->set('token', $datos_session);

			return redirect()->to(base_url('dashboard'));
		} else {

			// Poner aqui modal error

			return redirect()->to(base_url('login'));
		}
	}
	
	
	//--------------------------------------------------------------------

}
