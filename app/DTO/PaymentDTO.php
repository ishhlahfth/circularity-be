<?php

namespace App\DTO;

class PaymentDTO extends GenericDTO 
{
    
    private $id;
    private $name;
    private $email;
    private $whatsapp;
    private $program_id;
    
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

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getWhatsapp() {
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp) {
        $this->whatsapp = $whatsapp;
        return $this;
    }

    public function getProgramId() {
        return $this->program_id;
    }

    public function setProgramId($program_id) {
        $this->program_id = $program_id;
        return $this;
    }
    
}