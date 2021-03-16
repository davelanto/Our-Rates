<?php namespace App\Controllers;



use CodeIgniter\Controller;
class Home extends BaseController
{
	public function index()
	{
	
		if (!isset($this->session->user_id)) {
			return redirect()->to('/login'); 
		   }

		$title['title'] = "Welcome to Airspeed Selling Rates";


		$title['breadcrumb'] = '
		<nav aria-label="breadcrumb" class="navcrumb poppins p-2">
  			<ol class="breadcrumb ">
    			<li class="breadcrumb-item"><a href="#">Home</a></li>
  			</ol>
		</nav>';
	

		echo view('templates/header',$title);
		echo view('pages/home');
		echo view('templates/footer');
	}


}
