<?php
class User extends CI_Controller{

    public function index(){
        $data['users']= $this->User_model->getUsers();
        return $this->load->view('user_view' , $data);
    }
    public function display($userId){
        $data['users']= $this->User_model->selectUsers($userId);
        return $this->load->view('user_view' , $data);
    }
    public function insert()
    {
        $data = array(

            'user' => 'Hasan2',
            'password' => '1234567'
        );
        $this->User_model->insertUser($data);
        //return $this->load->view('user_view' , $data);
    }
    public function update($userId){
        $data = array(
            'user' => 'sand dune',
            'password' => '654321'
        );
        $this->User_model->updateUser($userId,$data);
    }
    public function delete($userId){
      
        $this->User_model->deleteUser($userId);
    }
}
?>