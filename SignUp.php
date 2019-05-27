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
			SignUp
		</title>
		<link href="styling.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript">
            function checkPass()
            {
                //alert("jawada");
                var pass=document.getElementById('pass').value;
                var pass1=document.getElementById('pass1').value;
                if(pass!=pass1)
                {
                    document.getElementById('message').hidden=false;
                    document.getElementById('message1').hidden=true;
                    //alert("Password Does not match");
                }
                else
                {
                    document.getElementById('message').hidden=true;
                    document.getElementById('message1').hidden=false;
                }
            }

        </script>
	</head>

	<body>
    
    	<header>
        	<!-- Its HTML5 Divison of the HTML Document-->
        </header>
        
        <main>
        <form method="POST" action="users.php">
            <input type="hidden" name="pageType" value="signUp.php">
        	<div class="col-lg-6 col-xs-offset-3 main">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center">User SignUP | <a href="sessionLogin.php"> Login</a></h3>
                  </div>
                  
                    <div class="panel-body">
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Full Name</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="name" id="name" placeholder="Jawad adil" required>
                        </div>
                    </div>

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
                    
                    <div class="col-lg-12 space">
                        <div class="col-md-3">
                           <p class="pull-right">Confirm Pass</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="password" class="form-control" onkeyup="checkPass()" name="pass1" id="pass1" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <div class="col-lg-12 space">
                        <div id="message" hidden style="margin-left: 150px;"><font color=red><b>Password does not match</b></font></div>
                        <div id="message1" hidden style="margin-left: 150px;"><font color=green><b>Password match</b></font></div>
                        <div class="col-lg-3 col-xs-offset-9 pull-right">
							<input type="submit" value="Sign Up" class="form-control btn btn-success" > 
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