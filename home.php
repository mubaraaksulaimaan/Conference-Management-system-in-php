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
?>
<html>
<head>
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: block;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  max-height: 312px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 2.0s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 5.0s;
  animation-name: fade;
  animation-duration: 5.0s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}



a:link {
color: #fff;
}
a:visited {
color: #fff;
}
a:hover {
color: #fff;
}



.content {
  position: absolute; /* Position the background text */
  bottom: 0; /* At the bottom. Use top:0 to append it to the top */
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.8); /* Black background with 0.5 opacity */
  color: #f1f1f1; /* Grey text */
  width: 100%; /* Full width */
  height: 20%;
  padding: 20px; /* Some padding */
}
</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="http://localhost/Lecture/images/0.jpg" style="width:100%">
  <div class="content">
  <div class="text" style="font-size:30px; color:white;"><a href="">Features</a> </div>
  </div>	
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="http://localhost/Lecture/images/1.jpg" style="width:100%">
  <div class="content">
  	<div class="text" style="font-size:30px; color:white;"><a href="./contact.php">Contact Us</a></div>
  </div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="http://localhost/Lecture/images/2.jpg" style="width:100%">
  <div class="content">
  <div class="text" style="font-size:30px; color:white;"><a href="./about.php">About Us</a></div>
  </div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}


function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1} 
  slides[slideIndex-1].style.display = "block"; 
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>

</body>
</html> 
