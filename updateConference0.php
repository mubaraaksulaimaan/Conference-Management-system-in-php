
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
    if($email==NULL || $userID==NULL || $role==NULL && $role!='A'){
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
			Update Conference
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
						document.getElementById('conferenceName').value = arr[0];
						document.getElementById('conferenceType').value = arr[1];
                        document.getElementById('conferenceDate').value = arr[2];
						document.getElementById('seatsAvailable').value = arr[3];
						document.getElementById('conferenceLocation').value = arr[4];
						
						
						if(arr[0] != "")
							document.getElementById('update1').disabled = false;
						else
						document.getElementById('update1').disabled = true;
						
					}
				};
				xmlhttp.open("GET", "updateConference.php?id=" + str, true);
				xmlhttp.send();
			}
		}
		</script>
        
	</head>

	<body>
    
    	<header>
        	<!-- Its HTML5 Divison of the HTML Document-->
        </header>
        
        <main>
        
        	<div class="col-lg-6 col-xs-offset-3 main">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center">Update Conference</h3>
                  </div>
                  
                  <div class="panel-body">
                  	
                    <div class="col-lg-12 space">
                    	<form method="get" action="conference.php">
                            <input type="hidden" name="pageType" value="updateConference0.php">
                        <div class="col-lg-6 col-xs-offset-3">
							<input type="text" class="form-control" name="search" id="search" placeholder="Search by ID">
                        </div>
                        <div class="col-lg-3"> 
                            <input type="button" class="form-control btn btn-danger" value="Search" onClick="showHint()" >
                        </div>
                        
                    </div>
                    
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Name</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="conferenceName" id="conferenceName" placeholder="Conference Name" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Type</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="conferenceType" id="conferenceType" placeholder="Conference Type" required>
                        </div>
                    </div>
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Date</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="date" class="form-control" name="conferenceDate" id="conferenceDate" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Seats Available</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="seatsAvailable" id="seatsAvailable" placeholder="Total Available seats" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Location</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="conferenceLocation" id="conferenceLocation" placeholder="Conference Location" required>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-9 col-xs-offset-3">
							<input type="submit" value="Update Conference" id="update1" class="form-control btn btn-success" disabled> 
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