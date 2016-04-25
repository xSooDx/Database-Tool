<?php

	define("USERDB","ecelldb");
		$dbhost = 'localhost';
		$dbuser = 'sood';
		$dbpass = '1234';
		$conn = mysql_connect($dbhost,$dbuser,$dbpass);
		
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}	   
		
		$db = mysql_select_db( USERDB );
		if(!$db)
		{
			die('Could not connect: ' . mysql_error());
		}
		$e=$_POST["usn"];
		$p=$_POST["password"];
		
		$sql = 'SELECT * FROM members WHERE usn="'.$e.'" AND password="'.$p.'"';
		$retval = mysql_query( $sql, $conn );
		if(! $retval or mysql_num_rows($retval)==0 )
		{
			echo '2';
		}	
		else{
			
			session_start();
			while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
				$_SESSION["usn"]=$row["USN"];
				$_SESSION["f_name"]=$row["F_Name"];
				$_SESSION["l_name"]=$row["L_Name"];
				$_SESSION["dep"]=$row["Department"];
				$_SESSION["ph"]=$row["Ph_No"];
				$_SESSION["email"]=$row["Email"];
				$_SESSION["status"]=$row["Status"];
				
			}
			
			echo $_SESSION["usn"];
			
		}
		mysql_close($conn);

?>