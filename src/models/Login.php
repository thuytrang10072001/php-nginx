<?php
use Core\Connection;

class Login extends Connection 
{
    //get list customer 
    public function login($email, $pass) {
        $stmt = $this->db->prepare('SELECT * FROM Customer WHERE email = :email AND pass = :pass');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>