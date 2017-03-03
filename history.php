<?php include_once "header.php"; ?>
<?php
$llibre = $library->getBookById($_GET["id"]);
$sql = "SELECT * FROM booked inner join items INNER join user where idBook = items.id and idUser = user.id and idBook = " . $_GET["id"];
/*
$atTime = "SELECT * FROM booked inner join items INNER join user where idBook = items.id and idUser = user.id and idBook = " . $_GET["id"] ." and returned <= inDay" ;
$returnedLate = "SELECT * FROM booked inner join items INNER join user where idBook = items.id and idUser = user.id and idBook = " . $_GET["id"] ." and returned > inDay" ;*/
$db = new DB();
$info = $db->returnArrayFrombd($sql);
/*
$returnedAtTime = $db->returnArrayFrombd($atTime);
$late = $db->returnArrayFrombd($returnedLate);
*/
?>
<body>
<br/>
<div class="containter">
    <div class="row">
        <div class="col s12 center">
            <h3>History of <?php echo $llibre->getTitle() ?></h3>
        </div>
        <div class="col s12">
            <strong>Total reservations:</strong> <?php echo count($info); ?><br/>
        </div>
        <div id="rentMonth1" style="height: 400px;"></div>
        <div class="col m12 s12 ">
            All reservations:<hr/>
            <?php
            foreach ($info as $value){
                echo print_r($value);
                echo "<hr/>";
            }
            ?>
        </div>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="controllerjs/catalog.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
    });
    $(document).ready(function () {
        $('.tooltipped').tooltip({delay: 50});
    });
</script>

</body>
<?php include_once "footer.php"; ?>
</html>