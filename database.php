<?php

/* connect to database */

$dbhost = "localhost";
$dbuser = "szh0064";
$dbpass = "sam1487";
$dbname = "szh0064db";

function getConnection() {
	global $dbhost, $dbuser, $dbpass, $dbname;
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$con) {
		die('Could not connect: ' . mysqli_error(con));
	}
	return $con;
}

function executeQuery($con, $query) {
	$con = getConnection();
	$result = mysqli_query($con, $query);
	return $result;
}

function countAffectedRows($con) {
	return mysqli_affected_rows($con);
}

function getError($con) {
	return mysqli_error($con);
}

//	while ($row = mysqli_fetch_row($result))//
	//echo $row[0]; 

	//while ($row = mysqli_fetch_assoc($result))
	//echo $row['column_name'];

	//$num = mysqli_$affected_rows($con);

	/* detect error */

	//$str = mysqli_connect_error();
	//$err = mysqli_connect_errno();

	//$str = mysqli_error($con);
	//$err = mysqli_errno($con);


?>