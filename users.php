<?php
class Actor
{
	function updateProfile()
	{
		session_start();
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
		$userID=$_SESSION['userID'];
		$email=$_GET['email'];
		$password=$_GET['pass'];
		$name=$_GET['UserName'];
	    $sql="update users set UserName='$name',email='$email',pass='$password' where userID=$userID";
	    if ($conn->query($sql) === TRUE) {
			    //echo "Record updated successfully";
			    header('Location: http://localhost/Lecture/success.php');
			} else {
			    echo "Error updating record: " . $conn->error;
		}
		$conn->close();
	}
	function sendPassword()
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
		$email = $_REQUEST['email'];
		//echo $email;
		$sql="select * from users where email='$email'";
		$result = $conn->query($sql);
		if($result->num_rows<=0)
		{
			header("Location:forgot.php?error=1");
		}
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$pass=$row['pass'];
			//echo $pass;
			mail($email,"Password | Conference Reservation System","Your password is : ".$pass);
			header('location: http://localhost/Lecture/success.php');

		}
	}
	function signUp()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "reservationSystem";

		session_start();

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


		$email = $_REQUEST["email"];
		$pass = $_REQUEST["pass"];
		$userNamee = $_REQUEST["name"];

		$sql = "INSERT INTO users (userName,email, pass,role)VALUES ('$userNamee','$email', '$pass','U')";

		if ($conn->query($sql) === TRUE) {
		    //echo "Signup Successfull";
		    header('Location: http://localhost/Lecture/sessionLogin.php');
		} else {
		    header('Location:error.php');
		}
		$conn->close();
	}//sign up function

	function login()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "reservationSystem";

		session_start();

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


		$email = $_REQUEST["email"];
		$pass = $_REQUEST["pass"];


		$sql = "SELECT * FROM users WHERE email = '$email' and pass='$pass'";
		$result = $conn->query($sql);
		//echo $sql;

		if($result->num_rows<=0)
		{
			header("Location:SessionLogin.php?error=1");
		}
		if ($result->num_rows > 0) 
			{
				$row = $result->fetch_assoc(); 
				$_SESSION['email'] = $row['email'];
				$_SESSION['userID'] = $row['userID'];
				$_SESSION['role'] = $row['role'];
				//echo "jawad adil";
				header("Location: ./loggedin.html");
			}
		$conn->close();
	}
}

if(isset($_REQUEST['pageType']))
{
	if($_REQUEST['pageType']=="forgot.php")
	{
		//echo $_REQUEST['pageType'];
		$obj=new Actor();
		$obj->sendPassword();
	}
	else if($_REQUEST['pageType']=="updateUser.php")
	{
		$obj=new Actor();
		$obj->updateProfile();
	}
	else if($_REQUEST['pageType']=="signUp.php")
	{
		$obj=new Actor();
		$obj->signUp();
	}
	else if($_REQUEST['pageType']=="login.php")
	{
		$obj=new Actor();
		$obj->login();
	}
}



?>