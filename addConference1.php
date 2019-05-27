
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
    if($email==NULL || $userID==NULL || $role==NULL || $role!='A')
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
?>
<html>
	<head>
		<title>
			Add Conference
		</title>
		<link href="styling.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
    
    	<header>
        	<!-- Its HTML5 Divison of the HTML Document-->
        </header>
        
        <main>
        <form method="POST" action="conference.php">
            <input type="hidden" name="pageType" value="addConference.php">
        	<div class="col-lg-6 col-xs-offset-3 main">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center">Add Conference</h3>
                  </div>
                  
                  <div class="panel-body">
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Name</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="conferenceName" placeholder="Conference Name" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Type</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="conferenceType"  placeholder="Conference Type" required>
                        </div>
                    </div>
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Date</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="date" class="form-control" name="conferenceDate" required>
                        </div>
                    </div>
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Total Seats</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="seatsAvailable" placeholder="Total Seats Avaiable" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Location</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="conferenceLocation" placeholder="Location" required>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-9 col-xs-offset-3">
							<input type="submit" value="Add Conference" class="form-control btn btn-success" > 
                        </div>
                    </div>
                                        
                 </div>
                </div>
            </div>
            </form>
        </main>
    
        <footer>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </footer>
	</body>

</html>