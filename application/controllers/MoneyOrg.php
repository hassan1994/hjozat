<?php

class MoneyOrg extends CI_Controller 
{

	public function Data(){
		$obj=$this->MoneyOrg_model->getMoneyOrg();
		echo json_encode($obj);
	}
	public function add()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->MoneyOrg_model->addMoneyOrg($request);
		echo json_encode($obj);
	}
	public function edit()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->MoneyOrg_model->updateMoneyOrg($request);
	}
	public function delete()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->MoneyOrg_model->deleteMoneyOrg($request);
	

	}
}
?>