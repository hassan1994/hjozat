<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function __costruct(){
parent::__costruct();
$this->load->helper('url');
}
	public function index()
	{
		$this->load->view('my_page');
	}
}
