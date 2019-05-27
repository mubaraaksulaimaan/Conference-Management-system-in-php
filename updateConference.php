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

$id = $_REQUEST['id'];

$sql = "SELECT * FROM Reservations WHERE conferenceID=$id";
//echo $sql;

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    echo $row["conferenceName"]. "," .$row["conferenceType"]. "," .$row["conferenceDate"]."," .$row["seatsAvailable"]. "," .$row["conferenceLocation"];
}
//echo $id;
$conn->close();
?>