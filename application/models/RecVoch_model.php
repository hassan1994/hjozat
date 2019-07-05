<?php


class RecVoch_model extends CI_Model 
{
	public function getVoch(){
		$query = $this->db->get('recepetvoucher') ;
		return $query->result();
	}

 	public function addVoch($data){
          $query = $this->db->insert('recepetvoucher',$data);
    }

    public function updateVoch($data){
        $this->db->where('id' , $data['id']);  
      		$data1 = array(
            'date' => $data['date'], 
            'client' => $data['client'],
            'payMethod' => $data['payMethod'],
            'payValue' => $data['payValue'],
            'note' => $data['note'],
        );
         $query = $this->db->update('recepetvoucher',$data1);
    }

    public function deleteVoch($data){
       
		$this->db->where('id' , $data['id']);  
        $query = $this->db->delete('recepetvoucher');
    
    }

}
?>