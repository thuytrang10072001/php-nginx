<?php
namespace Models\Customer;
use Core\Connection;
use PDO;

class Repository extends Connection 
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

    public function insertCustomer($customer){
        $stmt = $pdo->prepare("INSERT INTO customers (name, email) VALUES (:name, :email)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>