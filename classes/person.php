<?php
require_once("db.php");

    abstract class person{
        protected $id;
        protected $name;
        protected $surname;
        protected $idCard;
        protected $address;
        protected $password;
        protected $dni;
        protected $email;
        /*Getters and setters*/
        public function getId(){return $this->id;}
        public function setId($id){$this->id = $id;}
        public function getName(){return $this->name;}
        public function setName($name){$this->name = $name;}
        public function getSurname(){return $this->surname;}
        public function setSurname($surname){$this->surname = $surname;}
        public function getIdCard(){return $this->idCard;}
        public function setIdCard($idCard){$this->idCard = $idCard;}
        public function getAddress(){return $this->address;}
        public function setAddress($address){$this->address = $address;}
        public function getPassword(){return $this->password;}
        public function setPassword($password){$this->password = $password;}
        public function getDni(){return $this->dni;}
        public function setDni($dni){$this->dni = $dni;}
        public function getEmail(){return $this->email;}
        public function setEmail($email){$this->email = $email;}
        /*Constructor*/
        public function __construct($id="",$name="",$surname="",$idCard="",$address="",$password="",$dni="",$email="") {
           $this->id = $id;
           $this->name = $name;
           $this->surname = $surname;
           $this->idCard = $idCard;
           $this->address = $address;
           $this->password = $password;
           $this->dni = $dni;
           $this->email = $email;
        }

        public function deleteAcc(){
            $db = new DB();
            $sql = "delate from users where email = '".$this->email."'";
            return $db->insertBd($sql);
        }

        function login(){
            $db = new DB();
            $sql = "SELECT * FROM user WHERE email = '" . $_POST["email"] . "'";
            $row = $db->returnFromBd($sql);
            if ($row['password'] == $_POST["password"]) {
                if ($row['usertype'] == "user") {
                    $_SESSION["user_id"] = new user($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
                    echo "Login OK";
                }
                if ($row['usertype'] == "admin") {
                    $_SESSION["user_id"] = new admin($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
                    echo "Login OK";
                }
                if ($row['usertype'] == "librarian") {
                    $_SESSION["user_id"] = new librarian($row["id"], $row["name"], $row["surname"], "", $row["address"], $row["password"], $row["dni"], $row["email"]);
                    echo "Login OK";
                }
            } else {
                echo "Login Failed";
                exit();
            }
        }
    }
?>