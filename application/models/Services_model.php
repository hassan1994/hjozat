<?php


class Services_model extends CI_Model 
{
	public function getServices(){
		$query = $this->db->get('services') ;
		return $query->result();
	}

 	public function addServices($data){
          $query = $this->db->insert('services',$data);
    }

    public function updateServices($data){
        $this->db->where('id' , $data['id']);  
      		$data1 = array(
            'name' => $data['name'], 
            'value' => $data['value'],
        );
         $query = $this->db->update('services',$data1);
    }

    public function deleteServices($data){
       
		$this->db->where('id' , $data['id']);  
        $query = $this->db->delete('services');
    
    }

}
?>