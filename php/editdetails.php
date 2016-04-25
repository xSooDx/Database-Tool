<?php

	session_start(); 
	define( "USERDB", "ecelldb"); 
	$dbhost='localhost';
	$dbuser='sood' ;
	$dbpass='1234' ;
	
	$conn=mysql_connect($dbhost,$dbuser,$dbpass);
	if(! $conn ) { die( 'Could not connect: ' . mysql_error()); }
	$db=mysql_select_db( USERDB );
	if(!$db) { die( 'Could not connect: ' . mysql_error()); }
	
	$update_sql="UPDATE members SET ph_no='".$_POST["ph"]."', email='".$_POST["email"]."' Where USN='".$_SESSION["usn"]."'"; 
	$res=mysql_query($update_sql,$conn);

?>