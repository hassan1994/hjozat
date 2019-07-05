<?php


class Company_model extends CI_Model 
{
	public function getCompany(){
		$query = $this->db->get('company') ;
		return $query->row();
	
	}
	 public function updateCompny($data){
       
	   // $this->db->where('id' , $data['id']);
        $query = $this->db->update('company',$data);
    }

}
?>