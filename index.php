<?php   
 include("Include/config.php"); //include the config
 include 'Include/errorrremover.php';
 include 'Include/session.php';
 
 if(isset($_SESSION['email'])){ //redirect to index if logged in
   header("location: home.php"); 
   exit();
}
?>
								
<?php
//encrypt logged in password
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
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
						<ul class="user_menu"><li class=""><a href=""><div class="button-t"><span>Create an Account</span></div></a></li><li class="last"><a href=""><div class="button-t"><span><a href="#login">Log in</a></span></div></a></li></ul>
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
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="specials.html">Specials</a></li>
						<li><a href="new.html">New</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<div class="clear"></div> 
				</div>
		</div>
		<div class="banner-top">
			<div class="header-bottom">
				 <div class="header_bottom_right_images">
				     	<div id="slideshow">
							<ul class="slides">
						    	<li><a href="details.html"><canvas ></canvas><img src="images/banner4.jpg" alt="Marsa Alam underawter close up" ></a></li>
						        <li><a href="details.html"><canvas></canvas><img src="images/banner2.jpg" alt="Turrimetta Beach - Dawn" ></a></li>
						        <li><a href="details.html"><canvas></canvas><img src="images/banner3.jpg" alt="Power Station" ></a></li>
						        <li><a href="details.html"><canvas></canvas><img src="images/banner1.jpg" alt="Colors of Nature" ></a></li>
						    </ul>
						    <span class="arrow previous"></span>
						    <span class="arrow next"></span>
				  		</div>
						<?php
						$rand=rand(1,3);
						?>
					  			<div class="content-wrapper">		  
									<div class="content-top">
							  			<div class="box_wrapper"><h1>
							  				<?php
							  				if($rand==1)
							  				{
							  				echo"New First";
							  				}
							  				if($rand==2)
							  				{
							  				echo"Economic First";
							  				}
							  				if($rand==3)
							  				{
							  				echo"Least Availabe First";
							  				}

										  ?>
							  		</h1>
								</div>
								<div class="text">
								</div>
							 	<?php
							 	if($rand==1)
							 	{
							 	$query="SELECT * FROM bike b  inner join user u on u.userID= b.userID WHERE (ItemRemaining>0 AND bikeVisibility=1) Order By bikeID DESC  LIMIT 3" ; //query
									$result=$db->query($query);
								while ( $row = mysqli_fetch_array($result, MYSQL_BOTH)) {
									$bikeID=$row[0];
									$genericName=$row[1];		
									$bikeName=$row[2];		
									$bikePrice=$row[3];		
									$bikeSold=$row[7];	
									$stockRem=$row[8];
									$uploaderfName=$row[10];	
									$uploaderlName=$row[11];	
									$uploaderAdress=$row[14];	
									$uploaderPhone=$row[15];		
									

									echo"
							 	<div class='grid_1_of_3 images_1_of_3'>
									<div class='grid_1'>
										<a href='single.html'>
											<img src='bike_image/$bikeID.jpg' class='img-thumbnail title='continue reading' alt=''>
										</a>
											<div class='grid_desc'>
												<p class='title'>$genericName $bikeName</p>
												<p class='title1'>Availabe at <h5>$uploaderAdress </h5></p>
												<p class='title1'>Stock Remaining <h6>$stockRem </h6></p>
											
													 <div class='price' style='height: 19px;'>
													 	 <span class='reducedfrom'>Nrs.$bikePrice</span>
													</div>
													<div class='cart-button'>
														<div class='cart'>
															<a href='#''><img src='images/cart.png' alt=''/></a>
														</div>
														<button class='button'><span>Details</span></button>
													<div class='clear'></div>
												</div>
											</div>
									</div>
								</div>
									
									";}
								}
							if($rand==2)
							 	{
							 	$query="SELECT * FROM bike b  inner join user u on u.userID= b.userID WHERE (ItemRemaining>0 AND bikeVisibility=1) Order By bikePrice Asc  LIMIT 3" ; //query
									$result=$db->query($query);
								while ( $row = mysqli_fetch_array($result, MYSQL_BOTH)) {
									$bikeID=$row[0];
									$genericName=$row[1];		
									$bikeName=$row[2];		
									$bikePrice=$row[3];		
									$bikeSold=$row[7];	
									$stockRem=$row[8];
									$uploaderfName=$row[10];	
									$uploaderlName=$row[11];	
									$uploaderAdress=$row[14];	
									$uploaderPhone=$row[15];		
									

									echo"
							 	<div class='grid_1_of_3 images_1_of_3'>
									<div class='grid_1'>
										<a href='single.html'>
											<img src='bike_image/$bikeID.jpg' class='img-thumbnail title='continue reading' alt=''>
										</a>
											<div class='grid_desc'>
												<p class='title'>$genericName $bikeName</p>
												<p class='title1'>Availabe at <h5>$uploaderAdress </h5></p>
												<p class='title1'>Stock Remaining <h6>$stockRem </h6></p>
											
													 <div class='price' style='height: 19px;'>
													 	 <span class='reducedfrom'>Nrs.$bikePrice</span>
													</div>
													<div class='cart-button'>
														<div class='cart'>
															<a href='#''><img src='images/cart.png' alt=''/></a>
														</div>
														<button class='button'><span>Details</span></button>
													<div class='clear'></div>
												</div>
											</div>
									</div>
								</div>
									
									";}
								}

							 	if($rand==3)
							 	{
							 	$query="SELECT * FROM bike b  inner join user u on u.userID= b.userID WHERE (ItemRemaining>0 AND  ItemRemaining<=6 AND bikeVisibility=1) ORDER BY ItemRemaining ASC LIMIT 3" ; //query
									$result=$db->query($query);
								while ( $row = mysqli_fetch_array($result, MYSQL_BOTH)) {
									$bikeID=$row[0];
									$genericName=$row[1];		
									$bikeName=$row[2];		
									$bikePrice=$row[3];		
									$bikeSold=$row[7];	
									$stockRem=$row[8];
									$uploaderfName=$row[10];	
									$uploaderlName=$row[11];	
									$uploaderAdress=$row[14];	
									$uploaderPhone=$row[15];		
									

									echo"
							 	<div class='grid_1_of_3 images_1_of_3'>
									<div class='grid_1'>
										<a href='single.html'>
											<img src='bike_image/$bikeID.jpg' class='img-thumbnail title='continue reading' alt=''>
										</a>
											<div class='grid_desc'>
												<p class='title'>$genericName $bikeName</p>
												<p class='title1'>Availabe at <h5>$uploaderAdress </h5></p>
												<p class='title1'>Stock Remaining <h6>$stockRem </h6></p>
											
													 <div class='price' style='height: 19px;'>
													 	 <span class='reducedfrom'>Nrs.$bikePrice</span>
													</div>
													<div class='cart-button'>
														<div class='cart'>
															<a href='#''><img src='images/cart.png' alt=''/></a>
														</div>
														<button class='button'><span>Details</span></button>
													<div class='clear'></div>
												</div>
											</div>
									</div>
								</div>
									
									";}
								}


							 ?>
									<div class='clear'></div>
									
									<div class="clear"></div>
								</div>
						</div>
				</div>
		</div>

		<div class="header-para">
				<div class="categories">
						<div class="box_wrapper">
									<h1>
									Random Bikes
									</h1>
								</div>
								<div class="text">
								</div>
						<div class="list-categories">
							<div class="first-list">
								<?php
								$query="SELECT * FROM bike" ; //query
									$result=$db->query($query);
									$num_rows=$result->num_rows;		
									$bike1=rand(1,$num_rows);
									$bike2=rand(1,$num_rows);
									$bike3=rand(1,$num_rows);
									$bike4=rand(1,$num_rows);
									$bike5=rand(1,$num_rows);
									if($bike1==$bike2 || $bike3 ||$bike4 ||$bike5 )
									{
										$bike1=rand(1,$num_rows);

									}

									if($bike2==$bike1 || $bike3 ||$bike4 ||$bike5)
									{
										$bike2=rand(1,$num_rows);

									}
									if($bike3==$bike1 || $bike2||$bike4 ||$bike5)
									{
										$bike3=rand(1,$num_rows);

									}

									if($bike4==$bike1 || $bike2 || $bike3 || $bike5 )
									{
										$bike4=rand(1,$num_rows);

									}

									if($bike5==$bike1 || $bike2 || $bike3 || $bike4 )
									{
										$bike5=rand(1,$num_rows);

									}
									

									$querybike1="SELECT * FROM bike WHERE BikeID=$bike1" ; //query
									$resultbike1=$db->query($querybike1);
									$num_rowsbike1=$resultbike1->num_rows;
									$rowbike1=$resultbike1->fetch_row();
									$bike1price=$rowbike1[3];

									$querybike2="SELECT * FROM bike WHERE BikeID=$bike2" ; //query
									$resultbike2=$db->query($querybike2);
									$num_rowsbike2=$resultbike2->num_rows;
									$rowbike2=$resultbike2->fetch_row();
									$bike2price=$rowbike2[3];

									$querybike3="SELECT * FROM bike WHERE BikeID=$bike3" ; //query
									$resultbike3=$db->query($querybike3);
									$num_rowsbike3=$resultbike3->num_rows;
									$rowbike3=$resultbike3->fetch_row();
									$bike3price=$rowbike3[3];


									$querybike4="SELECT * FROM bike WHERE BikeID=$bike4" ; //query
									$resultbike4=$db->query($querybike4);
									$num_rowsbike4=$resultbike4->num_rows;
									$rowbike4=$resultbike4->fetch_row();
									$bike4price=$rowbike4[3];

									$querybike5="SELECT * FROM bike WHERE BikeID=$bike5" ; //query
									$resultbike5=$db->query($querybike5);
									$num_rowsbike5=$resultbike5->num_rows;
									$rowbike5=$resultbike5->fetch_row();
									$bike5price=$rowbike5[3];




								?>
								<div class="div_2" style="font-size:12px"><a href=""><?php echo"Nrs. $bike1price" ?></a></div>
								<div class="div_img">
							<?php
							echo "

									<img src='bike_image/$bike1.jpg' alt='BikeFinder' title='Bike' width='60' height='39'>
							";?>
								</div><div class="clear"></div>
							</div>
							<div class="first-list">
								<div class="div_2" style="font-size:12px" ><a href=""><?php echo"Nrs. $bike2price" ?></a></div>
								<div class="div_img">
							<?php
							echo "

									<img src='bike_image/$bike2.jpg' alt='BikeFinder' title='Bike' width='60' height='39'>
							";?>								</div><div class="clear"></div>
							</div>
							<div class="first-list">
								<div class="div_2" style="font-size:12px"><a href=""><?php echo"Nrs. $bike3price" ?></a></div>
								<div class="div_img">

							<?php
							echo "

									<img src='bike_image/$bike3.jpg' alt='BikeFinder' title='Bike' width='60' height='39'>
							";?>								</div><div class="clear"></div>
							</div>
							<div class="first-list">
								<div class="div_2" style="font-size:12px"><a href=""><?php echo"Nrs. $bike4price"?></a></div>
								<div class="div_img">
								<?php
							echo "

									<img src='bike_image/$bike4.jpg' alt='BikeFinder' title='Bike' width='60' height='39'>
							";?>								</div><div class="clear"></div>
							</div>

							<div class="first-list">
								<div class="div_2" style="font-size:12px"><a href=""><?php echo"Nrs. $bike5price" ?></a></div>
								<div class="div_img">

							<?php
							echo "

									<img src='bike_image/$bike5.jpg' alt='BikeFinder' title='Bike' width='60' height='39'>
							";?>								</div><div class="clear"></div>
							</div>
				</div>
						<div class="footer-bottom">
			<div class="copy">


			<div class="header-bottom-login">
				 <div class="header_bottom_right_images">
 					<div class="contact-form">
						<a name="login"></a> 
				  	<h3>Login</h3>
					    <form method="post" method="post" name="login" action="">
					    	
						    <div>
						    	<span><label>E-MAIL <?php
															$formError=0;
															if(isset($_POST['login'])) {
															$email=$_POST['email'];
															$email=strtolower($email);
															$query="SELECT * FROM user WHERE email = '$email'"; //query
															$result=$db->query($query);
															$num_rows=$result->num_rows;
															
															if($num_rows!=1)
															{
															echo "<span id='notvalid'> Not registered, <a href='register.php' style='text-decoration:none';>Register?</a></span>";	
																	$formError++;
															}
														else if($email=="")
															{
																echo "<span id='notvalid'>*</span>";
																$formError++;
															}
															else
															{
																for($i=0;$i<$num_rows;$i++)
																{
																$row=$result->fetch_row();
																}
																$dbPassword=$row[4];
																$confirm=1;
															
															}
															} 
															?>
															<?php
															?>
														</label></span>
						    	<span><input name="email" type="email" class="textbox" required></span>
						    </div>
						    <div>
						     	<span><label>Password
											<?php
											if(isset($_POST['login'])) 
											{
												$password=$_POST['password'];
												 $encrypted = encryptIt($password);
																	
												if($password=="")
													{
														echo "<span id='notvalid'>This field cannot be empty</span>";
													$formError++;
													}
																

													else if($num_rows==1){
													if($dbPassword!=$encrypted)	
																
														{
															echo "<span id='notvalid'> Incorrect password,<a href='recover1.php' style='text-decoration:none';>Reset?</a></span>";
															$formError++;
														}
														else $confirm++;
														}
												}
															?>
						     	</label></span>
						    	<span><input name="password" class="textbox" type="password"required ></span>
						    </div>
						  
						    <div>
						     	<span><label>
									<input type="checkbox" name="rememberme" value="1"> Remember?
						     	</label></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="login" value="Login"></span>
						  </div>
					    </form>
				  </div>
			</div>
		</div>





		</div>
</div>

				<div class="clear"></div>
				</div>
	</div>
		<div class="clear"></div>

<?php

if($formError==0){
if($confirm==2)
{
$_SESSION['email']=$email;
echo"<script>window.location.href='home.php';</script>";
}
}
?> 

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

    	
    	
            