<?php namespace App\Controllers;

class Dashboard extends BaseController
{

    public function __construct()
    {
        $session = \Config\Services::session();
        
    }
	public function index()
	{

        // Control de sesion

       $this->control_sesion();

		return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/index').view('dashboard/templates/footer');
    }

    public function citas()
    {
        return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/citas').view('dashboard/templates/footer');
    }

    public function agenda_citas()
    {
        return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/agenda_citas').view('dashboard/templates/footer');
    }

    public function mascotas()
    {
        return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/mascotas').view('dashboard/templates/footer');
    }

    public function doctores()
    {
        return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/doctores').view('dashboard/templates/footer');
    }

    public function configuracion()
    {
        return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/configuracion').view('dashboard/templates/footer');
    }
    
    public function control_sesion()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();

        $tiempo = $session->get('token')['time_session'];

        $calculo = $tiempo - time();

        if ($calculo <= 0) {
            $this->logout();
		}
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();

        $_SESSION = [];

        echo '<script>
                    alert("Sesion terminada");
                    document.location.href = "'.base_url().'/login"; 
                </script>';

    }

	//--------------------------------------------------------------------

}
