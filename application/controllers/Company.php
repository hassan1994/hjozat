<?php

class Company extends CI_Controller 
{

	public function Data(){
		$obj=$this->Company_model->getCompany();

		
		echo json_encode($obj);
	}
	public function add()
	{
	$request= json_decode(file_get_contents('php://input'), TRUE);
	$obj=$this->Company_model->insert($request);
	echo json_encodeo($obj);

	}
	public function edit()
	{
	$request= json_decode(file_get_contents('php://input'), TRUE);
	$obj=$this->Company_model->updateCompny($request);
	echo json_encode($obj);

	}

	public function AddContract()
      {
        $data['content'] = 'AddContract.php';
        $this->load->view('home_view' , $data);
      }
}
?>