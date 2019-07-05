<?php


class Period_model extends CI_Model 
{
	public function getPeriod(){
		$query = $this->db->get('period') ;
		return $query->result();
	}

 	public function addPeriod($data){
          $query = $this->db->insert('period',$data);
    }

    public function updatePeriod($data){
        $this->db->where('id' , $data['id']);  
      		$data1 = array(
            'name' => $data['name'], 
            'value' => $data['value'],
        );
         $query = $this->db->update('period',$data1);
    }

    public function deletePeriod($data){
       
		$this->db->where('id' , $data['id']);  
        $query = $this->db->delete('period');
    
    }

}
?>