<?php

require_once("person.php");
require_once("libraryUtility.php");


class admin extends person {

    public function __construct($id="",$name="",$surname="",$idCard="",$address="",$password="",$dni="",$email="") {
        parent::__construct($id,$name,$surname,$idCard,$address,$password,$dni,$email);
    }

    public function addElement($title,$author,$subject,$company,$year,$editionNumber,$state,$description,$isbn,$type){
        $db = new DB();
        //$sql = "Insert into items VALUES ('','")";
        $sql = "Insert into items VALUES ('','".$title."','".$author."','".$subject."','".$company."','".$year."','".$editionNumber."','".$state."','".$description."','5','".$isbn."','".$type."')";
        $db->insertBd($sql);
        $return = $db->returnFromBd("SELECT * FROM items ORDER BY id DESC LIMIT 1");

        $check = getimagesize($_FILES["inPhoto"]["tmp_name"]);
        $check1 = getimagesize($_FILES["mainPhoto"]["tmp_name"]);
        $target_dir = "img/item/";
        $file_ext = strtolower(end(explode('.', $_FILES['mainPhoto']['name'])));

        if ($check !== false && $check1 !== false) {
            $target_file_content = $target_dir . "content_" . $return["id"] . '.' . $file_ext;
            $target_file_main = $target_dir . "portada_". $return["id"] . '.' . $file_ext;
            if (file_exists($target_file_main) || file_exists($target_file_content)) {
                unlink($target_file_main);
                unlink($target_file_content);
            }
            move_uploaded_file($_FILES["mainPhoto"]["tmp_name"], $target_file_main);
            move_uploaded_file($_FILES["inPhoto"]["tmp_name"], $target_file_content);

            return 'Files was uploaded.';
        } else {
            return 'File is not an image.';
        }
        return 'Some error';
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
    function registerUser($registerName,$surname,$email,$password,$address,$dni,$usertype){
        $query = "INSERT INTO user VALUES ('','" . $registerName . "','" . $surname . "','" . $email . "','" . $password . "','" . $address . "','" . $dni . "','".$usertype ."')";
        insertBd($query);
        echo "Register Successfull";
    }

}

?>