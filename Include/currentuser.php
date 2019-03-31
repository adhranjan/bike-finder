<?php
if(!isset($_SESSION['email']))
{
	   header("location: index.php"); 

}

else 
{
	$email=$_SESSION['email'];
	$query="SELECT * FROM user WHERE email = '$email'"; //query
	$result=$db->query($query);
	$num_rows=$result->num_rows;
	for($i=0;$i<$num_rows;$i++)
		{ 
			$row=$result->fetch_row();
		}
$userID=$row[0];
$fname=$row[2];
$lname=$row[3];
$address=$row[5];
$userType=$row[6];
$phone=$row[7];		
$visibility=$row[10];
$adminType=$row[11];
}
?>