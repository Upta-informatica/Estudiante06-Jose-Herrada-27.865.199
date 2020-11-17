<?php namespace App\Controllers;

use App\Models\RegistroModel;
class Configuracion extends BaseController
{

    public function __construct()
    {
        $session = \Config\Services::session();
        
    }
	public function index()
	{

        // Control de sesion


    }
    public function _exists($correo)
	{
		$db = \Config\Database::connect();

		$find = $db->query("SELECT * FROM usuarios WHERE correo = '$correo'");

		$find = $find->getResult();

		if (count($find) > 0) {

			echo '<script>
                    alert("La cuenta ya existe con ese correo");
                    document.location.href = "'.base_url().'/dashboard/configuracion"; 
                </script>';
		}
	}

    public function usuario()
    {
        $this->_exists($this->request->getPost('correo'));
        $db = \Config\Database::connect();

        $reg = new RegistroModel();

        $token = $this->token_generate(random_int(1, 100000));

		// Registramos usuario

		$datos = [
			'nombre' => $this->request->getPost('nombre'),
			'apellido' => $this->request->getPost('apellido'),
			'numero' => $this->request->getPost('numero'),
			'tipo_usuario' => 2,
			'cedula' => $this->request->getPost('cedula'),
			'estado' => 'activo',
			'correo' => $this->request->getPost('correo'),
			'clave' => password_hash($this->request->getPost('clave'), PASSWORD_BCRYPT),
			'fecha_creacion' => 'NOW()',
			'token' => $token
		];

		$reg->insert($datos);
		
		// bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Usuario agregado al sistema', 'Agregar', NOW())");
        
        return redirect()->to(base_url('dashboard/configuracion'));
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

	public function editar_usuario_vista()
	{
		return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/editar_usuario').view('dashboard/templates/footer');
	}

	public function editar_usuario()
	{
		$db = \Config\Database::connect();

        extract($_POST);

        $db->query("UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', numero = '$numero', cedula = '$cedula', estado = '$estado' WHERE id_usuario = '$id'");

		// bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Actualizar datos de usuario', 'Actualizar', NOW())");

        return redirect()->to(base_url('dashboard/configuracion'));
	}

	public function borrar_usuario()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $session = session();

        $id = $_GET['id'];

		$db->query("UPDATE usuarios SET estado = 'inactivo' WHERE id_usuario = '$id'");
		
		// bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Se ha inhabilitado a un usuario', 'Inhabilitar', NOW())");

        return redirect()->to(base_url('dashboard/configuracion'));
	}
	
	public function agregar_inventario()
	{
		$db = \Config\Database::connect();

		extract($_POST);

		$db->query("INSERT INTO inventario(producto, descripcion, cantidad, estado, fecha_registro) 
		VALUES('$producto', '$descripcion', '$cantidad', 'activo', NOW())");

		// bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Agregar inventario', 'Agregar', NOW())");

		// bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Agregar producto en el inventario', 'Agregar', NOW())");

		return redirect()->to(base_url('dashboard/configuracion'));
	}

	public function modificar_inventario_v()
	{
		return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/editar_inventario').view('dashboard/templates/footer');
	}

	public function modificar_inventario()
	{
		$db = \Config\Database::connect();

		extract($_POST);

		$db->query("UPDATE inventario SET producto = '$producto', descripcion = '$descripcion', cantidad = '$cantidad', estado = '$estado', fecha_mod = NOW() WHERE id = '$id'");

		// bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Actualizar inventario', 'Actualizar', NOW())");

		return redirect()->to(base_url('dashboard/configuracion'));
	}

	public function borrar_inventario()
    {
        $db = \Config\Database::connect();

        $id = $_GET['id'];

		$db->query("UPDATE inventario SET estado = 'inactivo', fecha_mod = NOW() WHERE id = '$id'");
		
		// bitacora

		$db->query("INSERT INTO bitacora(actividad, tipo_movimiento, fecha_registro) VALUES('Inhabilitar inventario', 'Inhabilitar', NOW())");

        return redirect()->to(base_url('dashboard/configuracion'));
	}

	//--------------------------------------------------------------------

}
