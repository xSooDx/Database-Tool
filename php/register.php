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
	
	$sql = "UPDATE members SET password = '".$p."' WHERE usn= '".$e."' and password = ''	";
	$retval = mysql_query( $sql, $conn );
	if($retval)
	{
		echo '1';
		
	}
	else 
	{
		echo mysql_error();
		die();
	}
	
	
?>