 <?php

    function escape_error($val)
        {
    	$magic_quotes =get_magic_quotes_gpc();
    
    			if($magic_quotes)
    			{
                    $val = addslashes($val);
    			}	
    	return $val;
        }
		
		
	function connectBase(){
		try {
		return  new PDO ('mysql:host=localhost:3000;dbname=react-php-shop', 'sadmah', 'HammadiElec123+');
		}
		catch (PDOException $er) {
			print "Error !: " . $er->getMessage() . "<br/>";
			die();
}
    }



?> 