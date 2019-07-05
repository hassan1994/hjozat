<?php


class Contract_Service_model extends CI_Model 
{
	public function getContract(){
		$query = $this->db->get('contractservice') ;
		return $query->result();
	}

 	public function addContract($data){
          $query = $this->db->insert('contractservice',$data);
    }

    public function updateContract($data){
        $this->db->where('id' , $data['id']);  
      		$data1 = array(
            'serviceId' => $data['serviceId'], 
              'contractId' => $data['contractId'], 
                'value' => $data['value'], 
           
        );
         $query = $this->db->update('contractservice',$data1);
    }

    public function deleteContract($data){
       
		$this->db->where('id' , $data['id']);  
        $query = $this->db->delete('contractservice');
    
    }

}
?>