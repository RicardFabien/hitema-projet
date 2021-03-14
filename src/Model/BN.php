<?php

class BN
{
    private int $id;
    private String $name;
    private String $lieu;
    private int $price;
    private string $date_creation;
    private string $description;

    public function getId():int { return $this->id; }
    public function getName():String { return $this->name; }
    public function getLieu():String { return $this->lieu; }
    public function getPrice():int { return $this->price; }
    public function getDate_Creation():String { return $this->date_creation; }
    public function getDescription():String { return $this->description; }

    public function setName(String $value):void { $this->name = $value; }
    public function setLieu(String $value):void { $this->lieu = $value; }
    public function setPrice(String $value):void { $this->price = $value; }
    public function setDate_Creation(String $value):void { $this->date_creation = $value; }
    public function setDescription(String $value):void { $this->description = $value; }

}