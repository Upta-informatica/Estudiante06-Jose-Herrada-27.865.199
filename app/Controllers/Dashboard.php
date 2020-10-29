<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{

        $session = \Config\Services::session();
        
        // Control de sesion

       $this->control_sesion();

		return view('dashboard/templates/head').view('dashboard/templates/nav').view('dashboard/templates/sidemenu').view('dashboard/index');
    }
    
    public function control_sesion()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();

        $token = 'a';
        //$session->get('token')['token']

        // Buscamos el token en bd para jwt

        $jwt = $db->query("SELECT token FROM usuarios WHERE token = '$token'");
        $jwt = $jwt->getResult();
        
        if (count($jwt) <= 0) {
            redirect()->to(base_url('/login'));
        } 
    }

	//--------------------------------------------------------------------

}
