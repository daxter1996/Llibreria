<?php

if (!$enlace = mysql_connect('localhost', 'root', '')) {
    echo 'No pudo conectarse a mysql';
    exit;
}

if (!mysql_select_db('testllibreria', $enlace)) {
    echo 'No pudo seleccionar la base de datos';
    exit;
}



?>