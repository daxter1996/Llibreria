<?php

abstract class item{
    protected $id;
    protected $title;
    protected $author;
    protected $subject;
    protected $company;
    protected $year;
    protected $editionNumber;
    protected $state;
    protected $description;

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}
    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}
    public function getAuthor(){return $this->author;}
    public function setAuthor($author){$this->author = $author;}
    public function getSubject(){return $this->subject;}
    public function setSubject($subject){$this->subject = $subject;}
    public function getCompany(){return $this->company;}
    public function setCompany($company){$this->company = $company;}
    public function getYear(){return $this->year;}
    public function setYear($year){$this->year = $year;}
    public function getEditionNumber(){return $this->editionNumber;}
    public function setEditionNumber($editionNumber){$this->editionNumber = $editionNumber;}
    public function getState(){return $this->state;}
    public function setState($state){$this->state = $state;}
    public function getDescription(){return $this->description;}
    public function setDescription($description){$this->description = $description;}

    public function __construct($id="",$title="",$author="",$subject="",$company="",$year="",$editionNumber="",$state="",$description="") {
        $this->description = $description;
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->subject = $subject;
        $this->company = $company;
        $this->year = $year;
        $this->editionNumber = $editionNumber;
        $this->state = $state;
    }

}