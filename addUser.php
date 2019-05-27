
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
    if($email==NULL || $userID==NULL || $role==NULL || $role!="A"){
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
			Add User
		</title>
		<link href="styling.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
	</head>

	<body>
    
    	<header>
        	<!-- Its HTML5 Divison of the HTML Document-->
        </header>
        
        <main>
        
        	<div class="col-lg-6 col-xs-offset-3 main">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center">Add User</h3>
                  </div>
                  
                  <div class="panel-body">
                  	<form method="get" action="admin.php">
                            <input type="hidden" name="pageType" value="addUser.php">
                        
                    
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Name</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="UserName" id="UserName" placeholder="User Name" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">email</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">User Password</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="pass" id="pass" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">user Type</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="role" id="role" placeholder="User Type" required>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-9 col-xs-offset-3">
							<input type="submit" value="add User" id="update1" class="form-control btn btn-success" > 
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