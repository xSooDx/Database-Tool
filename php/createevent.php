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
	print_r($_POST);
	//$create="INSERT into events values('".$_POST["id"]."','".$_POST["title"]."','".$_POST["desc"]."','".$_POST["dep"]."','".$_POST["venue"]."','".$_POST["time"]."','".$_POST["date"]."','".$_POST["tag"]."','Active')";
	$create="INSERT INTO `ecelldb`.`events` (`ID`, `Title`, `Description`, `Dep_ID`, `Venue`, `Time`, `Date`, `Tag`, `Status`) VALUES ('".$_POST['id']."', '".$_POST['title']."', '".$_POST['desc']."', '".$_POST['dep']."', '".$_POST['venue']."', '".$_POST['time']."', '".$_POST['date']."', '".$_POST['tag']."', 'Active')";
	$res = mysql_query($create,$conn);
	if($res)
		echo "Success";
	else
		echo mysql_errno($res);
?>