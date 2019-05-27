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

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$conn->close();
?>



<!DOCTYPE html>
<?php 
	session_start();
	$email=$_SESSION['email'];
	//echo $email;
	$userID=$_SESSION['userID'];
	//echo $userID;
	$role=$_SESSION['role'];
	//echo $role;
	include("header.php");
	if($email==NULL || $userID==NULL || $role==NULL || $role!='A'){
        session_destroy();
        header("location: http://localhost/Lecture/SessionLogin.php");
    }
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
?>
<html>
	<head>
		<title>
			All Users
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="styling.css" rel="stylesheet" type="text/css">
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.js" type="text/javascript"></script>
		<script type='text/javascript' src='jquery-1.9.1.js'></script>
		<script type="text/javascript" src="jquery.session.js"></script>
		<script type="text/javascript">
			function setSession(val)
			{
				//var getInput = prompt("Hey type something here: ");
				var index="conferenceIDHidden"+val;
				//alert(index);
				var value=document.getElementById(index).value;
				//alert(value);
   				localStorage.setItem("storageName",value);
   				window.location = "./getDocument.php";
			}
		</script>
		<style type="text/css">
			#margin{
				margin-left: 50px;
			}
		</style>
	</head>

	<body>
    
 
        
        <main>
        	<div class="col-lg-10 col-xs-offset-1">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center">All users</h3>
                  </div>
                  <div class="panel-body">
                  	<div class="col-lg-12 bg-success">
                        <div class="col-lg-2"> <h5><b>user ID </b></h5></div>
                        <div class="col-lg-2"> <h5><b>User Name</b> </h5></div>
                        <div class="col-lg-2"> <h5><b>User Email</b> </h5></div>
                        <div class="col-lg-2" id="margin"> <h5><b>User password </b></h5></div>
                        <div class="col-lg-2"> <h5><b>user Role </b></h5></div>
                    </div>
					<hr>
                <?php 
					if ($result->num_rows > 0) 
					{
						$i=1;
						while($row = $result->fetch_assoc()) 
						{    
							echo"<div class=".'col-lg-12'.">";
							echo"<div class=".'col-lg-2'."> ".$row['userID']."</div>";
							echo"<div class=".'col-lg-2'."> ".$row['userName']."</div>";
							echo"<div class=".'col-lg-2'."> ".$row['email']."</div>";
							echo"<div class=".'col-lg-2'." id='margin'> ".$row['pass']."</div>";
							echo"<div class=".'col-lg-2'."> ";
							if($row['role']=="A")
							{
								echo "<font color=green><b>Admin</b></font>";
							}
							else if($row['role']=="R")
							{
								echo "<font color=blue><b>Reviewer</b></font>";
							}
							else if($row['role']=="U")
							{
								echo "<font color=orange><b>User</b></font>";
							}
							else 
							{
								echo "<font color=red><b>NO ROLES</b></font>";
							}
							echo"</div></div><br><hr>";
							$i++;
						}
					}
					else
					{
						echo"<div class=".'col-lg-12'.">";
						echo"<p class=".'text-center'."> No Record Found! <p>";
						echo"</div>";
						
					}
						
				?>
                    
                    
                  </div>
                </div>
            
            </div>
        
        </main>
    
        <footer>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </footer>
	</body>

</html>