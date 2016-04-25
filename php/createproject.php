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
	
	$create="INSERT into projects values('".$_POST["id"]."','".$_POST["dep"]."','".$_POST["title"]."','".$_POST["desc"]."','".$_POST["lead"]."','Active')";
	
	$res = mysql_query($create,$conn);
	echo "Success;
?>