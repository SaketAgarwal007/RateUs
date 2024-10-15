<?php
require_once "../confiq/confiq.php";
require_once "../session/session.php";
require_once "../app/models/review.php";


class reviewsController{
    private $reviewMod;
    public function __construct($mysqli){
        $this->reviewMod=new reviewModel($mysqli);
    }

    public function reviewMethods(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $review_id=create_unique_id();
            $org_id=$_POST['org_id'];
            $item_id=$_POST['item_id'];
            $review=$_POST['review'];
            if($this->reviewMod->addReview($review_id,$org_id,$item_id,$review)){
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