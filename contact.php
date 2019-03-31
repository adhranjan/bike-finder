<?php   
 include("Include/config.php"); //include the config
 include 'Include/errorrremover.php';
 include 'Include/session.php';
 
if(isset($_SESSION['email']))
	{ 
		$email= $_SESSION['email'];
	}
	$query="SELECT * FROM user WHERE email = '$email'"; //query
	$result=$db->query($query);
	$num_rows=$result->num_rows;
	for($i=0;$i<$num_rows;$i++)
		{ 
			$row=$result->fetch_row();
		}
	$fname=$row[2];
	$lname=$row[3];

	?>
								


<style>

	#notvalid
	{
		color: #D8000C;
	}

  .img-thumbnail
{
	height: 120px !important;
	width:200px !important;
}
.footer-bottom{
	border-bottom: 0px !important;
}


</style>

<!DOCTYPE HTML>
<html>
<head>
<title>Bike Finder</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>   
<!--slider-->
<script src="js/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/superfish.js"></script>
</head>
<body>
<div class="header-bg">
	<div class="wrap"> 
		<div class="h-bg">
			<div class="total">
				<div class="header">
					<div class="box_header_user_menu">

							<?php
							 if(!isset($_SESSION['email'])){ 
							 	echo "<ul class='user_menu'><li class=''><a href=''><div class='button-t'><span>
							 	Create an Account</span></div></a></li><li class='last'><a href=''><div class='button-t'><span><a href='index.php'>Log in</a></span></div></a></li></ul>

								";}
								else
									echo "<ul class='user_menu'><li class=''><a href=''><div class='button-t'><span><a href='logout.php'>
							 	Logout</a></span></div></a></li><li class='last'><a href=''><div class='button-t'><span><a href=''>$fname $lname</a></span></div></a></li></ul>

								";



?>



					</div>
					<div class="clear"></div> 
					<div class="header-bot">
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt=""/></a>
						</div>
						
					<div class="clear"></div> 
				</div>		
		</div>	
		<div class="menu"> 	
			<div class="top-nav"> 
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="specials.html">Specials</a></li>
						<li><a href="new.html">New</a></li>
						<li class="active"><a href="contact.php">Contact</a></li>
					</ul>
					<div class="clear"></div> 
				</div>
		</div>
		<div class="banner-top">
			<div class="header-bottom">
				 <div class="header_bottom_right_images">
 			<div class="section group">
				<div class="col span_2_of_c">
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
					    <form method="post" action="">
					    	<div>
						    	<span><label>Email</label></span>
						    	<span>
						    		<?php
							 if(!isset($_SESSION['email'])){
							 	echo"
							   		<input name='email' type='text' required class='textbox'></span>";}
							   		else echo "$email";
						    		?>

						    </div>
						    <div>
						    	<span><label>Subject</label></span>
						    	<span><input name="subject" type="text" required class="textbox"></span>
						    </div>

						    <div>
						    	<span><label>Body</label></span>
						    	<span><textarea name="body" maxlength="90" required> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="contactAdmin" value="Submit"></span>
						  </div>
					    </form>
				  </div>
  				</div><div class="clear"></div>
			</div>
					  			<div class="content-wrapper">		  
									<div class="content-top">

								<div class="text">
								</div>
							 	
									<div class='clear'></div>
									
									<div class="clear"></div>
								</div>
						</div>
				</div>
		</div>

		<div class="clear"></div>



		<div class="clear"></div>
		<div class="footer-bottom">
			<div class="copy">
				<p>All rights Reserved | BYK Finder 2015</a></p>
			</div>
		</div>

</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

 <?php
if(isset($_POST['contactAdmin']))
{
	if(isset($_SESSION['email']))
		{	 
			$email= $_SESSION['email'];
		}
	else
		{
			$email=($_POST['email']);
		}
	$body = ($_POST['body']);
	$subject = ($_POST['subject']);
	$mailRead="f";
	$date = date("Y-m-d h:i:sa");
	
	($db->query("INSERT INTO mails
    (subject,body,email,mailRead,DateAndTime)
    VALUES ('$subject','$body','$email','$mailRead' ,'$date')")); 
	
	echo 
	("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Mail has been sent. We will contact you as soon as possible')
    window.location.href='contact.php';
    </SCRIPT>"); 
	}
?>
   	
    	
            