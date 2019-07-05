<?php


class Department_model extends CI_Model 
{
	public function getDepartment(){
		$query = $this->db->get('department') ;
		return $query->result();
	}

 	public function addDeparment($data){
          $query = $this->db->insert('department',$data);
    }

    public function updateDeparment($data){
        $this->db->where('id' , $data['id']);  
      		$data1 = array(
            'name' => $data['name'],
        );
         $query = $this->db->update('department',$data1);
    }

    public function deleteDeparment($data){
       
		$this->db->where('id' , $data['id']);  
        $query = $this->db->delete('department');
    
    }

}
?>