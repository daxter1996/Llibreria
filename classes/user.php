<?php

include_once("person.php");


class user extends person {

    public function __construct($id="",$name="",$surname="",$idCard="",$address="",$password="",$dni="",$email="") {
        parent::__construct($id,$name,$surname,$idCard,$address,$password,$dni,$email);
    }

    public function __toString(){
        return "ID: " . $this->id .
        "<br/>Name: " . $this->name.
        "<br/>Sirname: " . $this->surname.
        "<br/>Idcard: " . $this->idCard.
        "<br/>Address: " . $this->address.
        "<br/>Password: " . $this->password.
        "<br/>DNI: " . $this->dni.
        "<br/>Email: " . $this->email;
    }
}