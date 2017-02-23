<?php

class DB
{

    function insertBd($insert)
    {
        $bd = $this->bdConect();
        if (!$bd->query($insert)) {
            return false;
        }
        $bd->close();
        return true;
    }

    function bdConect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "testLlibreria";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function returnArrayFrombd($sql)
    {
        $array = array();
        $bd = $this->bdConect();
        $result = $bd->query($sql);
        if ($result === false) {
            echo "No hi ha resultats";
        } else {
            while ($row = $result->fetch_assoc()) {
                array_push($array, $row);
            }
        }
        $bd->close();
        return $array;
    }

    function returnFromBd($sql)
    {
        $bd = $this->bdConect();
        $result = $bd->query($sql);
        if ($result === false) {
            $bd->close();
            return "";
        } else {
            $row = $result->fetch_assoc();
        }
        $bd->close();
        return $row;
    }

}