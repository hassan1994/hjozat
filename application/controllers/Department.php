<?php

class Department extends CI_Controller 
{

	public function Data(){
		$obj=$this->Department_model->getDepartment();
		echo json_encode($obj);
	}
	public function add()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Department_model->addDeparment($request);
		echo json_encode($obj);
	}
	public function edit()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Department_model->updateDeparment($request);
	}
	public function delete()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Department_model->deleteDeparment($request);
	

	}
}
?>