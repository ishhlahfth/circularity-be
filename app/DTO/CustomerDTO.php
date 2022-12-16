<?php

namespace App\DTO;

class CustomerDTO extends GenericDTO 
{
    private $id;
    private $name;
    private $phone;
    private $whatsapp;
    private $email;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function getWhatsapp() {
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp) {
        $this->whatsapp = $whatsapp;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
}