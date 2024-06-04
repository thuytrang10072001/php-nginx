<?php
namespace App\User;

class Customer
{
    private int $id;
    private string $name;
    private string $address;
    private string $email;
  
    public function __construct(?string $name, ?string $address, ?string $email) {
      $this->name = $name;
      $this->address = $address;
      $this->email = $email;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id ){
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string{
        return $this->name;
    }

    public function setName(?string $name){
        $this->name = $name;
        return $this;
    }

    public function getAddress(): ?string{
        return $this->address;
    }

    public function setAddress(?string $address){
        $this->address = $address;
        return $this;
    }

    public function getEmail(): ?string{
        return $this->email;
    }

    public function setEmail(?string $email){
        $this->email = $email;
        return $this;
    }
}
?>