<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// $this->load->view('template/header');
		// $this->load->view('template/topbar');
		// $this->load->view('template/sidebar');
		// $this->load->view('page/home/index');
		// $this->load->view('template/footer');

		$page = '/home/index';
		page($page);
	}
	

}

/* End of file Home.php */