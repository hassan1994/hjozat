<?php


class Contract_model extends CI_Model 
{
	public function getContract(){
		$query = $this->db->get('contract') ;
		return $query->result();
	}

 	public function addContract($data){
          $query = $this->db->insert('contract',$data);
    }

    public function updateContract($data){
        $this->db->where('id' , $data['id']);  
      		$data1 = array(
            'date' => $data['date'], 
            'depId' => $data['depId'],
            'perId' => $data['perId'],
            'clientId' => $data['clientId'],
            'reservValue' => $data['reservValue'],
            'taxValue' => $data['note'],
            'totalValue' => $data['totalValue'],
            'serviceValue' => $data['serviceValue'],
            'note' => $data['note'],
        );
         $query = $this->db->update('contract',$data1);
    }

    public function deleteContract($data){
       
		$this->db->where('id' , $data['id']);  
        $query = $this->db->delete('contract');
    
    }

}
?>