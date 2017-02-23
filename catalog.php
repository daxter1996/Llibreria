<?php include_once "header.php"; ?>
<body>
<br/>
<div class="containter">
    <div class="row">
        <form method="post" class="col m8 s12 offset-m2">
            <div class="row">
                <div class="input-field col s12 m6" id="search1">
                    <select name="searchOption" id="searchOption">
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                        <option value="subject">Subject</option>
                    </select>
                    <label for="searchOption">Search By: </label>
                </div>
                <div class="input-field col s12 m6 ">
                    <input id="searchIn" name="searchIn" type="text" class="validate" required>
                    <label for="word">Word</label>
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
        <div class="col s12 m10 offset-m1" id="searchResult">
            <!-- Plantila vista general de un libre-->
            <?php
            foreach ($library->getContent() as $value) {
                echo "<div class='col s12 m3'>";
                echo "<div class='card'>";
                echo "<div class='card-image'>";
                $fileName = glob("img/item/portada_" . $value->getId() . ".*");
                echo "<img src='" . $fileName[0] . "'>";
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
        $('select').material_select();
    });
    $(document).ready(function () {
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
</body>
<?php include_once "footer.php"; ?>
</html>