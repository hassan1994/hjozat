<?php

class RecVoch extends CI_Controller 
{

	public function Data(){
		$obj=$this->RecVoch_model->getVoch();
		echo json_encode($obj);
	}
	public function add()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->RecVoch_model->addVoch($request);
		echo json_encode($obj);
	}
	public function edit()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->RecVoch_model->updateVoch($request);
		//	echo json_encode($obj);
	}
	public function delete()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->RecVoch_model->deleteVoch($request);
	

	}
}
?>