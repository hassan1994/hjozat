<?php


class Contract_model extends CI_Model 
{
	public function getContract(){
        $this->db->where('fix' , 0);
        $this->db->where('cancel' , 0);
		$query = $this->db->get('contract') ;
		return $query->result();
     //    $query = 'SELECT * FROM `contract` WHERE date >= "2019-02-02" and toDate <= "2019-10-10';
     // return $this->db->query("SELECT * FROM `contract` WHERE date >= '2019-02-02' and toDate <= '2019-10-10'")->result_array();
	}

     public function addContract($data)
     {
         //TODO :
         /*
         أول شي نقوم بعمل استعلام لمعرفة ان كان هناك اي حجز على هذا القسم ضمن هذا التاريخ 
         اذا لم يكن هناك حجز ابدا في هذا التاريخ نقوم باضافة الحجر
         اذا كان هناك حجز نتفقد هل هذا الحجز من نوع يوم 
         اذا كان من نوع يوم نقوم برفض طلب الحجز
         اذا كان من نوع ساعي نقوم بفحص الفترة 
         اذا كان غير فترة نقوم بالحجز 
         اذا كان نفس الفترة نقوم برفض هذا الحجز
         */
       $query = 'SELECT * FROM `contract` WHERE date >= "2019-02-02" and toDate <= "2019-10-10';
       $query->result();
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
          $query = $this->db->insert('contract',$data1);
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