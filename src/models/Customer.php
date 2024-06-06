<?php
namespace App\Models;
use App\Core\Connection;
use PDO;

class Customer extends Connection 
{
    //get list customer
    public function getCustomers() {
        $stmt = $this->db->prepare("SELECT * FROM Customer");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
    public function getCustomerById($id) {
        $stmt = $this->db->prepare('SELECT * FROM Customer WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
?>