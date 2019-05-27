<?php
include 'users.php';
class user extends actor
{
	/*
		submit first document
		submit final document
		constructor
	*/
	function firstDocument()
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
			echo "Connected Successfully"."<br>";
		}
		$statusMsg = '';

		// File upload path
		$targetDir = "uploads/";
		$fileName = $_FILES["file"]["name"];

		$targetFilePath = $targetDir . $fileName;

		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		$id = $_REQUEST['search1'];
		//echo $id;
		//global $db;
		$email = $_REQUEST['email1'];
		//echo $email;
		//echo $fileName;
		if(!empty($_FILES["file"]["name"])){
		    // Allow certain file formats
		    $allowTypes = array('jpg','png','jpeg','gif','pdf');
		    if(in_array($fileType, $allowTypes))
		    {
		        // Upload file to server
		        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
		        {
		            // Insert image file name into database
		            //var_dump('NOW()');
		        		$query="INSERT into files (file_name, email,conferenceID) VALUES ('".$fileName."','".$email."',".$id.")";
		        		//echo $query;
		            	$insert = mysqli_query($conn,$query);

		            //	var_dump($insert);
		            if($insert)
		            {
		                header('Location: http://localhost/Lecture/success.php');
		            }
		            else
		            {
		                $statusMsg = "File upload failed, please try again.";
		            } 
		        }
		        else
		        {
		            $statusMsg = "Sorry, there was an error uploading your file.";
		        }
		    }
		    else
		    {
		        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
		    }
		}
		else
		{
		    $statusMsg = 'Please select a file to upload.';
		}

		// Display status message
		echo $statusMsg;
	}	//first document

	function finalDocument()
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
			echo "Connected Successfully"."<br>";
		}
		$statusMsg = '';

		// File upload path
		$targetDir = "FinalUploads/";
		$fileName = $_FILES["file"]["name"];

		$targetFilePath = $targetDir . $fileName;

		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		$id = $_REQUEST['search1'];
		//echo $id;
		//global $db;
		$email = $_REQUEST['email1'];
		//echo $email;
		//echo $fileName;
		if(!empty($_FILES["file"]["name"])){
		    // Allow certain file formats
		    $allowTypes = array('jpg','png','jpeg','gif','pdf');
		    if(in_array($fileType, $allowTypes))
		    {
		        // Upload file to server
		        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
		        {
		            // Insert image file name into database
		            //var_dump('NOW()');
		        		$query="INSERT into finalfiles (file_name, email,conferenceID) VALUES ('".$fileName."','".$email."',".$id.")";
		        		//echo $query;
		            	$insert = mysqli_query($conn,$query);

		            //	var_dump($insert);
		            if($insert)
		            {
		                header('Location: http://localhost/Lecture/success.php');
		            }
		            else
		            {
		                $statusMsg = "File upload failed, please try again.";
		            } 
		        }
		        else
		        {
		            $statusMsg = "Sorry, there was an error uploading your file.";
		        }
		    }
		    else
		    {
		        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
		    }
		}
		else
		{
		    $statusMsg = 'Please select a file to upload.';
		}

		// Display status message
		echo $statusMsg;
	}//final upload of file

	function upComingConferences()
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

		$sql = "SELECT * FROM Reservations";
		$result = $conn->query($sql);

		$conn->close();

		session_start();
		$email=$_SESSION['email'];
		//echo $email;
		$userID=$_SESSION['userID'];
		//echo $userID;
		$role=$_SESSION['role'];
		//echo $role;
		include("header.php");
		if($email==NULL || $userID==NULL || $role==NULL)
			header("location: http://localhost/Lecture/SessionLogin.php");
		if($role!='R')
	    {
	        echo "<script>document.getElementById('r1').hidden=true;</script>";
	        echo "<script>document.getElementById('rf').hidden=true;</script>";
	    }
	    if($role!='A')
	    {
	        echo "<script>document.getElementById('add').hidden=true;</script>";
	        echo "<script>document.getElementById('update').hidden=true;</script>";
	        echo "<script>document.getElementById('delete').hidden=true;</script>";
	        echo "<script>document.getElementById('addUser').hidden=true;</script>";
	        echo "<script>document.getElementById('deleteUser').hidden=true;</script>";
	        echo "<script>document.getElementById('viewAllUsers').hidden=true;</script>";
	        echo "<script>document.getElementById('assign').hidden=true;</script>";
	    }
	    if($role!='U')
	    {
	    	echo "<script>document.getElementById('up').hidden=true;</script>";
	        echo "<script>document.getElementById('f1').hidden=true;</script>";
	        echo "<script>document.getElementById('p1').hidden=true;</script>";
	    }
		echo "<html><head><title>Upcoming Conferences</title>
				<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
				<link href='styling.css' rel='stylesheet' type='text/css'>
				<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.js' type='text/javascript'></script>
				<script type='text/javascript' src='jquery-1.9.1.js'></script>
				<script type='text/javascript' src='jquery.session.js'></script>
				<script type='text/javascript'>
					function setSession(val)
					{
						//var getInput = prompt(\"Hey type something here: \");
						var index=\"conferenceIDHidden\"+val;
						//alert(index);
						var value=document.getElementById(index).value;
						//alert(value);
		   				localStorage.setItem(\"storageName\",value);
		   				window.location = \"./getDocument.php\";
					}
				</script>
			</head>
			<body>    
	        <main>
	        	<div class='col-lg-10 col-xs-offset-1'>
	            	
	                <div class='panel panel-default'>
	                  <div class='panel-heading'>
	                  	<h3 class='text-center'>Upcoming Conferences</h3>
	                  </div>
	                  <div class='panel-body'>
	                  	<div class='col-lg-12 bg-success'>
	                        <div class='col-lg-1'> <h5><b>ID </b></h5></div>
	                        <div class='col-lg-2'> <h5><b>Conference Name</b> </h5></div>
	                        <div class='col-lg-2'> <h5><b>Conference Type </b></h5></div>
	                        <div class='col-lg-2'> <h5><b>Date </b></h5></div>
	                        <div class='col-lg-1'> <h5><b>Seats </b></h5></div>
	                        <div class='col-lg-2'> <h5><b>Location </b></h5></div>
	                        <div class='col-lg-2'> <h5><b>Reservation </b></h5></div>
	                    </div>
						<hr>";
						if ($result->num_rows > 0) 
						{
							$i=1;
							while($row = $result->fetch_assoc()) 
							{    
								echo "<input type=\"text\" hidden id=\"conferenceIDHidden".$i."\" value=\"".$row['conferenceID']."\">";
								echo"<div class=".'col-lg-12'.">";
								echo"<div class=".'col-lg-1'."> ".$row['conferenceID']."</div>";
								echo"<div class=".'col-lg-2'."> ".$row['conferenceName']."</div>";
								echo"<div class=".'col-lg-2'."> ".$row['conferenceType']."</div>";
								echo"<div class=".'col-lg-2'."> ".$row['conferenceDate']."</div>";
								echo"<div class=".'col-lg-1'."> ".$row['seatsAvailable']."</div>";
								echo"<div class=".'col-lg-2'."> ".$row['conferenceLocation']."</div>";
								echo"<div class=".'col-lg-2'."> "."<button class=\"form-control btn btn-success\" onclick=\"setSession(".$i.")\">Submit Document</button>"."</div>";
								echo"</div><br/>";
								echo"<hr>";
								$i++;
							}
						}
						else
						{
							echo"<div class=".'col-lg-12'.">";
							echo"<p class=".'text-center'."> No Record Found! <p>";
							echo"</div>";
							
						}
							
				echo "</div></div></div></main>
		        <footer>            
		            <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
		            <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
		        </footer>
			</body>
		</html>";
	}

	function __construct()
	{

	}
}
if(isset($_REQUEST["pageType"])=="getDocument.php")
{
	$obj=new user();
	$obj->firstDocument();
}
else if(isset($_REQUEST["pageType"])=="getFinalDocument.php")
{
	$obj=new user();
	$obj->finalDocument();
}
else if(isset($_REQUEST['pageType'])==NULL)
{
	$obj=new user();
	$obj->upComingConferences();
}
?>