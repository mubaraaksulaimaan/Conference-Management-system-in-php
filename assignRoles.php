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
	//if($email==NULL || $userID==NULL || $role==NULL && $role!='A' || $role!='R'){
	//	session_destroy();
	//	header("location: http://localhost/Lecture/SessionLogin.php");
	//}
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
			Assign Roles 
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
		select{
			margin-left: 0px;
		}
		#rol{
			margin-left: 50px;
		}
	</style>
	</head>

	<body>
    
 
        
        <main>
        	<div class="col-lg-10 col-xs-offset-1">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center" >Assign Roles</h3>
                  	<div style="margin-left: 800px;"><font color=green>A = Accept </font> &nbsp;&nbsp;<font color="red">R = Reject</font></div>
                  </div>
                  <div class="panel-body">
                  	<div class="col-lg-12 bg-success">
                        <div class="col-lg-2"> <h5><b>User ID </b></h5></div>
                        <div class="col-lg-2"> <h5><b>User Name</b> </h5></div>
                        <div class="col-lg-2"> <h5><b>User Email </b></h5></div>
                        <div class="col-lg-2"> <h5><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Role </b></h5></div>
                        <div class="col-lg-2"> <h5><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Type </b></h5></div>
                        
                        
                    </div>
					<hr>
					<div class="container">
    					<div class="row">

    					</div>
    				</div>
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
					$sql3= "SELECT * FROM users";

					$resultFromReservations=$conn->query($sql3);
					$i=1;
					while($row3=$resultFromReservations->fetch_assoc()){

					echo"<div class=".'col-lg-12'.">";
					echo"<div class=".'col-lg-2'."> ".$row3['userID']."</div>";
					echo"<div class=".'col-lg-2'."> ".$row3['userName']."</div>";
					echo"<div class=".'col-lg-2'."> ".$row3['email']."</div>";
					echo"<div class=".'col-lg-2'." id=\"rol\"> ";
					if($row3['role']=="A")
					{
						echo "<font color=green><b>Admin</b></font>";
					}
					else if($row3['role']=="R")
					{
						echo "<font color=blue><b>Reviewer</b></font>";
					}
					else if($row3['role']=="U")
					{
						echo "<font color=orange><b>User</b></font>";
					}
					else 
					{
						echo "<font color=red><b>NO ROLES</b></font>";
					}

					echo "</div>";
					echo "<form action=\"admin.php\" method=\"get\">
					<input type=\"hidden\" name=\"pageType\" value=\"assignRoles.php\">
						<input type=\"hidden\" name=\"buttonId\" value=\"".$i."\">
						<input type=\"hidden\" name=\"uID".$i."\" value=\"".$row3['userID']."\">
						<select id=\"s".$i."\" name=\"s".$i."\"><option>--Select--</option><option value=\"A\">Admin</option><option value=\"R\">Reviewer</option><option value=\"U\">User</option></select>";
					echo "<button class=\"form-control btn btn-success\" onclick=\"setSession(".$i.")\" style=\"margin-left: 20px;padding-left:10px;width:80px;\">Submit</button>  
				    </form>

					</div><br/>
					<hr>";
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
					// }
					// else
					// {
					// 	echo"<div class=".'col-lg-12'.">";
					// 	echo"<p class=".'text-center'."> No Record Found! <p>";
					// 	echo"</div>";
						
					// }
						
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