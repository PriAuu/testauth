<?php
class Auth_model extends CI_Model{
    
    public function check_login($email, $password)
    {
        $query = $this->db->query('SELECT * FROM users');
        
        $hash_password = md5($password);
        
        foreach($query->result() as $row){
            if($row->email == $email && $row->password == $hash_password){
                return true; 
            }
        }

        return false;
    }
}