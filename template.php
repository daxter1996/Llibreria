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
            <div class="col s12 offset-m1 m4"><img style="width:100%;" src="img/content_<?php echo $llibre->getId(); ?>.jpg"></div>
            <div class="col s12 m6">
                <h2><?php echo $llibre->getTitle(); ?></h2>
                <p><strong>Author: </strong><?php echo $llibre->getAuthor(); ?></p>
                <p><strong>Subject: </strong><?php echo $llibre->getSubject(); ?></p>
                <p><strong>Company: </strong><?php echo $llibre->getCompany(); ?></p>
                <p><strong>Year: </strong><?php echo $llibre->GetYear(); ?></p>
                <p><strong>State: </strong><?php echo $llibre->getState(); ?></p>
                <p><strong>Description:<br/><br/></strong><?php echo $llibre->getDescription(); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 offset-m1">
                <a href='booking.php?id=<?php echo $_GET['id'];?>' class="waves-effect waves-light btn blue-grey darken-1"><i class="material-icons left">bookmark</i>Bookoing</a>
            </div>
        </div>
</div>



<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>