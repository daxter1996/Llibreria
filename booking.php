<!DOCTYPE html>
<html>
<head>
    <title>Catalog</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<header>
    <?php include_once "header.php"; ?>
    <?php
    $llibre = $library->getBookById($_GET["id"])
    ?>
</header>
<body>
<br/>
<div class="containter">
    <div class="row">
        <h1 class="center">Booking</h1>
        <div class="offset-m1 col s12 m5">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="img/content_<?php echo $llibre->getId(); ?>.jpg" style="height: 200px">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h5>Item to rent</h5>
                        <p><strong>Title:</strong> <?php echo $llibre->getTitle(); ?></p>
                        <p><strong>State: </strong><?php echo $llibre->getState(); ?></p>

                    </div>
                </div>
            </div>
        </div>
        <form class="col m5 s12">
            <h5>First Day</h5>
            <input type="date" class="datepicker" name="firstD" id="firstDay">
            <h5>Return Day</h5>
            <input type="date" class="datepicker" name="firstD" id="returnD">
        </form>
    </div>
</div>



<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>
</body>
<?php include_once "footer.php"; ?>
</html>