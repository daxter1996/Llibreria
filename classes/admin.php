<?php

require_once("person.php");
require_once("libraryUtility.php");


class admin extends person
{

    public function __construct($id = "", $name = "", $surname = "", $idCard = "", $address = "", $password = "", $dni = "", $email = "")
    {
        parent::__construct($id, $name, $surname, $idCard, $address, $password, $dni, $email);
    }

    public function __toString()
    {
        return "ID: " . $this->id .
        "<br/>Name: " . $this->name .
        "<br/>Sirname: " . $this->surname .
        "<br/>Idcard: " . $this->idCard .
        "<br/>Address: " . $this->address .
        "<br/>Password: " . $this->password .
        "<br/>DNI: " . $this->dni .
        "<br/>Email: " . $this->email;
    }

    public function makeAdmin($email)
    {
        $bd = new DB();
        $query = "UPDATE user SET usertype = 'admin' where email = '" . $email . "'";
        try {
            $bd->insertBd($query);
            return "The user with email " . $email . " is now admin";
        } catch (mysqli_sql_exception $e) {
            return $e;
        }
    }

    public function makePeasant($email)
    {
        $bd = new DB();
        $query = "UPDATE user SET usertype = 'peasant' where email = '" . $email . "'";
        try {
            $bd->insertBd($query);
            return "The user with email " . $email . " is now peasant";
        } catch (mysqli_sql_exception $e) {
            return $e;
        }
    }

    public function makeLibrarian($email)
    {
        $bd = new DB();
        $query = "UPDATE user SET usertype = 'librarian' where email = '" . $email . "'";
        try {
            $bd->insertBd($query);
            return "The user with email " . $email . " is now peasant";
        } catch (mysqli_sql_exception $e) {
            return $e;
        }
    }

    function registerUser($post)
    {
        $query = "INSERT INTO user VALUES ('','" . $post["name"] . "','" . $post["surname"] . "','" . $post["email"] . "','" . $post["password"] . "','" . $post["address"] . "','" . $post["dni"] . "','" . $post["userType"] . "')";
        $db = new DB();
        if ($db->insertBd($query)) {
            return "User Registered!";
        } else {
                return "Register Error";
        }
    }

    function deleteUser($email)
    {
        $db = new DB();
        $sql = "DELETE FROM user WHERE email = '" . $email . "'";
        if ($db->insertBd($sql)) {
            return "User with email " . $email . " deleted.";
        } else {
            return "Some error";
        }
    }

    function removeItem($id1)
    {
        $id = end(explode("=", $id1));
        $db = new DB();
        $sql = "INSERT INTO deleteditems SELECT * FROM items WHERE id = " . $id;
        $sql2 = "DELETE FROM items WHERE id = " . $id;
        if ($db->insertBd($sql) && $db->insertBd($sql2)) {
            $route = "../img/item/";
            $glob = glob($route . "*_" . $id . ".*");
            if (!empty($glob)) {
                foreach ($glob as $value) {
                    $ex = explode("/", $value);
                    rename($value, $route . "/deleted/" . end($ex));
                }
            }
            return "Item removed " . $id;
        } else {
            return "Error, Item not Found";
        }
    }

    function settings($post){
        $route = "../settings/settings.txt";

        $tmp = "borrow=". $post["borrow"] . PHP_EOL;
        $tmp .= "protection=med,". $post["mediumProtection"] . ";high," . $post["highProtection"]. ";low," . $post["lowProtection"] . PHP_EOL;
        $tmp .= "lending=dvd,". $post["dvd"] . ";book," . $post["book"]. ";magazine," . $post["magazine"] . PHP_EOL;
        $tmp .= "penality=". $post["penalty"] . PHP_EOL;


        $file = fopen($route, "wb");
        fwrite($file,$tmp);
        fclose($file);
        echo ("The settings has been changed correctly");
    }


}
?>