<?php
include 'Include/session.php';
include 'Include/config.php';
include 'Include/currentuser.php';
include 'Include/errorrremover.php';

?>	
<?php
if(!isset($_SESSION['email']))
{
	  header("location: index.php"); 
}

?>
<?php
	$query="SELECT * FROM user WHERE email = '$email'"; //query
	$result=$db->query($query);
	$num_rows=$result->num_rows;
	for($i=0;$i<$num_rows;$i++)
		{ 
			$row=$result->fetch_row();
		}
$password=$row[4];


?>
<?php 

			$changeerror=0;
?>
	<link href="admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/loginreg.css" rel="stylesheet">
	
	<style>
	.col-md-10
	{
		height:15%;
	}
	.notvalid
	{
		color: #D8000C;
	}
	.verticalLine
	{
			border-style:outset;
	}
	.jumbotron
	{
		height:75%;
		width:80%;
	}
	</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">		
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					 
				<div class="row" style="margin-left:-55px;">
				<div class="col-md-12">
				<br>
					<div class="jumbotron">
	
						<div class="verticalLine">
						<div class="row">
						<div class="col-md-2">
						<form method="get" action="index.php">
						<input type="image" src="images/home.png" width="20px" height="20px";>
						</form>	
						</div>
						<div class="col-md-10">
						<h3>
							Change Password
						
						</div>
						</h3>
						</div>
						</div>
						<br>
						
							<div class="col-md-12">
							<form name="changePassword" method="post">
									
								<div class="form-group">
								<label for="exampleInputEmail1">
								Email address
								<?php
									if(isset($_POST['changePassword'])) 
									{

									 $changePasswordemail = ($_POST['changePasswordemail']);
									 if($email== $changePasswordemail)
									 {
									 }

									 else{ $changeerror++;
										echo "<span class='notvalid'> is incorrect</span>";
									} 
									}
									?>
									<input type="email" class="form-control" name="changePasswordemail" id="exampleInputEmail1 "  required title="Provide your valid email">

								</label>
								</div>

								<div class="form-group">
								<label for="Password">
								Old	Password
								<?php
								if(isset($_POST['changePassword'])) 
								{
								$changeOldPassword=($_POST['changeOldPassword']);
								} 
																				
								?>
									<input type="password" class="form-control" name="changeOldPassword" id="exampleInputPassword1">
								</label>
								</div>

								<div class="form-group">
								<label for="Password">
								New Password
								<?php
if(isset($_POST['changePassword'])) {
$changeToNewPassword=($_POST['changeToNewPassword']);
$reTypedPassword=($_POST['reTypedPassword']);
if($changeToNewPassword=="")
{
echo "<span class='notvalid'>is empty</span>";
$changeerror++;
}
if($changeToNewPassword!=$reTypedPassword)
{
echo "<span class='notvalid'> donot match</span>";
$changeerror++;
}
} 
?>
<input type="password" class="form-control" name="changeToNewPassword" id="exampleInputPassword1">		<br>								
								Re-Type Password											
								<input type="password" class="form-control" name="reTypedPassword" id="exampleInputPassword1">
								</label>
								</div>
								
								<button type="submit"  name="changePassword" class="btn btn-default">
								Change
								</button>

								</div>
								</form>
						</div>			
				
					</div>
				</div>
			</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
				<?php
				$encryptedOld = encryptIt( $changeOldPassword );
				$changeToNewPassword=encryptIt( $changeToNewPassword );
				function encryptIt( $q ) {
					$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
					$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
					return( $qEncoded );
				}
				if($password!=$encryptedOld)
				{
					$changeerror++;
				}
				?>
<?php
if($changeerror!=0)
{
echo "	
		<div class='row'>
		<div class=col-md-4>
		</div>
		<div class=col-md-4>
		<span class='notvalid'> Make Sure all the information are correct.</span>
		</div>
		<div class=col-md-4>
		</div>
		</div>";
}
?>
				

				<?php
				if($changeerror==0)
{
		$query="UPDATE user SET password='$changeToNewPassword' WHERE email = '$email'"; //query
		$result=$db->query($query);
		echo ("<script>
			window.alert('Password Changed')
			window.location.href='index.php';
			</script>");
}
?>