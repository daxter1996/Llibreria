
<?php
    include_once ("classes/libraryUtility.php");
    //INSERT INTO user VALUES ("","asf","asf","asd","sdf","sdf","sdf","fsfd")
    $library = new Utility();
    $conn = $library->bdConect();
    if(isset($_POST["register"])){
        $query = "INSERT INTO user VALUES ('','". $_POST["name"] ."','". $_POST["surname"] ."','". $_POST["email"] ."','". $_POST["password"] ."','". $_POST["address"] ."','". $_POST["dni"] ."','peasant')";
        echo $query;
        mysql_query($query);
        header("Location: index.php");
    }

    if(isset($_POST["login"])) {
        $sql = "SELECT * FROM user WHERE email = '" . $_POST['email'] . "'";
        $result = mysql_query("$sql");
        if ($result === false) {
            echo "No hi ha resultats";
        } else {
            $row = mysql_fetch_assoc($result);
            if ($row['password'] == $_POST["password"]) {
                if($row['usertype']=="peasant"){
                    session_start();
                    $_SESSION["user_id"] = new user($row["id"],$row["name"],$row["surname"],"",$row["address"],$row["password"],$row["dni"],$row["email"]);
                    header("Location: index.php");
                }
                if($row['usertype']=="admin"){
                    session_start();
                    $_SESSION["user_id"] = new admin($row["id"],$row["name"],$row["surname"],"",$row["address"],$row["password"],$row["dni"],$row["email"]);;
                    header("Location: index.php");

                }if($row['usertype']=="librarian"){
                    session_start();
                    $_SESSION["user_id"] = new librarian($row["id"],$row["name"],$row["surname"],"",$row["address"],$row["password"],$row["dni"],$row["email"]);;
                    header("Location: index.php");
                }
            } else {
                echo "Hmmmm algo esta malament";
            }
        }


    }
    mysql_close($conn);
?>









