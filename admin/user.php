<!DOCTYPE html>
<html lang="en">
<?php   
 include('../Include/config.php');
 //include 'Include/errorrremover.php';
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
$value = 'uvSellers';
if(isset($_POST['choice']))
{
$value = $_POST['choice'];
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
                            Users
                        </h1>
						<h5>
						<form name="choice_form" id="choice_form" method="post">
		<input type="radio" name="choice" <?php if ($value == 'uvSellers') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="uvSellers"> Unverified Sellers
        <input type="radio" name="choice" <?php if ($value == 'vSellers') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="vSellers"> Verified Sellers
        <input type="radio" name="choice" <?php if ($value == 'admins') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="admins"> Admins
     	     
</form>


						</h5>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i><?php
																if($value=='uvSellers')
																{
																	echo" Unverified Sellers";
																}
																else if($value=='vSellers')
																{
																	echo " Verified Sellers";
																}
																else if($value=='admins')
																{
																	echo " Admins";
																}
																
																 ?>                        

							</li>
                        </ol>
                    </div>
                </div>
                <div class='row'>
								
<?php
if($value=='uvSellers')
{	
$query="SELECT * FROM user WHERE userType=1 AND visibility=0"; 
}
else if($value=='vSellers')
{
$query="SELECT * FROM user WHERE userType=1 AND visibility=1"; 
}
else
{
	$query="SELECT * FROM user WHERE userType=0"; 
}	
$result=$db->query($query);
while ( $row = mysqli_fetch_array($result, MYSQL_BOTH)) {
echo"
					<div class='col-lg-3'>
                      <div class='panel panel-default'>
							<div class='panel-heading'>
									<h3 class='panel-title'></i>$row[2] $row[3]</h3>
							</div>
							<div class='panel-body'>
										<p class='small text-muted'>Email ID: $row[1]</p>
										<p class='small text-muted'>Address: $row[5]</p>
										<p class='small text-muted'>Phone: $row[7]</p>

										
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
