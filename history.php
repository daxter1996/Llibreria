<?php include_once "header.php"; ?>
<?php

$llibre = $library->getBookById($_GET["id"]);
$sql = "SELECT * FROM booked inner join items INNER join user where idBook = items.id and idUser = user.id and idBook = " . $_GET["id"];
$db = new DB();
$info = $db->returnArrayFrombd($sql);
?>
<body>
<br/>
<div class="containter alturaMinima">
    <div class="row">
        <div class="col s12 center">
            <h3>History of <?php echo $llibre->getTitle() ?></h3>
        </div>
        <div class="col s12">
            <strong>Total reservations:</strong> <?php echo count($info); ?><br/>
        </div>
        <div class="col m12 s12 ">
            <h5 class="center">All reservations:</h5>
            <hr/>
            <?php
            foreach ($info as $value){
                $date1 = date("Y-m-d",strtotime($value["outDay"]));
                $date2 = date("Y-m-d",strtotime($value["inDay"]));
                $returnDate = date("Y-m-d",strtotime($value["returned"]));
                $time1 = new DateTime($date1);
                $time2 = new DateTime($date2);
                $returned = new DateTime($returnDate);
                $atTime = "";
                if($time1 < $returned){
                    $atTime = "green-text";
                }else{
                    $atTime = "red-text";
                }

                echo "<strong>User Email: </strong>". $value["email"];
                echo "<br/><strong>Out Day: </strong>". $value["outDay"];
                echo "<br/><strong>In Day: </strong>". $value["inDay"];
                echo "<br/><span class='". $atTime ."'>".$time1->diff($time2)->format('Rented for %a Days')."</span>";
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