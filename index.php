<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<header>
   <?php include_once "header.php";
   /*if($_SESSION["user_id"] instanceof admin){
       echo $_SESSION["user_id"];
   }*/
   ?>
</header>
<body>
<br/>
<div class="containter">
    <div class="row">
        <div class="col s12 m6 offset-m1">
            <h1>Library</h1>
            <p>Libray description</p>
        </div>

    </div>
    <div class="row">
        <div class="col s12 m6 offset-m1">
            <h3>Highlights</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1">
        <!-- Plantila vista general de un libre-->
            <?php
            foreach ($library->getContent() as $value) {
                echo "<div class='col s12 m3'>";
                echo "<div class='card'>";
                echo "<div class='card-image'>";
                echo "<img src='img/portada_" . $value->getId() . ".jpg'>";
                echo "</div>";
                echo "<div class='card-content'style='min-height: 300px;'>";
                echo "<h5>" . $value->getTitle() . "</h5>";
                echo "<p><strong>Type: </strong>" . get_class($value)  . "</p>";
                echo "<p><strong>Author: </strong>" . $value->getAuthor() . "</p>";
                echo "<p><strong>Subject: </strong>" . $value->getSubject() . "</p>";
                echo "<p><strong>Company: </strong>" . $value->getCompany() . "</p>";
                echo "<p><strong>Year: </strong>" . $value->getYear() . "</p>";
                echo "<p><strong>State: </strong>" . $value->getState() . "</p>";
                echo "</div>";
                echo "<div class='card-action'>";
                echo "<a href='template.php?id=" . $value->getId() . "'>See more</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>