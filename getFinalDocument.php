
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
    
?>
<html>
	<head>
		<title>
			Upload Document
		</title>
		<link href="styling.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
        <script>
            
        window.onload = function setID()
        {
            //alert("jawad");
            //alert(localStorage.getItem("storageName"));

            var element=localStorage.getItem("storageName");
            if(!element)
            {
                swal({   
                    title: "Submit proposal first!",
                    type: "warning",   
                    showCancelButton: false,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "OK!",   
                    closeOnConfirm: false 
                },    
            
                    function(){
                    window.location.href = "getDocument.php";
            
                });

               // window.location.replace("./upcomingConferences.php");
            }
            document.getElementById("search").value=element;
            document.getElementById("search1").value=element;
            localStorage.removeItem("storageName");
            //var id=
            //alert(id);
        }
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
						document.getElementById('seatsAvailable').value = arr[2];
						document.getElementById('conferenceLocation').value = arr[3];
						
						
						if(arr[0] != ""){
							document.getElementById('update1').disabled = false;
                            document.getElementById('btn').disabled = true;
                        }
						else
						document.getElementById('update').disabled = true;
						
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
        <?php
            //session_start();
            //echo $_SESSION['userID'];           
        ?>
        	<div class="col-lg-6 col-xs-offset-3 main">
            	
                <div class="panel panel-default">
                  <div class="panel-heading">
                  	<h3 class="text-center">Upload Document</h3>
                  </div>
                  
                  <div class="panel-body">
                  	
                    <div class="col-lg-12 space">
                    	<form method="POST" action="user.php" enctype="multipart/form-data">
                            <input type="hidden" name="pageType" value="getFinalDocument.php">
                        <div class="col-lg-6 col-xs-offset-3">
							<input type="text" class="form-control" disabled name="search" id="search" placeholder="Search by ID">
                            <input type="hidden" class="form-control" name="search1" id="search1" >
                        </div>
                        <div class="col-lg-3"> 
                            <input type="button" id="btn" class="form-control btn btn-danger" value="Search" onClick="showHint()" >
                        </div>
                        
                    </div>
                    
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">User email</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" disabled>
                            <input type="hidden" class="form-control" name="email1" id="email1" value="<?php echo $_SESSION['email']; ?>" >
                        </div>
                    </div>
                    <br/>
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Name</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="conferenceName" id="conferenceName" placeholder="Conference Name" disabled>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Type</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="conferenceType" id="conferenceType" placeholder="Conference Type" disabled>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Seats Available</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" name="seatsAvailable" id="seatsAvailable" placeholder="Total Available seats" disabled>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Location</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="text" class="form-control" disabled name="conferenceLocation" id="conferenceLocation" placeholder="Conference Location">
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-3">
                           <p class="pull-right">Attach File</p> 
                        </div>
                        <div class="col-lg-9"> 
                            <input type="file" class="form-control" name="file" id="file" required>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 space">
                        <div class="col-lg-9 col-xs-offset-3">
							<input type="submit" value="Upload" id="update1" class="form-control btn btn-success" disabled> 
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