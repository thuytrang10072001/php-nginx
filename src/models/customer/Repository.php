<?php
use Core\Connection;

class Repository extends Connection 
{
    //get list customer
    public function getCustomers() {
        $stmt = $this->db->prepare("SELECT * FROM Customer ORDER BY id ASC");
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
        $stmt = $this->db->prepare('INSERT INTO Customer (name, phone, address, email, pass) VALUES (:name, :phone, :address, :email, :pass)');
        $name = $customer->getName();
        $phone = $customer->getPhone();
        $address = $customer->getAddress();
        $email = $customer->getEmail();
        $pass = '123456';
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateCustomer($customer){
        $stmt = $this->db->prepare('UPDATE Customer SET name = :name, phone = :phone, address = :address, email = :email WHERE id = :id');
        $id = $customer->getId();
        $name = $customer->getName();
        $phone = $customer->getPhone();
        $address = $customer->getAddress();
        $email = $customer->getEmail();
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function deleteCustomer($customerId){
        $stmt = $this->db->prepare('DELETE FROM Customer WHERE id = :id');
        $stmt->bindParam(':id', $customerId);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>