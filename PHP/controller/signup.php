 <?php    
header("Access-Control-Allow-Origin: http://localhost:3000"); 
header("Access-Control-Allow-Credentials:true");
header('Content-type: application/json');   
session_start();
require_once("../includes/fonctions.php");
require_once("../models/userAdmin.php"); 
 
    $json = file_get_contents('php://input');
     
     // decoding JSON 
    $obj = json_decode($json,true);
     
    // Populating User 
    $email = $obj['email'];
     
    // Populating Password from JSON 
    $password = $obj['password']; 
    $passwordConfirm = $obj['passwordConfirm']; 

    //validating field, 
    if (!empty($passwordConfirm)  || !empty($email) || !empty($password)) { 
        if ($password === $passwordConfirm)
        {   
            //email validation
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                
                $db = connectBase();   
                $admin = new userAdmin($db);

                //duplicate mail checking
                $user = $admin->getUser($email,'dont_take_it'); 
 
                if(isset($user) and ($user instanceof User)) 

                    // If Mail  exist then show the message.
                    $signupMsg = $user->email().' already exists'; 

                else{

                    $password = sha1($password);
                    $Auto_Increment = $admin->getAutoId();
                    $user = new User(array("id" =>$Auto_Increment, "email" => $email, "password" =>$password)); 
                    $admin->addUser($user);

                    //store session for this user
                    $_SESSION['id_user'] = $user->id();
                    $_SESSION['email_user'] = $user->email();

                    $signupMsg = 'Account created succefully'; 
                }
                
            }else
                $signupMsg = "Invalid email format. please enter an email!"; 
        }else
            $signupMsg = 'passwords dont match' ; 
    }else
        $signupMsg = 'please fill the required fields' ;
          
   // Converting the message into JSON format.
    $signupJson = json_encode($signupMsg);  
    // Echo the message.
    echo $signupJson;

 ?>
 