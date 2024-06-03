<?php
namespace App\User;

class Customer
{
    public $name;
    public $address;
    public $email;
  
    function __construct($name, $address, $email) {
      $this->name = $name;
      $this->address = $address;
      $this->email = $email;
    }

    function getName()
    {
        return $this->name;
    }

    function getAddress(){
        return $this->address;
    }

    function getEmail(){
        return $this->email;
    }
}
?>