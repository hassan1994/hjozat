<?php


class Client_model extends CI_Model 
{
	public function getClient(){
		$query = $this->db->get('clients') ;
		return $query->result();
	}

 	public function addClient($data){
          $query = $this->db->insert('clients',$data);
    }

    public function updateClient($data){
        $this->db->where('id' , $data['id']);  
      		$data1 = array(
            'name' => $data['name'], 
            'phone1' => $data['phone1'],
            'phone2' => $data['phone2'],
            'phone3' => $data['phone3'],
            'email' => $data['email'],
        );
         $query = $this->db->update('clients',$data1);
    }

    public function deleteClient($data){
       
		$this->db->where('id' , $data['id']);  
        $query = $this->db->delete('clients');
    
    }

}
?>