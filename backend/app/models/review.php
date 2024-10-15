<?php

class reviewModel{
    private $mysqli;
    public function __construct($mysqli){
        $this->mysqli=$mysqli;
    }
    public function addReview($review_id,$item_id,$review){
        $sql="INSERT INTO Reviews (Review_ID,Item_ID, Review) VALUES (?,?,?)";
        $stmt=$this->mysqli->prepare($sql);
        $stmt->bind_param("sss",$review_id,$item_id,$review);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }


    }
}


?>