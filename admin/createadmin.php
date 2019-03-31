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
<?php
//create admin here
if(isset($_POST['createAdmin']))
 {
	$count=0;
	$newemail =$_POST['newemail'];
	$query="SELECT * FROM user WHERE email = '$newemail'"; //query
	$result=$db->query($query);
	$num_rows=$result->num_rows;
	for($i=0;$i<$num_rows;$i++)
		{
			$row=$result->fetch_row();
			$count++;
		}
	if ($count==0)
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Email Address not registered yet')
			window.location.href='createadmin.php';
			</SCRIPT>");
		}
	
	else
		{
		$fname=$row[2];
		$adminType=$row[11];
		if ($adminType==1)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('You cannot do this action for super admin')
					window.location.href='createadmin.php';
					</SCRIPT>"); 
			}
		else
			{
				if(($newemail==$row[1])) //checking  email is that exist
				{
					$query="UPDATE user SET userType='0',AdminCreatedBy='$userID' WHERE email = '$newemail'"; //query
					$result=$db->query($query);
					echo ("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Admin Created')
						window.location.href='createadmin.php';
						</SCRIPT>"); 
				}
	
			}
	
		}
}
?> 

<?php
//Delete User
  if(isset($_POST['deleteUser']))
	{ 
		$count=0;
		$newemail =$_POST['newemail'];
		$query="SELECT * FROM user WHERE email = '$newemail'"; //query
		$result=$db->query($query);
		$num_rows=$result->num_rows;
		for($i=0;$i<$num_rows;$i++)
			{
				$row=$result->fetch_row();
				$count++;
			}
		if ($count==0)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Email Address not registered yet')
					window.location.href='createadmin.php';
					</SCRIPT>");
			}
	
		else
			{
				$fname=$row[2];
				$adminType=$row[11];
				if ($adminType==1)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('You cannot do this action for super admin')
						window.location.href='createadmin.php';
						</SCRIPT>"); 
					}
		else
			{
					if(($newemail==$row[1])) //checking  email is that exist
				{	 
					$query="SELECT * FROM user WHERE email = '$newemail'"; //query to select
					$result=$db->query($query);
					$num_rows=$result->num_rows;
					for($i=0;$i<$num_rows;$i++)
						{
							$row=$result->fetch_row();
						}
							$userID=$row[0];		  
							$query="DELETE FROM bike WHERE userID = '$userID'"; //query to delete bike with above UserID
							$result=$db->query($query);
							$query="DELETE FROM user WHERE email = '$newemail'"; //query to delete user 
							$result=$db->query($query);
							echo ("
							<script>
							window.alert('Succesfully Deletd')
							window.location.href='createadmin.php';
							</script>"); 
							    
				}
	
			}	
	
		}
	}		
?> 
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Factory
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"> Admin Factory</i>            
							</li>
                        </ol>
                    </div>
                </div>
                <div class='row'>
					<div class="col-lg-12">				
						<form role="form"  action="" method="post" name="createAdmin">
				
										<div class="form-group" style="width:220px";>
											 
											<label for="exampleInputEmail1">
												Email address
											</label>
											<input type="email" class="form-control" name="newemail" id="exampleInputEmail1">
										</div>
									
										
										<button type="button"  name="login" class="btn btn-success" a id="modal-createadmin" href="#modal-container-createadmin" role="button" class="btn" data-toggle="modal"> 
											Create admin
										</button>
										
										<button type="button"  name="login" class="btn btn-danger" a id="modal-564741" href="#modal-container-deleteuser" role="button" class="btn" data-toggle="modal"> 
											Delete User
										</button>
							<div class="modal fade" id="modal-container-createadmin" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header"> 
											 
												<input type="image" src="images/exit.png" class="close" data-dismiss="modal" aria-hidden="true">
													</input>
											 

										
											<h4 class="modal-title" id="myModalLabel">
												Sure want to submit this email as Admin?
												
											</h4>
										</div>
										
										<div class="modal-footer">
											 
											<button type="button" class="btn btn-default" data-dismiss="modal">
												No
											</button> 
											<button type="submit" name= "createAdmin" class="btn btn-primary" >
												Yes
											</button>
										</div>
									</div>
									
								</div>
								
							</div>
							<div class="modal fade" id="modal-container-deleteuser" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header"> 
											 
												<input type="image" src="images/exit.png" class="close" data-dismiss="modal" aria-hidden="true">
													</input>
											<h4 class="modal-title" id="myModalLabel">
												Confirm Delete?
												
											</h4>
										</div>
										
										<div class="modal-body"> 
											 
											
											<h5 class="modal-title" id="myModalLabel">
											Every information related this user will be deleted. Once you pressed yes, they cannot be re-obtained.
												
											</h5>
										</div>
										
										<div class="modal-footer">
											 
											<button type="button" class="btn btn-default" data-dismiss="modal">
												No
											</button>  
											<button  type="submit" name= "deleteUser" class="btn btn-primary" >
												Yes
											</button>
										</div>
									</div>
									
								</div>
								
							</div>
						</form>
				</div>
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
