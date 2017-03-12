<?php

require_once(dirname(__DIR__)."/classes/books.php");
require_once(dirname(__DIR__)."/classes/admin.php");
require_once(dirname(__DIR__)."/classes/dvd.php");
require_once(dirname(__DIR__)."/classes/librarian.php");
require_once(dirname(__DIR__)."/classes/magazine.php");
require_once(dirname(__DIR__)."/classes/user.php");
require_once(dirname(__DIR__)."/classes/db.php");
error_reporting(E_ALL);

class Utility {
    private $content = [];
    public function getContent(){return $this->content;}
    public function setContent($content){$this->content = $content;}

    function __construct(){
        //$this->getAllContentFromBd();
    }

    public function getAllContentFromBd(){
        $db = new DB();
        $con = $db->bdConect();
        $sql = "SELECT * FROM items";
        $result = $con->query($sql);
        if ($result === false) {
            echo "No results found";
        } else {
            while ($row = $result->fetch_assoc()) {
                if ($row["type"] == 1) {
                    array_push($this->content, new books($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["ISBN"], $row["description"]));
                } elseif ($row["type"] == 2) {
                    array_push($this->content, new dvd($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["description"]));
                } elseif ($row["type"] == 3) {
                    array_push($this->content, new magazine($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["ISBN"], $row["description"]));
                }
            }
        }
        $con->close();
    }

    public function getBookById($id){
        $db = new DB();
        $con = $db->bdConect();
        $sql = "SELECT * FROM items Where id = ".$id;
        $result = $con->query($sql);
        if ($result === false) {
            echo "No results found";
        } else {
            $row = $result->fetch_assoc();
            if ($row["type"] == 1) {
                return new books($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["ISBN"], $row["description"]);
            } elseif ($row["type"] == 2) {
                return new dvd($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["description"]);
            } elseif ($row["type"] == 3) {
                return new magazine($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["ISBN"], $row["description"]);
            }
        }
        mysql_close($con);
    }

    public function findBookById($id){
        foreach ($this->content as $value){
            if($value->getId() == $id){
                return $value;
            }
        }
    }

    public function findBookByISBN($isbn){
        foreach ($this->content as $value){
            if($value->getIsbn() == $isbn){
                return $value;
            }
        }
    }

    public function findBookByAuthor($author){
        $array = [];
        foreach ($this->content as $value){
            $pos = strpos(strtolower($value->getAuthor()), strtolower($author));
            if(strtolower($value->getAuthor()) == strtolower($author) | $pos !== false){
                array_push($array,$value);
            }
        }
        return $array;
    }

    public function findBookByTitle($title){
        $array = [];
        foreach ($this->content as $value){
            $pos = strpos(strtolower($value->getTitle()), strtolower($title));
            if(strtolower($value->getTitle()) == strtolower($title) | $pos !== false){
                array_push($array,$value);
            }
        }
        return $array;
    }

    public function findBookBySubject($subject){
        $array = [];
        foreach ($this->content as $value){
            $pos = strpos(strtolower($value->getSubject()), strtolower($subject));
            if(strtolower($value->getSubject()) == strtolower($subject) | $pos !== false){
                array_push($array,$value);
            }
        }
        return $array;
    }
}//End Of Class