<?php

include_once("item.php");

class dvd extends item{

    public function __construct($id="",$title="",$author="",$subject="",$company="",$year="",$editionNumber="",$state="",$description="") {
        parent::__construct($id,$title,$author,$subject,$company,$year,$editionNumber,$state,$description);
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
        "<br/>Desctiption: " . $this->description;
    }
}