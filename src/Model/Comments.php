<?php

class Comments
{
    private int $comment_id;
    private String $comment_description;
    private int $User_id;
    private string $date_creation;

    public function getId():int { return $this->comment_id; }
    public function getDesc():String { return $this->comment_description; }
    public function getUserId():int { return $this->User_id; }
    public function getReviews():int { return $this->reviews; }
    public function getDate_Creation():String { return $this->date_creation; }

    public function setName(String $value):void { $this->comment_description = $value; }
    public function setUserId(String $value):void { $this->User_id = $value; }
    public function setReviews(String $value):void { $this->reviews = $value; }
    public function setDate_Creation(String $value):void { $this->date_creation = $value; }

}