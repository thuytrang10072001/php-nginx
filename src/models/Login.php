<?php
use Core\Connection;

class Login extends Connection 
{
    //get list customer 
    public function login($email) {
        $stmt = $this->db->prepare('SELECT * FROM Customer WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>