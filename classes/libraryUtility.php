<?php
include_once("books.php");
include_once("admin.php");
include_once("dvd.php");
include_once("librarian.php");
include_once("magazine.php");
include_once("user.php");

class Utility {

    private $content = [];

    public function getContent(){return $this->content;}
    public function setContent($content){$this->content = $content;}

    function __construct(){
        $this->getAllContentFromBd();
    }

    public function getAllContentFromBd(){
        $con = $this->bdConect();
        $sql = "SELECT * FROM items";
        $result = mysql_query("$sql");
        if ($result === false) {
            echo "No results found";
        } else {
            while ($row = mysql_fetch_assoc($result)) {
                if ($row["type"] == 0) {
                    array_push($content, new books($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["ISBN"], $row["description"]));
                } elseif ($row["type"] == 2) {
                    array_push($this->content, new dvd($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["description"]));
                } elseif ($row["type"] == 3) {
                    array_push($this->content, new magazine($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["ISBN"], $row["description"]));
                }
            }
        }
        mysql_close($con);
    }

    public function getBookById($id){
        $con = $this->bdConect();
        $sql = "SELECT * FROM items Where id = ".$id;
        $result = mysql_query("$sql");
        if ($result === false) {
            echo "No results found";
        } else {
            $row = mysql_fetch_assoc($result);
            if ($row["type"] == 0) {
                return new books($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["ISBN"], $row["description"]);
            } elseif ($row["type"] == 2) {
                return new dvd($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["description"]);
            } elseif ($row["type"] == 3) {
                return new magazine($row["id"], $row["title"], $row["author"], $row["subject"], $row["company"], $row["year"], $row["editionNumber"], $row["state"], $row["ISBN"], $row["description"]);
            }
        }
        mysql_close($con);
    }

    public function bdConect(){
        if (!$enlace = mysql_connect('localhost', 'root', '')) {
            echo 'No pudo conectarse a mysql';
            exit;
        }

        if (!mysql_select_db('testllibreria', $enlace)) {
            echo 'No pudo seleccionar la base de datos';
            exit;
        }
        return $enlace;
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
            if(strtolower($value->getAuthor()) == strtolower($author)){
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
            if(strtolower($value->getSubject()) == strtolower($subject)){
                array_push($array,$value);
            }
        }
        return $array;
    }
}