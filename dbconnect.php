<?php

include "interface1.php";

class Dbconnect implements interface1{
    
    function connect() {//database connect using connect() method and constant variable
            include "config.php";
            $con = mysqli_connect(LOCALHOST,USERNAME,PASSWORD);
            $conn=  mysqli_select_db($con,DATABASE);
			
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}else{
				return $con;
			}
			
			
    }   
}

