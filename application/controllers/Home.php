<?php 

class Home extends CI_Controller
{
      public function index()
      {
        $data['content'] = 'Department.php';
        $this->load->view('home_view' , $data);
      }
      public function department()
      {
        $data['content'] = 'Department.php';
        $this->load->view('home_view' , $data);
      }
      public function AddHjz()
      {
        $data['content'] = 'Hjz.php';
        $this->load->view('home_view' , $data);
      }

      public function Company()
      {
        $data['content'] = 'Company.php';
        $this->load->view('home_view' , $data);
      }
      public function Period()
      {
        $data['content'] = 'Period.php';
        $this->load->view('home_view' , $data);
      }
      public function MoneyOrg()
      {
        $data['content'] = 'MoneyOrg.php';
        $this->load->view('home_view' , $data);
      }
      public function Clients()
      {
        $data['content'] = 'Clients.php';
        $this->load->view('home_view' , $data);
      }
      public function RecVoch()
      {
        $data['content'] = 'RecVoch.php';
        $this->load->view('home_view' , $data);
      }
       public function Services()
      {
        $data['content'] = 'Services.php';
        $this->load->view('home_view' , $data);
      }
      public function Contract()
      {
        $data['content'] = 'Contract.php';
        $this->load->view('home_view' , $data);
      }
      public function AddContract()
      {
        $data['content'] = 'AddContract.php';
        $this->load->view('home_view' , $data);
      }
}
?>