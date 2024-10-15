<?php

class ratingModel{
    private $mysqli;
    public function __construct($mysqli){
        $this->mysqli=$mysqli;
    }
    public function addRating($rating_id,$item_id,$rating){
        $sql="INSERT INTO Ratings (Rating_ID, Item_ID, Rating) VALUES (?,?,?);";
        $stmt=$this->mysqli->prepare($sql);
        $stmt->bind_param("sss",$rating_id,$item_id,$rating);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }


    }
}


?>