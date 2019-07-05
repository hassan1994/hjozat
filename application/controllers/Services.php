<?php

class Services extends CI_Controller 
{

	public function Data(){
		$obj=$this->Services_model->getServices();
		echo json_encode($obj);
	}
	public function add()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Services_model->addServices($request);
		echo json_encode($obj);
	}
	public function edit()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Services_model->updateServices($request);
	}
	public function delete()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Services_model->deleteServices($request);
	

	}
}
?>