<?php
require_once(dirname(__DIR__)."/classes/db.php");

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

        function returnBook($id){
            $db = new DB();
            $time = date('Y-m-d');
            $sql = "UPDATE booked SET returned = '".$time."' WHERE idBook = " . $id ." and idUser =". $this->id;
            if($db->insertBd($sql)){
                return "Thanks!";
            }else{
                return "Error!";
            }
        }

        function bookItem($post){
            $db = new DB();
            $firstD = strtotime($_POST["firstD"]);
            $maxDate = strtotime(" + " . $post["maxDay"]  . "days", $firstD);
            $returnD = date('Y-m-d', $maxDate);
            $sql2 = "SELECT * FROM booked WHERE idBook = ".$post["bookId"]." and inDay >= STR_TO_DATE('".$_POST["firstD"]."', '%Y-%m-%d') and outDay <= STR_TO_DATE('".$_POST["firstD"]."', '%Y-%m-%d')";
            $sql1 = "Select * from booked WHERE idBook = ".$post["bookId"]." and outDay > STR_TO_DATE('".$_POST["firstD"]."', '%Y-%m-%d') order by outDay limit 1";
            $consulta = $db->returnFromBd($sql1);
            $consulta1 = $db->returnFromBd($sql2);
            if (empty($consulta1)){
                if(!empty($consulta)){
                    $returnD =  date('Y-m-d', strtotime($consulta["outDay"]. " - 1 days"));
                    if(preg_match("/(\d{4})-(\d{2})-(\d{2})/",$_POST["firstD"])){
                        $sql = "INSERT INTO booked VALUES ('".$_POST["bookId"]."','".$_SESSION["user_id"]->getId()."','".$_POST["firstD"]."','".$returnD."', '')";
                        if($db->insertBd($sql)){
                            return "Booked!";
                        }else{
                            return "Something goes wrong";
                        }
                    }else{
                        return "Format of date invalid";
                    }
                }else{
                    if(preg_match("/(\d{4})-(\d{2})-(\d{2})/",$_POST["firstD"])){
                        $sql = "INSERT INTO booked VALUES ('".$_POST["bookId"]."','".$_SESSION["user_id"]->getId()."','".$_POST["firstD"]."','".$returnD."', '')";
                        if($db->insertBd($sql)){
                            return "Booked!";
                        }else{
                            return "Something goes wrong";
                        }
                    }else{
                        return "Format of date invalid";
                    }
                }
            }else{
                return "Day already booked";
            }
        }


        function cancelBook($id){
            $db = new DB();
            $time = date('Y-m-d');
            //DELETE FROM booked WHERE outDay >= CURDATE()
            $sql = "DELETE from booked WHERE idBook = ".$id." and idUser = " . $this->id. " and outDay >= CURDATE()";
            if($db->insertBd($sql)){
                echo "Thanks!";
                exit();
            }else{
                echo "Error!";
                exit();
            }
        }

        function editProfile($name,$surname,$address){
            $db = new DB();
            $sql = "UPDATE user SET name =('".$name."'), surname =('".$surname ."'), address =('".$address ."') WHERE email = '". $this->email ."'";
            if($name != $this->name || $surname != $this->surname || $address != $this->address){
                if ($db->insertBd($sql)){
                    $_SESSION["user_id"]->setName($_POST["name"]);
                    $_SESSION["user_id"]->setSurname($_POST["surname"]);
                    $_SESSION["user_id"]->setAddress($_POST["address"]);
                    return "Edit Ok";
                }else{
                    return "Some error";
                }
            }else{
                return "No changes detected";
            }
        }

    }

?>