 <?php   
header("Access-Control-Allow-Origin: http://loclhost:3000");
header("Access-Control-Allow-Credentials:true");
header('Content-type: application/json');  
session_start();
require_once("../includes/fonctions.php");
require_once("../models/userAdmin.php"); 

    $json = file_get_contents('php://input');
     
     // decoding the received JSON 
    $obj = json_decode($json,true);
     
    // Populating User email 
    $email = $obj['email'];
     
    // Populating Password 
    $password = $obj['password']; 
 
    // connecting to DB
    $db = connectBase();  
    
    // admin
    $admin = new userAdmin($db); 
    $user = $admin->getUser($email,$password); 
 
    if(isset($user) and ($user instanceof User))
    {
        // If user exist then show the message.
        $LoginMsg = 'Data Matched';

        //store a session for this user 
        $_SESSION['id_user'] = $user->id();
        $_SESSION['email_user'] = $user->email(); 
    } 
    else
        $LoginMsg = 'Invalid Username or Password. Please Try Again';
    
         
          
   // Converting the message into JSON format. 
    $LoginJson = json_encode($LoginMsg); 
     
    
    // Echo the message.
    echo $LoginJson ;

 ?>

 
