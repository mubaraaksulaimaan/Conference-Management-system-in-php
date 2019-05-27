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

$query="select * from finalfiles";
$resultFromfile=$conn->query($query);
//var_dump($resultFromfile);
session_start();


?>



<!DOCTYPE html>
<?php 
	//session_start();
	$email=$_SESSION['email'];
	//echo $email;
	$userID=$_SESSION['userID'];
	//echo $userID;
	$role=$_SESSION['role'];
	//echo $role;
	include("header.php");
	if($email==NULL || $userID==NULL || $role==NULL && $role!='A' || $role!='R')
	{
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
			Review All Candidates
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="styling.css" rel="stylesheet" type="text/css">
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.js" type="text/javascript"></script>
		<script type='text/javascript' src='jquery-1.9.1.js'></script>
		<script type="text/javascript" src="jquery.session.js"></script>

		<script type="text/javascript">
		function model(val,btnVal)
		{
			var setValue="input"+val;
			//alert(setValue);
			var getValue=document.getElementById(setValue).value;
			//alert(getValue);
			document.getElementById('iframe').src=getValue;
			// Get the modal
			var modal = document.getElementById('myModal');
			// Get the button that opens the modal
			var buttonValue="myBtn"+btnVal;
			//alert(buttonValue);
			var btn = document.getElementById(buttonValue);
			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];
			// When the user clicks on the button, open the modal 
			btn.onclick = function() 
			{
				modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() 
			{
				modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) 
			{
			if (event.target == modal) 
			{
				modal.style.display = "none";
  			}
		}
	}
	</script>
	<script type="text/javascript">
		function setSession(val)
		{
			var hEmail=document.getElementById('HiddenEmail'+val).value;
			var hConferenceID=document.getElementById('HiddenConferenceID'+val).value;
			//alert(hEmail);
			//alert(hConferenceID);
			//alert("SetSession");
			//alert(value);
			sessionStorage.setItem("ID", hConferenceID);
			sessionStorage.setItem("emailId", hEmail);
			//xalert("SetSessionEnd");
			
		}
	</script>
		<style type="text/css">
			/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  margin-top: 0%;
  padding: 20px;
  border: 1px solid #888;
  height: 100%;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
#myBtn{
	width: 70px;
}
		</style>
	</head>

	<body>
    
 
        
        <main>
        	<div class="col-lg-10 col-xs-offset-1">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center" >Review All Candidates</h3>
                  	<div style="margin-left: 800px;"><font color=green>A = Accept </font> &nbsp;&nbsp;<font color="red">R = Reject</font></div>
                  </div>
                  <div class="panel-body">
                  	<div class="col-lg-12 bg-success">
                        <div class="col-lg-1"> <h5><b> ID </b></h5></div>
                        <div class="col-lg-2"> <h5><b>Conference Name</b> </h5></div>
                        <div class="col-lg-1"> <h5><b> Type </b></h5></div>
                        <div class="col-lg-2"> <h5><b> Date </b></h5></div>
                        <div class="col-lg-2"> <h5><b>User </b></h5></div>
                        <div class="col-lg-2"> <h5><b>Location </b></h5></div>
                        <div class="col-lg-2" style="margin-left: -20px;"> <h5><b>Document &nbsp;&nbsp;&nbsp;&nbsp;Status</b></h5></div>
                        
                    </div>
					<hr>
					<div class="container">
    					<div class="row">

    					</div>
    				</div>
                <?php 
					if ($resultFromfile->num_rows > 0) 
					{
						//session_start();
						$i=1;
						while($row1 = $resultFromfile->fetch_assoc()) 
						{    
							$emailFromFiles=$row1['email'];
							$conferenceIdFromFiles=$row1['conferenceID'];
							$imageURL = 'FinalUploads/'.$row1["file_name"];
							$sql3= "SELECT * FROM reservations where conferenceID=".$conferenceIdFromFiles;

							$resultFromReservations=$conn->query($sql3);

							$row3=$resultFromReservations->fetch_assoc();

							
							$_SESSION["pdf_link"] = $imageURL;
							echo"<div class=".'col-lg-12'.">";
							echo"<div class=".'col-lg-1'."> ".$row3['conferenceID']."</div>";
							echo"<div class=".'col-lg-2'."> ".$row3['conferenceName']."</div>";
							echo"<div class=".'col-lg-1'."> ".$row3['conferenceType']."</div>";
							echo"<div class=".'col-lg-2'."> ".$row3['conferenceDate']."</div>";
							echo"<div class=".'col-lg-2'." style=\"margin-left:-20px;margin-right:15px;\"> ".$emailFromFiles."</div>";
							echo"<div class=".'col-lg-2'."> ".$row3['conferenceLocation']."</div>";
							echo"<div class=".'col-lg-2'."> "."<button onclick=\"model(".$i.",".$i.")\" id=\"myBtn".$i."\" class=\"form-control btn btn-success\" style=\"margin-left: -20px;padding-left:5px;float:left;width:70px;\">See Doc</button>
							<form action=\"reviewer.php\" method=\"get\">
								<input type=\"hidden\" value=\"acceptFinal.php\" name=\"pageType\">
								<input type=\"hidden\" name=\"buttonId\" value=\"".$i."\">
								<input type=\"hidden\" name=\"HiddenEmailA".$i."\" id=\"HiddenEmailA".$i."\" value=\"".$emailFromFiles."\">
								<input type=\"hidden\" name=\"HiddenConferenceIDA".$i."\" id=\"HiddenConferenceIDA".$i."\" value=\"".$row3['conferenceID']."\">
							   <button class=\"form-control btn btn-success\" onclick=\"setSession(".$i.")\" style=\"margin-left: 20px;padding-left:10px;width:30px;\">A</button>  
							</form>
							<form action=\"reviewer.php\" method=\"get\">
								<input type=\"hidden\" value=\"rejectFinal.php\" name=\"pageType\">
							    <input type=\"hidden\" name=\"buttonId\" value=\"".$i."\">
							    <input type=\"hidden\" name=\"HiddenEmailR".$i."\" id=\"HiddenEmailR".$i."\" value=\"".$emailFromFiles."\">
								<input type=\"hidden\" name=\"HiddenConferenceIDR".$i."\" id=\"HiddenConferenceIDR".$i."\" value=\"".$row3['conferenceID']."\">
							   <button onclick=\"setSession(".$i.")\" class=\"form-control btn btn-danger\" style=\"margin-left: -20px;width:30px;float:right;margin-top:-34px;\">R</button>
							</form></div>";
							echo"</div><br/>";
							echo"<hr>";
							
							
							echo "<input type=\"hidden\" id=\"input".$i."\" value=\"".$imageURL."\">";
							//echo $row3['conferenceName'];
							//echo $emailFromFiles;
							// $sql1 = "SELECT * FROM users where email=".$emailFromFiles;
							// $result = mysqli_query($conn,$sql1);

							// $row=$result->fetch_assoc();
							
							// $idFromUsers=$row['userID'];

							// $sql2 ="SELECT * FROM RESERVED WHERE userID=".$idFromUsers;
							// $resultFromReserved = $conn->query($sql2);

							// $row2 = $resultFromReserved->fetch_assoc();

							// $conferenceIdFromReserved=$row2['conferenceID'];

							// $sql3= "SELECT * FROM reservations where conferenceID=".$conferenceIdFromReserved;

							// $resultFromReservations=$conn->query($sql3);

							// $row3=$resultFromReservations->fetch_assoc();

									
									// echo"<div class=".'col-lg-12'.">";
									// echo"<div class=".'col-lg-2'."> ".$row3['conferenceID']."</div>";
									// echo"<div class=".'col-lg-2'."> ".$row3['conferenceName']."</div>";
									// echo"<div class=".'col-lg-2'."> ".$row3['conferenceType']."</div>";
									// echo"<div class=".'col-lg-2'."> ".$row3['seatsAvailable']."</div>";
									// echo"<div class=".'col-lg-2'."> ".$row3['conferenceLocation']."</div>";
									
									// echo"</div><br/>";
									// echo"<hr>";
								$i++;
							
						}
						?>

						<div id="myModal" class="modal">
  							<div class="modal-content">
    							<span class="close">&times;</span>
    							<iframe id="iframe" src="<?php echo $imageURL ?>" width="100%" height="100%"></iframe>
  							</div>
						</div>
					<?php
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