    <?php include_once "header.php"; ?>
<body>
<br/>
<div class="containter">
    <div class="row">
        <form method="post" action="catalog.php" class="col m8 s12 offset-m2">
            <div class="row">
                <div class="input-field col s12 m6">
                    <select name="option">
                        <option value="title" name="title">Title</option>
                        <option value="author">Author</option>
                        <option value="subject">Subject</option>
                    </select>
                    <label>Search By: </label>
                </div>
                <div class="input-field col s12 m6 ">
                    <input id="surname" name="word" type="text" class="validate" required>
                    <label for="word">Word</label>
                </div>
                <div class="input-field col s12 ">
                    <input class="aves-effect waves-light btn blue-grey darken-1" id="login" type="submit" name="search" class="validate" value="Search">
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col s12 m6 offset-m1">
            <h3>Catalogue</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m10 offset-m1">
            <!-- Plantila vista general de un libre-->
            <?php
            if(!isset($_POST["search"])) {
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
            }else{
                $arraySearch = [];
                if($_POST["option"] == "author"){
                    $arraySearch = $library->findBookByAuthor($_POST["word"]);
                }elseif ($_POST["option"] == "subject"){
                    $arraySearch = $library->findBookBySubject($_POST["word"]);
                }elseif ($_POST["option"] == "title"){
                    $arraySearch = $library->findBookByTitle($_POST["word"]);
                }
                if(count($library->getContent()) != 0) {
                    foreach ($arraySearch as $value) {
                        echo "<div class='col s12 m3'>";
                        echo "<div class='card'>";
                        echo "<div class='card-image'>";
                        echo "<img src='img/portada_" . $value->getId() . ".jpg'>";
                        echo "</div>";
                        echo "<div class='card-content'style='min-height: 300px;'>";
                        echo "<h5>" . $value->getTitle() . "</h5>";
                        echo "<p><strong>Type: </strong>" . get_class($value) . "</p>";
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
                }else{
                    echo "No books found";
                }
            }
            ?>
        </div>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
</body>
<?php include_once "footer.php"; ?>
</html>