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
            $org_id=$_POST['org_id'];
            $item_id=$_POST['item_id'];
            $rating=$_POST['rating'];
            if($this->reviewMod->addRating($rating_id,$org_id,$item_id,$rating)){
                //model ko call
                $postData = [
                    'org_id' => $org_id,
                    'item_id' => $item_id,
                    'rating_id' => $rating_id,
                ];
            
                // Initialize cURL
                $ch = curl_init('http://localhost:8000/submit-review');  // URL of Flask endpoint
            
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
            
                // Execute cURL request
                $response = curl_exec($ch);
            
                // Check for cURL errors
                if (curl_errno($ch)) {
                    echo 'Request Error: ' . curl_error($ch);
                } else {
                    // Process response
                    echo 'Flask response: ' . $response;
                }
            
                // Close cURL
                curl_close($ch);

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