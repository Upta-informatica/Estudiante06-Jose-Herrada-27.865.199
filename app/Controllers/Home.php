<?php namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$session = \Config\Services::session();
		$session = session();

		
		return view('templates/header').view('home');
	}

	//--------------------------------------------------------------------

}
