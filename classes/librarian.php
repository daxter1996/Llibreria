<?php

include_once("person.php");

class librarian extends person {

    public function __construct($id="",$name="",$surname="",$idCard="",$address="",$password="",$dni="",$email="") {
        parent::__construct($id,$name,$surname,$idCard,$address,$password,$dni,$email);
    }


    public function insertBookBD($book){
        if (!$conn = mysql_connect('localhost', 'root', '')) {
            echo 'No pudo conectarse a mysql';
            exit;
        }
        if (!mysql_select_db('books', $conn)) {
            echo 'No pudo seleccionar la base de datos';
            exit;
        }

        $query = "INERT INTO books VALUES ()";

    }

    public function viewStock(){

    }

    public function addElement(){

    }

    public function manageUsers(){

    }
}