
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
    if($email==NULL || $userID==NULL || $role==NULL){
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
    $sql="select * from users where userID='$userID' and email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        $row=$result->fetch_assoc();
        $name=$row['userName'];
        //echo $name;
        $pass=$row['pass'];
    }



?>
<html>
	<head>
		<title>
			Update Profile
		</title>
		<link href="styling.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script>
		function showHint() 
		{
			var str = document.getElementById('search').value;
			if (str.length == 0) 
			{ 
				document.getElementById("txtHint").innerHTML = "";
				
				return;
			} 
			else 
			{
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() 
				{
					if (this.readyState == 4 && this.status == 200) 
					{
						//alert( this.responseText);
						var arr = this.responseText.split(",");
						document.getElementById('UserName').value = arr[0];
						document.getElementById('email').value = arr[1];
						document.getElementById('pass').value = arr[2];
						document.getElementById('role').value = arr[3];
						
						
						if(arr[0] != "")
							document.getElementById('update1').disabled = false;
						else
						document.getElementById('update1').disabled = true;
						
					}
				};
				xmlhttp.open("GET", "deleteUser1.php?id=" + str, true);
				xmlhttp.send();
			}
		}
		</script>
        
	</head>

	<body>
    

        
        <main>
        <form action="users.php" method="GET">
            <input type="hidden" name="pageType" value="updateUser.php">
        	<div class="col-lg-6 col-xs-offset-3 main">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center">Update Profile</h3>
                  </div>
                  
                  <div class="panel-body">
                  	
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">ID</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="id" id="is" placeholder="" disabled value="<?php echo $userID ?>">
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Name</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="UserName" id="UserName" placeholder="User Name" required value="<?php echo $name ?>">
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">email</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email?>">
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">User Password</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="pass" id="pass" placeholder="Password" required value="<?php echo $pass ?>">
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-9 col-xs-offset-3">
							<input type="submit" value="Update" id="update1" class="form-control btn btn-success"> 
                        </div>
                    </div>
                    </form>                   
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