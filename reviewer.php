<?php
include 'users.php';
class reviewer extends actor
{
    /*
        Accept first document
        Reject first document
        accept final document
        reject final document
        constructor
    */
    function __construct()
    {
        
    }
	function acceptFirst()
	{
		$buttonId=$_GET['buttonId'];
        //echo $buttonId;
        $email1=$_GET['HiddenEmailA'.$buttonId];
        //echo $email1;
        $ConferenceID1=$_GET['HiddenConferenceIDA'.$buttonId];
        //echo $ConferenceID1;

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

        $query="SELECT userID,email FROM users ";
        $result=$conn->query($query);
        
        //var_dump($row1);
        while($row1 = $result->fetch_assoc()){
                $emailFromDataBase=$row1['email'];
                if($email1==$emailFromDataBase)
                {
                      $userIDFromDataBase=$row1['userID']; 
                      //echo $userIDFromDataBase; 
                }               
        }
        $flag=false;
        $query="INSERT INTO reserved(userID,conferenceID)values('$userIDFromDataBase','$ConferenceID1')";
        if ($conn->query($query) === TRUE) {
            $flag=true;
            echo "New record created successfully";
        }
        else 
        {
            $flag=false;
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $query="DELETE FROM files WHERE email='$email1' and conferenceID='$ConferenceID1'";
        if ($conn->query($query) === TRUE) {
            $flag=true;
            echo "Record Deleted successfully";
        } 
        else {
            $flag=false;
            echo "Error deleting record: " . $conn->error;
        }
        if($flag=true)
        {
            mail($email1,"Upload Final Document | Conference Managment System","Congratulations! Your fisrt document has been accepted. Login to your account and upload your final document. You will recieve email about your final document whether it is accepted or rejected."); 
            header('Location: http://localhost/Lecture/success.php');
        }
        $conn->close();
	}//acceptfisrt

	function rejectFirst()
	{
		$buttonId=$_GET['buttonId'];
        //echo $buttonId;
        $email1=$_GET['HiddenEmailR'.$buttonId];
        //echo $email1;
        $ConferenceID1=$_GET['HiddenConferenceIDR'.$buttonId];
        //echo $ConferenceID1;

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

        $flag=false;
         $query="SELECT userID,email FROM users ";
        $result=$conn->query($query);
        
        //var_dump($row1);
        while($row1 = $result->fetch_assoc()){
                $emailFromDataBase=$row1['email'];
                if($email1==$emailFromDataBase)
                {
                      $userIDFromDataBase=$row1['userID']; 
                      //echo $userIDFromDataBase; 
                }               
        }
        $query="DELETE FROM files WHERE email='$email1' and conferenceID='$ConferenceID1'";
        if ($conn->query($query) === TRUE) {
            //$flag=true;
            //echo "Record Deleted successfully";
            $query="DELETE FROM reserved where userID='$userIDFromDataBase' and ConferenceID='$ConferenceID1'";
            if($conn->query($query) === TURE)
            {
                $flag=true;
            }
            else
                $flag=false;
        } 
        else {
            $flag=false;
            echo "Error deleting record: " . $conn->error;
        }
        if($flag=true)
        {
            mail($email1,"Sorry You were rejected. Better luck Next time. <br> Team CRS!"); 
            header('Location: http://localhost/Lecture/success.php');
        }
        

        $conn->close();
	}//reject first

	function acceptFinal()
	{
		$buttonId=$_GET['buttonId'];
        //echo $buttonId;
        $email1=$_GET['HiddenEmailA'.$buttonId];
        //echo $email1;
        $ConferenceID1=$_GET['HiddenConferenceIDA'.$buttonId];
        //echo $ConferenceID1;

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

        $query="SELECT userID,email FROM users ";
        $result=$conn->query($query);
        
        //var_dump($row1);
        while($row1 = $result->fetch_assoc()){
                $emailFromDataBase=$row1['email'];
                if($email1==$emailFromDataBase)
                {
                      $userIDFromDataBase=$row1['userID']; 
                      //echo $userIDFromDataBase; 
                }               
        }
        $flag=FALSE;
        $query="INSERT INTO finalreserved(userID,conferenceID)values('$userIDFromDataBase','$ConferenceID1')";
        if ($conn->query($query) === TRUE) {
            //echo "New record created successfully";
            $flag=true;
        }
        else 
        {
            $flag=false;
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $query="DELETE FROM finalfiles WHERE email='$email1' and conferenceID='$ConferenceID1'";
        if ($conn->query($query) === TRUE) {
            $flag=true;
            //echo "Record Deleted successfully";
        } 
        else {
            $flag=false;
            echo "Error deleting record: " . $conn->error;
        }
        if($flag==true)
        {
            $query="UPDATE reservations set `seatsAvailable`=`seatsAvailable`-1 where ConferenceID='$ConferenceID1'";
            if($conn->query($query)=== TRUE)
            {
                mail($email1,"Conference Managment System Selection","Conguratulations! You have been selected for conference. Please Report at time specified."); 
                header('Location: http://localhost/Lecture/success.php');
            }
            else
            {
                echo $conn->error;
            }
        }
        $conn->close();
	}//accept final

	function rejectFinal()
	{
		$buttonId=$_GET['buttonId'];
        //echo $buttonId;
        $email1=$_GET['HiddenEmailR'.$buttonId];
        //echo $email1;
        $ConferenceID1=$_GET['HiddenConferenceIDR'.$buttonId];
        //echo $ConferenceID1;

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

        $flag=FALSE;
        $query="SELECT userID,email FROM users ";
        $result=$conn->query($query);
        
        //var_dump($row1);
        while($row1 = $result->fetch_assoc()){
                $emailFromDataBase=$row1['email'];
                if($email1==$emailFromDataBase)
                {
                      $userIDFromDataBase=$row1['userID']; 
                      //echo $userIDFromDataBase; 
                }               
        }
        $query="DELETE FROM finalfiles WHERE email='$email1' and conferenceID='$ConferenceID1'";
        if ($conn->query($query) === TRUE) {
            //$flag=true;
            //echo "Record Deleted successfully";
            $query="DELETE FROM finalreserved where userID='$userIDFromDataBase' and ConferenceID='$ConferenceID1'";
            if($conn->query($query) === TRUE)
            {
                $flag=true;
            }
        } 
        else {
            $flag=false;
            echo "Error deleting record: " . $conn->error;
        }
        if($flag==true)
        {
            if($conn->query($query)=== TRUE)
            {
                mail($email1,"Rejection @ Conference Reservation System","Sorry You were rejected. Better luck Next time. <br> Team CRS!"); 
                header('Location: http://localhost/Lecture/success.php');
            }
            else
            {
                echo $conn->error;
            }
        }
        $conn->close();
	}//reject final
}

if($_REQUEST["pageType"]=="accept.php")
{
	$obj=new reviewer();
	$obj->acceptFirst();
}

if($_REQUEST["pageType"]=="reject.php")
{
	$obj=new reviewer();
	$obj->rejectFirst();
}
if($_REQUEST["pageType"]=="acceptFinal.php")
{
	$obj=new reviewer();
	$obj->acceptFinal();
}
if($_REQUEST["pageType"]=="rejectFinal.php")
{
	$obj=new reviewer();
	$obj->rejectFinal();
}

?>