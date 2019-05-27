<?php include("header.php"); ?>
<!DOCTYPE html>
<?php 
    echo "<script>document.getElementById('up').hidden=true;</script>";
    echo "<script>document.getElementById('Logout').hidden=true;</script>";
    echo "<script>document.getElementById('add').hidden=true;</script>";
    echo "<script>document.getElementById('update').hidden=true;</script>";
    echo "<script>document.getElementById('delete').hidden=true;</script>";
    echo "<script>document.getElementById('r1').hidden=true;</script>";
    echo "<script>document.getElementById('rf').hidden=true;</script>";
    echo "<script>document.getElementById('f1').hidden=true;</script>";
    echo "<script>document.getElementById('p1').hidden=true;</script>";
    echo "<script>document.getElementById('welcome').hidden=true;</script>";
    echo "<script>document.getElementById('addUser').hidden=true;</script>";
    echo "<script>document.getElementById('deleteUser').hidden=true;</script>";
    echo "<script>document.getElementById('viewAllUsers').hidden=true;</script>";
    echo "<script>document.getElementById('assign').hidden=true;</script>";
    echo "<script>document.getElementById('updateUser').hidden=true;</script>";

?>
<html>
	<head>
		<title>
			Login
		</title>
		<link href="styling.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
    
    	<header>
        	<!-- Its HTML5 Divison of the HTML Document-->
        </header>
        
        <main>
        <form method="POST" action="users.php">
            <input type="hidden" name="pageType" value="login.php">
        	<div class="col-lg-6 col-xs-offset-3 main">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center">User Login | <a href="./SignUp.php">SignUp</a></h3>
                  </div>
                  
                  <div class="panel-body">
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Email</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="email" id="email" placeholder="abc@xyz.com" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Password</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                        </div>
                    </div>
                    <div id="error" hidden style="margin-left: 180px;margin-top: 100px;position: absolute;"><font color=red><b>Invalid Login details</b></font></div>
                    <?php 
                        //$error=2;
                        $error = filter_input(INPUT_GET, 'error');
                        if($error==1)
                        {
                            //echo "<script>alert(\"invalid login details\")</script>";
                            echo "<script>document.getElementById('error').hidden=false;</script>";
                        }
                    ?>
                    <div class="col-lg-12 space">
                        <div class="col-lg-3 col-xs-offset-9 pull-right">
							<input type="submit" value="Login" class="form-control btn btn-success" ><br/><br/>
                            <a href="forgot.php">Forgot password </a>
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