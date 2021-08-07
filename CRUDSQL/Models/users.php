<?php

namespace Models;

class Users{

    private $id;
    private $firstname;
    private $email;
    private $reg_date;

    public function __construct($firstname, $email){

        $this -> $name;
        $this -> $email;
    }

    public function setID($id){
        $this -> $id;
    }

    public function getId(){
        return $this->$id;
    }

    public function setName($name){
        $this -> $name;
    }

    public function getName(){
        return $this->$name;
    }

    public function setEmail($email){
        $this -> $email;
    }

    public function getEmail(){
        return $this->$email;
    }

    public function setRegDate($reg_date){
        $this -> $reg_date;
    }

    public function getRegDate(){
        return $this->$reg_date;
    }
}