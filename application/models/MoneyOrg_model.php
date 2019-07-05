<?php


class MoneyOrg_model extends CI_Model 
{
	public function getMoneyOrg(){
		$query = $this->db->get('moneyorg') ;
		return $query->result();
	}

 	public function addMoneyOrg($data){
          $query = $this->db->insert('moneyorg',$data);
    }

    public function updateMoneyOrg($data){
        $this->db->where('id' , $data['id']);  
      		$data1 = array(
            'name' => $data['name'],
        );
         $query = $this->db->update('moneyorg',$data1);
    }

    public function deleteMoneyOrg($data){
       
		$this->db->where('id' , $data['id']);  
        $query = $this->db->delete('moneyorg');
    
    }

}
?>