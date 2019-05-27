<?php
include 'users.php';
class admin extends actor{
	/*
		Assign Role
		add user
		delete user
		constructor
	*/
	function __construct()
	{

	}
	function assignRole()
	{
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
	}//assign Roles to the user

	function deleteUser()
	{
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
		$userid=$_GET['search'];
		$sql="delete from users where userID=$userid";
		if($conn->query($sql))
		{
			//echo "user deleted";
			header('location: http://localhost/Lecture/success.php');
		}
		else
		{
			echo "Delete failed : ".$conn->error;
		}
	}//Delete user
	function addUser()
	{
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
		$username=$_GET['UserName'];
		$email=$_GET['email'];
		$pass=$_GET['pass'];
		$role=$_GET['role'];
		// echo $username;
		// echo $email;
		// echo $pass;
		// echo $role;
		$sql="INSERT INTO users (userName,email,pass,role) VALUES ('$username','$email','$pass','$role')";
		if($conn->query($sql))
		{
			//echo "user deleted";
			header('location: http://localhost/Lecture/success.php');
		}
		else
		{
			echo "Add failed : ".$conn->error;
		}
	}//add user
}
//echo "page Type".$_REQUEST["pageType"];
//exit;

if($_REQUEST["pageType"]=="assignRoles.php")
{
	$obj=new admin();
	$obj->assignRole();
}
if($_REQUEST["pageType"]=="deleteUser.php")
{
	$obj=new admin();
	$obj->deleteUser();
}
if($_REQUEST["pageType"]=="addUser.php")
{
	$obj=new admin();
	$obj->addUser();
}
?>