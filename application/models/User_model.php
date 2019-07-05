<?php
class User_model extends CI_Model
{

    public function getUsers(){
        $query = $this->db->get('users');
        return $query->result();
    }
    public function selectUsers($userId){
        $this->db->where('id' , $userId);
        $query = $this->db->get('users');
        return $query->result();
    }
    public function insertUser($data){
        $query = $this->db->insert('users' ,$data);
    }
    public function updateUser($userId ,$data){
        $this->db->where('id' , $userId);
        $query = $this->db->update('users',$data);
    }
    public function deleteUser($userId){
        $this->db->where('id' , $userId);
        $query = $this->db->delete('users');
    }
}
?>