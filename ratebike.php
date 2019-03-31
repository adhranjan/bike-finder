<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php   
 include("Include/config.php"); //include the config
 include 'Include/errorrremover.php';
 include 'Include/session.php';
 include 'Include/currentuser.php';
?>

<?php
$rate = intval($_GET['rate']);
$bikeID=intval($_GET['bikeID']);
$query="INSERT INTO bikerate (bikeID,ratedBy,ratedAs) VALUES ('$bikeID','$userID','$rate')";
$result=$db->query($query);
?>
<?php
echo "&nbsp&nbspThank you for rating this item.";
?>

</body>
</html>
