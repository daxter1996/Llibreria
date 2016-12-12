<?php
/*
include_once("books.php");
include_once("admin.php");
include_once("dvd.php");
include_once("librarian.php");
include_once("magazine.php");
include_once("user.php");
*/
include_once("libraryUtility.php");


$library = new Utility();
/*
foreach ($library->getContent() as $value){
    echo $value;
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
}
*/

/*
$arrayBooks = [new books(12643,"Luna de Pluton","Dross","mystery","DrossCompany",2016,4166,"Niceeee","12n3352l1tn4","Mi libro, luna de pluton, esta siendo un exito en todos los paises de habla hispana"),
    new books(63636,"Harry Potter y el legado magico","J.K. ROWLING","mystery","PUBLICACIONES Y EDICIONES SALAMANDRA, 2016",2016,4164,"New","9788498387544","Lorem Ipsum és un text de farciment usat per la indústria de la tipografia i la impremta. Lorem Ipsum ha estat el text estàndard de la indústria des de l'any 1500, quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogràfiques. "),
    new books(63636,"Harry Potter","J.K. ROWLING","Misterio","PUBLICACIONES Y EDICIONES SALAMANDRA, 2016",2016,4164,"New","9788498387544","Lorem Ipsum és un text de farciment usat per la indústria de la tipografia i la impremta. Lorem Ipsum ha estat el text estàndard de la indústria des de l'any 1500, quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogràfiques. "),
    new books(36346,"El asesinato de Sócrates","Marcos Chicot","Narrative","Planeta",2016,6346,"New","1643n43j6","asdggasgsd"),
    new dvd(56432,"Interestelar","Christopher Nolan","Ciencia Ficcion","Planeta",2016,5654,"New","Al ver que la vida en la Tierra está llegando a su fin, un grupo de exploradores dirigidos por el piloto Cooper (McConaughey) y la científica Amelia (Hathaway) emprenden una misión que puede ser la más importante de la historia de la humanidad: viajan más allá de nuestra galaxia para descubrir otra que pueda garantizar el futuro de la raza humana. "),
    ];
*/
function findBookById($id, $arrayBooks){
    foreach ($arrayBooks as $value){
        if($value->getId() == $id){
            return $value;
        }
    }
}

function findBookByISBN($isbn, $arrayBooks){
    foreach ($arrayBooks as $value){
        if($value->getIsbn() == $isbn){
            return $value;
        }
    }
}

function findBookByAuthor($author, $arrayB){
    $array = [];
    foreach ($arrayB as $value){
        if(strtolower($value->getAuthor()) == strtolower($author)){
            array_push($array,$value);
        }
    }
    return $array;
}

function findBookByTitle($title, $arrayB){
    $array = [];
    foreach ($arrayB as $value){
        $pos = strpos(strtolower($value->getTitle()), strtolower($title));
        if(strtolower($value->getTitle()) == strtolower($title) | $pos !== false){
            array_push($array,$value);
        }
    }
    return $array;
}

function findBookBySubject($subject, $arrayB){
    $array = [];
    foreach ($arrayB as $value){
        if(strtolower($value->getSubject()) == strtolower($subject)){
            array_push($array,$value);
        }
    }
    return $array;
}




?>