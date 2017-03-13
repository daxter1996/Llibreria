<?php
include_once "header.php";
if (!isset($_SESSION["user_id"]) || !$_SESSION["user_id"] instanceof librarian) {
    die("Page not Aviable");
}
?>
<body>
<div class="containter alturaMinima">
    <div class="col s12">
        <ul class="tabs blue-grey">
            <li class="tab col s6"><a class="active" href="#manageUsers">History User</a></li>
            <li class="tab col s6"><a href="#stadistic">STATISTICS</a></li>
        </ul>
    </div>

    <div class="row">
        <div id="manageUsers" class="col s12 m9 offset-l1">
            <h5>Search User</h5>
            <div class="input-field col s12">
                <input type="text" list="userList" id="userListSuggest" class="validate">
                <datalist id="userList">
                </datalist>
                <label for="userList">Email</label>
            </div>
            <div class="col s12" id="userHistorySearch">
                <!-- All content from users search -->

            </div>
        </div>

        <div id="stadistic">
            <ul class="tabs blue-grey">
                <li class="tab col s2"><a class="active" href="#top10chard">Top 10</a></li>
            </ul>
            <div class="container" id="top10chard">
                <div id="top10"  style="height: 400px"></div>
            </div>
        </div>
    </div>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
    });

    $(document).ready(function () {
        $('select').material_select();
    });

    $(document).ready(function () {
        $('input#input_text, textarea#textarea1').characterCounter();
    });

    $(document).ready(function () {
        $('ul.tabs').tabs();
    });

    $(document).ready(function () {
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
<script type="text/javascript">
    $.getJSON('js/stadistic.php', function (data) {
        console.log(data);
        var chart = new CanvasJS.Chart("top10",
            {
                theme: "theme1",
                title: {
                    text: "Top 10 Booked Items"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{y} - #percent %",
                        legendText: "{indexLabel}",
                        dataPoints: data
                    }
                ]
            });
        chart.render();
    });

</script>
<script src="js/canvasjs/canvasjs.min.js"></script>
<script src="controllerjs/librarian.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>