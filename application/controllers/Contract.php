<?php

class Contract extends CI_Controller 
{

	public function Data(){
		$obj=$this->Contract_model->getContract();
		echo json_encode($obj);
	}
	public function add()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Contract_model->addContract($request);
		echo json_encode($obj);
	}
	public function edit()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Contract_model->updateContract($request);
	}
	public function delete()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$obj=$this->Contract_model->deleteContract($request);
	

	}
	public function AddContract()
      {
        $data['content'] = 'AddContract.php';
        $this->load->view('home_view' , $data);
      }

    public function saveNew(){
        $request= json_decode(file_get_contents('php://input'), TRUE);
        echo json_encode($request);
    }
}
?>