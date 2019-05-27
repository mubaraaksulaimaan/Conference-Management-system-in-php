<?php 
class conference
{
	/*
		add conference
		update conference
		delete conference
		constructor
	*/
	public $conferenceName = "";
	public $conferenceType;
	public $conferenceDate;
	public $seatsAvailable;
	public $conferenceLocation;
	function addConference()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "reservationsystem";

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

		//var_dump($this->conferenceName);
		$sql = "INSERT INTO reservations (conferenceName, conferenceType, conferenceDate,seatsAvailable, conferenceLocation)VALUES ('$this->conferenceName', '$this->conferenceType','$this->conferenceDate', '$this->seatsAvailable', '$this->conferenceLocation')";

		if ($conn->query($sql) === TRUE) {
		    //echo "New record created successfully";
		    header('Location: http://localhost/Lecture/success.php');
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}	//add conference
	function __construct($name,$type,$date2,$seats,$location)
	{
		$this->conferenceName=$name;
		$this->conferenceType=$type;
		$this->conferenceDate=$date2;
		$this->seatsAvailable=$seats;
		$this->conferenceLocation=$location;
	}	//constructor
	function updateConference()
	{
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

		$id = $_REQUEST['search'];
		$conferenceName = $_REQUEST["conferenceName"];
		$conferenceType = $_REQUEST["conferenceType"];
		$conferenceDate = $_REQUEST["conferenceDate"];
		$seatsAvailable = $_REQUEST["seatsAvailable"];
		$conferenceLocation = $_REQUEST["conferenceLocation"];


		$sql = "UPDATE Reservations SET conferenceName='$conferenceName',conferenceType='$conferenceType',conferenceDate='$conferenceDate',seatsAvailable='$seatsAvailable',conferenceLocation='$conferenceLocation' WHERE conferenceID = $id";

		if ($conn->query($sql) === TRUE) {
		    //echo "Record updated successfully";
		    $sql="Select * from files";
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				while($row=$result->fetch_assoc()){
					$email=$row['email'];
					mail($email,"Conference updated | CMS","$conferenceName has been updated. Please login to your account to check the changes.");
					echo "$email files<br>";
				}
			}
			$sql="Select * from finalfiles";
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				while($row=$result->fetch_assoc()){
					$email=$row['email'];
					mail($email,"Conference updated | CMS","$conferenceName has been updated. Please login to your account to check the changes.");
					echo "$email finalfiles<br>";
				}
				
			}
			$sql="select * from reserved where conferenceID=$id";
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				while($row=$result->fetch_assoc()){
					$userid=$row['userID'];
					//echo $userid;
					$sql1="select * from users where userID=$userid";
					$result1=$conn->query($sql1);
					if($result1->num_rows>0)
					{
						$row1=$result1->fetch_assoc();
						$email=$row1['email'];
						//echo "$email reserved<br>";
						mail($email,"Conference updated | CMS","$conferenceName has been updated. Please login to your account to check the changes.");
					}
				}
			}
			$sql="select * from finalreserved where conferenceID=$id";
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				while($row=$result->fetch_assoc()){
					$userid=$row['userID'];
					$sql1="select * from users where userID=$userid";
					$result1=$conn->query($sql1);
					if($result1->num_rows>0)
					{
						$row1=$result1->fetch_assoc();
						$email=$row1['email'];
						//echo "$email final reserved<br>";
						mail($email,"Conference updated | CMS","$conferenceName has been updated. Please login to your account to check the changes.");
					}
				}
			}




		    header('Location: http://localhost/Lecture/success.php');
		} else {
		    echo "Error updating record: " . $conn->error;
		}

		//echo $id;
		$conn->close();
	}	//update conference

	function deleteConference()
	{
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

		$id = $_REQUEST['search'];
		$conferenceName = $_REQUEST["conferenceName"];
		//echo $conferenceName;
	    $sql="Select * from files";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc()){
				$email=$row['email'];
				mail($email,"Conference updated | CMS","$conferenceName has been updated. Please login to your account to check the changes.");
				//echo "$email files<br>";
			}
		}
		$sql="Select * from finalfiles";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc()){
				$email=$row['email'];
				mail($email,"Conference updated | CMS","$conferenceName has been updated. Please login to your account to check the changes.");
				//echo "$email finalfiles<br>";
			}
			
		}
		$sql="select * from reserved where conferenceID=$id";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc()){
				$userid=$row['userID'];
				//echo $userid;
				$sql1="select * from users where userID=$userid";
				$result1=$conn->query($sql1);
				if($result1->num_rows>0)
				{
					$row1=$result1->fetch_assoc();
					$email=$row1['email'];
					//echo "$email reserved<br>";
					mail($email,"Conference updated | CMS","$conferenceName has been updated. Please login to your account to check the changes.");
				}
			}
		}
		$sql="select * from finalreserved where conferenceID=$id";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc()){
				$userid=$row['userID'];
				$sql1="select * from users where userID=$userid";
				$result1=$conn->query($sql1);
				if($result1->num_rows>0)
				{
					$row1=$result1->fetch_assoc();
					$email=$row1['email'];
					//echo "$email final reserved<br>";
					mail($email,"Conference updated | CMS","$conferenceName has been updated. Please login to your account to check the changes.");
				}
			}
		}

		$sql="DELETE from RESERVED WHERE conferenceID=$id";
		if($conn->query($sql)===TRUE)
		{
			$sql="DELETE FROM finalreserved where conferenceID=$id";
			if($conn->query($sql) === TRUE)
			{
				$sql = "DELETE FROM files where conferenceID=$id";
				if($conn->query($sql)===TRUE)
				{
					$sql="DELETE from finalfiles where conferenceID=$id";
					if($conn->query($sql)===TRUE)
					{
						$sql = "Delete from Reservations where conferenceID = $id";

						if ($conn->query($sql) === TRUE) 
						{
		    				header('Location: http://localhost/Lecture/success.php');
						} 
						else 
						{
		    				echo "Can't delete from reservations: " . $conn->error;
						}
					}
					else{
						echo "Can't delete from final files : " .$conn->error;
					}
				}
				else
				{
					echo "can't delete from files : ".$conn->error;
				}
			}
			else
			{
				echo "can't delete from final reserved :".$conn->error;
			}
		}
		else{
			echo "can't delete from reserved : ".$conn->error;
		}
		//echo $id;
		$conn->close();
	}//delete conference function
}


if($_REQUEST["pageType"]=="deleteConference.php")
{
	$obj= new conference($_REQUEST["conferenceName"],$_REQUEST["conferenceType"],$_REQUEST['conferenceDate'],$_REQUEST["seatsAvailable"],$_REQUEST["conferenceLocation"]);
	$obj->deleteConference();
}
if($_REQUEST["pageType"]=="addConference.php")
{
	$obj= new conference($_REQUEST["conferenceName"],$_REQUEST["conferenceType"],$_REQUEST['conferenceDate'],$_REQUEST["seatsAvailable"],$_REQUEST["conferenceLocation"]);
	$obj->addConference();
}
if($_REQUEST["pageType"]=="updateConference0.php")
{
	$obj= new conference($_REQUEST["conferenceName"],$_REQUEST["conferenceType"],$_REQUEST['conferenceDate'],$_REQUEST["seatsAvailable"],$_REQUEST["conferenceLocation"]);
	$obj->updateConference();
}


?>