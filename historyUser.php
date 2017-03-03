<?php include_once "header.php"; ?>
<?php
$sql = "SELECT * from USER WHERE id = " . $_GET["id"];
$reservations = "SELECT * FROM booked inner join items INNER join user where idBook = items.id and idUser = user.id and idUser = " . $_GET["id"];
$db = new DB();
$info = $db->returnFromBd($sql);
$res = $db->returnArrayFrombd($reservations);
?>
<body>
<br/>
<div class="containter">
    <div class="row">
        <div class="col s12 center">
            <h3>History of <?php echo $info["name"] ?></h3>
            <hr/>
            <div id="userStat" style="height: 400px;"></div>
        </div>
        <div class="col s12">
            <hr/>
            <h5>Total: <?php echo count($res); ?></h5>
        </div>
        <div class="col m12 s12 ">
            <br/>
            <h5 class="center">All</h5>
            <hr/>
            <?php
                foreach ($res as $value){
                    $time = strtotime($value["outDay"]);
                    $time2 = strtotime($value["inDay"]);
                    $date1 = date("Y-m-d",$time);
                    $date2 = date("Y-m-d",$time2);
                    $datet = new DateTime($date1);
                    $datet2 = new DateTime($date2);
                    echo "<strong>Title: </strong>" . $value["title"];
                    echo "<br/>";
                    echo "<strong>ID: </strong>" . $value["id"];
                    echo "<br/>";
                    echo "<strong>Out Day: </strong>" . $value["outDay"];
                    echo "<br/>";
                    echo "<strong>In Day: </strong>" . $value["inDay"];
                    echo "<br/>";
                    echo $datet->diff($datet2)->format('Rent for %a Days');
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
<script type="text/javascript" src="js/canvasjs/canvasjs.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
    });
    $(document).ready(function () {
        $('.tooltipped').tooltip({delay: 50});
    });

    //-----------
    var url = "js/month.php?userId=" + "<?php echo $_GET["id"]; ?>";
    console.log(url);

    $.getJSON(url, function (data1) {
        console.log(data1);
        var chart = new CanvasJS.Chart("userStat", {
            title: {
                text: "Activity Per Month"
            },
            axisX: {
                interval: 1
            },
            data: [{
                type: "line",
                dataPoints: data1
            }]
        });
        chart.render();
    });
</script>


</body>
<?php include_once "footer.php"; ?>
</html>