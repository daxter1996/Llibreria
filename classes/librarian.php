<?php

include_once("person.php");
include_once("libraryUtility.php");

class librarian extends person {

    public function __construct($id="",$name="",$surname="",$idCard="",$address="",$password="",$dni="",$email="") {
        parent::__construct($id,$name,$surname,$idCard,$address,$password,$dni,$email);
    }

    public function viewStock(){

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

    public function manageUsers(){

    }
}