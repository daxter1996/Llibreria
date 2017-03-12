<?php
include_once "header.php";
$db = new DB();
$sql = "SELECT * FROM booked inner join items  INNER join user where idUser = ". $_SESSION["user_id"]->getId() ."  and idBook = items.id and idUser = user.id AND curdate()BETWEEN outDay AND inDay and returned = \"0000-00-00\"";
$books = $db->returnArrayFrombd($sql);
?>
<body>
<br/>
<div class="containter">
    <div class="row">
        <div class="col s12 center">
            <h4><strong><?php echo $_SESSION["user_id"]->getName() ?></strong>, you have booked this books.</h4>
        </div>
        <hr/>
        <div class="col s10 offset-l1">
            <?php
            if (!empty($books)) {
                foreach ($books as $value) {
                    echo "<strong>ID:</strong> " . $value["idBook"] . "<br/>";
                    echo "<strong>Title:</strong> " . $value["title"] . "<br/>";
                    echo "<strong>Back Day:</strong> " . $value["inDay"] . "<br/><br/>";
                    echo "<a id='returnList' class='btn blue-grey' href=#".$value["idBook"].">Return</a>";
                    echo "<hr/>";
                }
            } else {
                echo "<h5>Nothing to return!</h5>";
            }

            ?>

        </div>
    </div>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="controllerjs/catalog.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>