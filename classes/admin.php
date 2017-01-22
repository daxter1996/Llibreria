<?php

require_once("person.php");
require_once("libraryUtility.php");


class admin extends person {

    public function __construct($id="",$name="",$surname="",$idCard="",$address="",$password="",$dni="",$email="") {
        parent::__construct($id,$name,$surname,$idCard,$address,$password,$dni,$email);
    }

    public function manageBook(){

    }

    public function manageStock(){

    }

    public function manageUsers(){

    }

    public function addElement(){

    }

    public function manageLibrarian(){

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

    public function makeAdmin($email){
        $bd = bdConect();
        $query = "UPDATE user SET usertype = 'admin' where email = '" . $email . "'";
        try{
            $bd->query($query);
            $bd->close();
            return "The user with email " . $email . " is now admin";
        }catch (mysqli_sql_exception $e){
            return $e;
        }
    }
    public function makePeasant($email){
        $bd = bdConect();
        $query = "UPDATE user SET usertype = 'peasant' where email = '" . $email . "'";
        try{
            $bd->query($query);
            $bd->close();
            return "The user with email " . $email . " is now peasant";
        }catch (mysqli_sql_exception $e){
            return $e;
        }
    }
    public function makeLibrarian($email){
        $bd = bdConect();
        $query = "UPDATE user SET usertype = 'librarian' where email = '" . $email . "'";
        try{
            $bd->query($query);
            $bd->close();
            return "The user with email " . $email . " is now peasant";
        }catch (mysqli_sql_exception $e){
            return $e;
        }
    }

}

?>