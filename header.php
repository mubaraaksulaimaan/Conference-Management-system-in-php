<!DOCTYPE html>
<html>
<head>
	<link href="styling.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
#Logout
{
  position: absolute;
	margin-left: 93%;
	background-color: red;
	align:right;
}
#welcome
{
  position: absolute;
  margin-left: 75%;
  
  align:right;
}
</style>
</head>
<body>
<ul style="height: 80px;padding-top: 0px;padding-left: 20px;font-size: 26px;margin-bottom: -5px;">
  <a href="./home.php"><li style="color: white;"><div><img src="http://localhost/Lecture/images/logo.png" width="50px" height="60px">  </div><div style="margin-top: -38px; margin-left: 55px;">Conference Managment System</div></li></a>
  <li id="welcome" style="font-size: 13px;"><a>Welcome <?php echo $email ?></a></li>
</ul>
<ul>
  <li><a class="active" href="http://localhost/Lecture/home.php">Home</a></li>
  <li><div id="up"><a href="http://localhost/Lecture/user.php">Upcoming Conference</a></div></li>
  <li><div id="add"><a href="http://localhost/Lecture/addConference1.php">Add Conference</a></div></li>
  <li><div id="update"><a href="http://localhost/Lecture/updateConference0.php">Update Conference</a></div></li>
  <li><div id="delete"><a href="http://localhost/Lecture/deleteConference.php">delete Conference</a></div></li>
  <li><div id="addUser"><a href="http://localhost/Lecture/addUser.php">Add User</a></div></li>
  <li><div id="deleteUser"><a href="http://localhost/Lecture/DeleteUser.php">Delete User</a></div></li>
  <li><div id="viewAllUsers"><a href="http://localhost/Lecture/viewUsers.php">View All Users</a></div></li>
  <li><div id="assign"><a href="http://localhost/Lecture/assignRoles.php">Assign Roles</a></div></li>
  <li><div id="p1"><a href="http://localhost/Lecture/getDocument.php">Submit Proposal</a></div></li>
  <li><div id="f1"><a href="http://localhost/Lecture/getFinalDocument.php">Submit Final Document</a></div></li>
  <li><div id="r1"><a href="http://localhost/Lecture/ReviewsOne.php">Review Proposal</a></div></li>
  <li><div id="rf"><a href="http://localhost/Lecture/ReviewsFinal.php">Review Document</a></div></li>
  <li><div id="updateUser"><a href="http://localhost/Lecture/updateUser.php">Update Profile</a></div></li>
  <li id="Logout"><a href="http://localhost/Lecture/Logout.php">Logout</a></li>
</ul>

</body>
</html>