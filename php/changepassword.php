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
	$check_sql = "SELECT USN from members WHERE USN = '".$_SESSION["usn"]."' and password ='".$_POST["curr"]."'";
	
	$res = mysql_query($check_sql,$conn);
	if(!$res or mysql_num_rows($res) == 0)
	{
		echo "Current password does not match".$_SESSION["usn"]." ".$_POST["curr"];
	}
	else
	{
		$update = "UPDATE members SET password = '".$_POST["newp"]."'WHERE USN='".$_SESSION["usn"]."'";
		$res = mysql_query($update,$conn);
		if(!$res)
		{
			echo "could not update";
		}
		else echo "success";
		
	}
?>