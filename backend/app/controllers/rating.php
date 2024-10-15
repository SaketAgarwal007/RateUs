<?php
require_once "../confiq/confiq.php";
require_once "../session/session.php";
require_once "../app/models/rating.php";


class ratingController{
    private $ratingMod;
    public function __construct($mysqli){
        $this->reviewMod=new ratingModel($mysqli);
    }

    public function ratingMethods(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $rating_id=create_unique_id();
            $item_id=$_POST['item_id'];
            $rating=$_POST['rating'];
            if($this->reviewMod->addRating($rating_id,$item_id,$rating)){
                echo json_encode([
                    'status'=>'success'
                ]);
            }
            else{
                echo json_encode([
                    'status'=>'error'
                ]);             
            }
        }
    }
}

?>