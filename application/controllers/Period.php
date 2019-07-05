<?php

class Period extends CI_Controller 
{

	public function Data(){
		$obj=$this->Period_model->getPeriod();
		echo json_encode($obj);
	}
	public function add()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Period_model->addPeriod($request);
		echo json_encode($obj);
	}
	public function edit()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Period_model->updatePeriod($request);
	}
	public function delete()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Period_model->deletePeriod($request);
	

	}
}
?>