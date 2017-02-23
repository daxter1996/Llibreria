<?php
include_once "header.php";
$db = new DB();
$sql = "SELECT * FROM booking inner join items  INNER join user where idUser = " . $_SESSION["user_id"]->getId() . " and idBook = items.id and idUser = user.id";
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
                    echo "<strong>Back Day:</strong> " . $value["backDay"] . "<br/><br/>";
                    echo "<a class='btn blue-grey' href='http://localhost/web/Llibreria/template.php?id=" . $value["idBook"] . "'>Return</a>";
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
<script type="text/javascript">
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
</script>
</body>
<?php include_once "footer.php"; ?>
</html>