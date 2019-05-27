<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "reservationSystem";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
		//echo "Connected Successfully"."<br>";
	}
	$buttonId=$_GET['buttonId'];
    //echo $buttonId;
    $userId=$_GET['uID'.$buttonId];
    echo $userId;
    $select=$_GET["s".$buttonId];
    //echo $select;
    $sql="update users set role='$select' where userID=$userId";
    if ($conn->query($sql) === TRUE) {
		    //echo "Record updated successfully";
		    header('Location: http://localhost/Lecture/success.php');
		} else {
		    echo "Error updating record: " . $conn->error;
	}
	$conn->close();
?>