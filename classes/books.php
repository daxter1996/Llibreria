<?php

include_once("item.php");

class books extends item{

    protected $isbn;



    public function getIsbn(){return $this->isbn;}
    public function setIsbn($isbn){$this->isbn = $isbn;}

    public function __construct($id="",$title="",$author="",$subject="",$company="",$year="",$editionNumber="",$state="",$isbn="",$description="") {
        parent::__construct($id,$title,$author,$subject,$company,$year,$editionNumber,$state,$description);
        $this->isbn = $isbn;
    }

    public function __toString(){
        return "ID: " . $this->id .
        "<br/>Title: " . $this->title.
        "<br/>Author: " . $this->author.
        "<br/>Subject: " . $this->subject.
        "<br/>Company: " . $this->company.
        "<br/>Year: " . $this->year.
        "<br/>EditionNumber: " . $this->editionNumber.
        "<br/>State: " . $this->state.
        "<br/>ISBN: " . $this->isbn.
        "<br/>Desctiption: " . $this->description;
    }

}