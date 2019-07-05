<?php

class Clients extends CI_Controller 
{

	public function Data(){
		$obj=$this->Client_model->getClient();
		echo json_encode($obj);
	}
	public function add()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Client_model->addClient($request);
		echo json_encode($obj);
	}
	public function edit()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Client_model->updateClient($request);
	}
	public function delete()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Client_model->deleteClient($request);
	

	}
}
?>