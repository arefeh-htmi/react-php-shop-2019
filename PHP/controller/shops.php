 <?php    
header("Access-Control-Allow-Origin: http://localhost:3000");  
header("Access-Control-Allow-Credentials:true");
header('Content-type: application/json');  
session_start();
require_once("../includes/fonctions.php");
require_once("../models/userAdmin.php");   
// code for shops and checking if the user is logged (if not showing a message)
    $json = file_get_contents('php://input');
    $obj = json_decode($json,true);
    if( isset( $_SESSION['id_user'])){
        $ShopsMsg = "Shops succes";  
    }else
        $ShopsMsg = "You must be logged to show shops";
    $ShopsMsg = json_encode($ShopsMsg);
    echo($ShopsMsg); 
 ?>