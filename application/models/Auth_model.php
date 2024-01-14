<?php
class Auth_model extends CI_Model{
    
    public function check_login($email, $password)
    {
        //check db
        $query = $this->db->query('SELECT * FROM users');
        
        //hash password
        $hash_password = md5($password);
        
        //loop
        foreach($query->result() as $row){
            if($row->email == $email && $row->password == $hash_password){
                return true; 
            }
        }
        //return
        return false;
    }
}