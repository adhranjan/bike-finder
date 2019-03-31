<!DOCTYPE html>
<html lang="en">
<?php   
 include('../Include/config.php');
 //include '../Include/errorrremover.php';
 include '../Include/session.php';
include '../Include/currentuser.php';
include '../Include/mailcount.php';
include 'Include/bike.php';
include 'Include/usercount.php';


 if($userType!=0)
 {
//		 header('location: index.php'); 
 }
?>
<head>
<script>
function autoSubmit(){
    var formObject = document.forms['choice_form'];
    formObject.submit();
}
</script>
<?php
$value = 'unverified';
if(isset($_POST['choice']))
{
$value = $_POST['choice'];
}
?>
<?php
if(isset($_POST['verifyBike']))
	{
		$query="UPDATE bike SET bikeVisibility='1' WHERE bikeID = '$row[0]' AND genericName='$row[1]'"; //query
		$result=$db->query($query);
		echo ("<script>
			window.alert('$row[1] Bike Verified')
			window.location.href='bikes.php';
			</script>");
	}
?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
		 include 'Include/header.php';

		?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bikes
                        </h1>
						<h5>
						<form name="choice_form" id="choice_form" method="post">
		<input type="radio" name="choice" <?php if ($value == 'unverified') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="unverified"> Unverified Bikes
     
        <input type="radio" name="choice" <?php if ($value == 'verified') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="verified"> Verified Bikes
     	     
</form>


						</h5>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i><?php
																if($value=='unverified')
																{
																	echo" Unverified Bikes";
																}
																else echo " Verified Bikes";
																 ?>                        

							</li>
                        </ol>
                    </div>
                </div>
                <div class='row'>
								
<?php
if($value=='unverified')
{	
$querybike="SELECT * FROM bike b  inner join user u on u.userID= b.userID WHERE bikeVisibility=0"; 
}
else
{
$querybike="SELECT * FROM bike b  inner join user u on u.userID= b.userID WHERE bikeVisibility=1"; 

}	
$resultbike=$db->query($querybike);
while ( $row = mysqli_fetch_array($resultbike, MYSQL_BOTH)) {
echo"
					<div class='col-lg-3'>
                      <div class='panel panel-default'>
							<div class='panel-heading'>
									<h3 class='panel-title'></i>$row[1] $row[2]</h3>
							</div>
							<div class='panel-body'>
								<div id='morris-donut-chart'>
									<div class='image'>
										<div class='thumbnail'><img src='../bike_image/$row[0].jpg'></div>
									</div>
								</div>
										<p class='small text-muted'>Sold by: $row[11] $row[12]</p>
										<p class='small text-muted'>Price:Nrs.$row[3]</p>
										<p class='small text-muted'>Stock Available: $row[8]</p>
										<p class='small text-muted'>Address: $row[14]</p>
									";
									if($row[6]==0)
									{
										echo"	<form method='post' action=''>
												<button type='submit' name= 'verifyBike' class='btn btn-info' >
												Verify
											</button>
											</form>
											";
									}
									echo"
							</div>
                      </div>
					</div>";
               
					
}?>	
			 </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
