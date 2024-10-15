<?php
require_once "../confiq/confiq.php";
require_once "../session/session.php";
require_once "../app/controllers/user.php";
require_once "../app/controllers/organization.php";
require_once "../app/controllers/items.php";
require_once "../app/controllers/review.php";
require_once "../app/controllers/rating.php";


$controller="";
$action="";

if(isset($_GET['controller']) && isset($_GET['action'])) {
    $controller=$_GET['controller'];
    $action=$_GET['action'];
}
elseif(isset($_POST['action'])){
    $action=$_POST['action'];
    if($action=='register'||$action=='login'||$action=='logout'){
        $controller='users';  // Route to UsersController for user-related actions
    } 
    elseif ($action=='addOrganization') {
        $controller='organizations';  // Route to OrganizationsController
    }
    elseif($action=='addItem'){
        $controller='items';  // Route to ItemsController
    }
    elseif($action=='addReview'){
        $controller='reviews';
    }
    elseif($action=='addRating'){
        $controller='rating';
    }
}

switch($controller) {
    case 'users':
        $usersController = new UsersController($mysqli);
        $usersController->userMethods();
        break;

    case 'organizations':
        $organizationsController = new organizationConstroller($mysqli);
        if($action=='addOrganization') {
            $organizationsController->organizationMethods();
        }
        else if($action=='listOrganization'){
            $organizationsController->organizationMethods();
        }
        else if($action=='searchOrg'){
            $organizationsController->organizationMethods();
        }
        break;
    case 'items':
        $itemController=new itemController($mysqli);
        if($action=='addItem'){
            $itemController->itemMethods();
        }
        break;
    case 'reviews':
        $reviewsController = new reviewsController($mysqli);
        if($action=='addReview'){
            $reviewsController->reviewMethods();
        }
        break;
    case 'rating':
        $ratingController = new ratingController($mysqli);
        if($action=='addRating'){
            $ratingController->ratingMethods();
        }
        break;
    default:
        echo "No route found";
        break;
}
?>