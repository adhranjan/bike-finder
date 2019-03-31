<?php   
 include("Include/config.php"); //include the config
 include 'Include/errorrremover.php';
 include 'Include/session.php';
 include 'Include/currentuser.php';
 
 if(!isset($_SESSION['email'])){ //redirect to index if logged in
   header("location: index.php"); 
   exit();
}
?>

<?php
if( $_GET["q"])
{
		$searchName= $_GET['q'] ;
		$searchName=ucfirst ($searchName);
}
?>
								
<style>

  .img-thumbnail
{
	height: 120px !important;
	width:200px !important;
}

.notvalid
	{
		color: #D8000C;
	}

</style>

<!DOCTYPE HTML>
<html>
<head>
<title>Search <?php echo "$searchName"?>: Bike Finder</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>   
<!--slider-->
<script src="js/search.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/superfish.js"></script>
<script>
function autoSubmit(){
    var formObject = document.forms['choice_form'];
    formObject.submit();
}
</script>
</head>
<body>


	<?php
	if($userType!=0)
	{
		echo"
			<div class='search'>
			   <div id='sb-search' class='sb-search'>
				  <form method='get' action='search.php'>
					 <input class='sb-search-input' placeholder='Enter your search term...' name='q' type='search' id='search'>
					 <input type='submit' class='sb-search-submit'   value=''>
					 <span class='sb-icon-search'> </span>
				  </form>
			    </div>
			   </div>

			 <script src='js/classie.js'></script>
			 <script src='js/uisearch.js'></script>
				   <script>
					 new UISearch( document.getElementById( 'sb-search' ) );
				   </script>
	";}

	  ?>

<div class="header-bg">
	<div class="wrap"> 
		<div class="h-bg">
			<div class="total">
				<div class="header">
					<div class="box_header_user_menu">
						<ul class="user_menu"><li class=""><li class="last" position="right" ><a href=""><div class="button-t"><span class="logout"><a href="logout.php">Log Out</a></span></div></a></li><li><a href=""><div class="button-t"><span><?php echo "$fname $lname"?></span></div></a></li>
							</ul>
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
						<li><a href="home.php">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="specials.html">Specials</a></li>
						<li><a href="new.html">New</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
					<div class="clear"></div> 
				</div>
		</div>
		<div class="banner-top">
			<div class="header-bottom">
				 <div class="header_bottom_right_images">
				 					<?php
									$value = 'date';
									if(isset($_POST['choice']))
									 {
										$value = $_POST['choice'];
									}
										?>


<form name="choice_form" id="choice_form" method="post">
   Order By:
        <input type="radio" name="choice" <?php if ($value == 'date') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="date"> Uploaded Date
     
        <input type="radio" name="choice" <?php if ($value == 'price') { ?>checked='checked'<?php } ?> onChange="autoSubmit();" value="price"> Price
     	
     	 <input type="radio" name="choice" <?php if ($value == 'stockRem') { ?> checked='checked'<?php } ?> onChange="autoSubmit();" value="stockRem"> Number of Availabe bikes
     
</form>






					  			<div class="content-wrapper">		  
						<div class="content-top">
							  	<div class="box_wrapper"><h1>
							  		<?php 
							
										   if($value=='date')
										   {
										   echo "New First" ;
										   }
										   else if($value=='price')
										   {
										   echo "Economical First" ;
										   }
										   else if ($value=='stockRem')
										   {
										   echo "Least Availabe First" ;
										   }
										  
										?>


							  		</h1>
								</div>
								<div class="text">
								</div>
							 	<?php
							 	if($value==date){
								$query="SELECT * FROM bike b  inner join user u on u.userID= b.userID WHERE  (((genericName LIKE '%$searchName%') OR  (bikeName LIKE '%$searchName%')  OR  (bikePrice LIKE '%$searchName%')  OR  (fname LIKE '%$searchName%')  OR  (lname LIKE '%$searchName%')OR  (Address LIKE '%$searchName%'))  AND (ItemRemaining>0)) AND bikeVisibility=1 ORDER BY BikeID DESC " ; 
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
									$bikeResult++;


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
					if ($bikeResult==0) {
										echo "
							<div class='box_wrapper'>
							<h1>
								<span class='notvalid'>No result for <b style='text-transform: uppercase'>$searchName</b> found. Try again with another Keyword.</span>
								</h1>
							</div>
						</div>						
					";}

								}


							 else if($value==price){
								$query="SELECT * FROM bike b  inner join user u on u.userID= b.userID WHERE  (((genericName LIKE '%$searchName%') OR  (bikeName LIKE '%$searchName%')  OR  (bikePrice LIKE '%$searchName%')  OR  (fname LIKE '%$searchName%')  OR  (lname LIKE '%$searchName%')OR  (Address LIKE '%$searchName%'))  AND (ItemRemaining>0)) AND bikeVisibility=1 ORDER BY bikePrice ASC " ; 
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
									$bikeResult++;


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
								if ($bikeResult==0) {
										echo "
							<div class='box_wrapper'>
							<h1>
								<span class='notvalid'>No result for <b style='text-transform: uppercase'>$searchName</b> found. Try again with another Keyword.</span>
								</h1>
							</div>
						</div>									";}

								}
								if($value==stockRem){
								$query="SELECT * FROM bike b  inner join user u on u.userID= b.userID WHERE  (((genericName LIKE '%$searchName%') OR  (bikeName LIKE '%$searchName%')  OR  (bikePrice LIKE '%$searchName%')  OR  (fname LIKE '%$searchName%')  OR  (lname LIKE '%$searchName%')OR  (Address LIKE '%$searchName%'))  AND (ItemRemaining>0)) AND bikeVisibility=1 ORDER BY ItemRemaining ASC LIMIT 6" ; //query
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
									$bikeResult++;
	

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
									if ($bikeResult==0) {
										echo "
							<div class='box_wrapper'>
							<h1>
								<span class='notvalid'>No stocks for <b style='text-transform: uppercase'>$searchName</b> found. Try again with another Keyword.</span>
								</h1>
							</div>
						</div>									";}
								}


									?>
									<div class='clear'></div>
									
									<div class="clear"></div>
								</div>
						</div>

				</div>
		</div>
	</div>
</div>

		<div class="header-para">
				<div class="categories">
						<div class="list-categories">
							<div class="first-list">
								<?php
								$query="SELECT * FROM bike" ; //query
									$result=$db->query($query);
									$num_rows=$result->num_rows;		
									$bike1=rand(1,$num_rows);
									$bike2=rand(1,$num_rows);
									$bike3=rand(1,$num_rows);
									if($bike1==$bike2 || $bike3)
									{
										$bike1=rand(1,$num_rows);

									}

									if($bike2==$bike1 || $bike3)
									{
										$bike2=rand(1,$num_rows);

									}
									if($bike3==$bike1 || $bike2)
									{
										$bike3=rand(1,$num_rows);

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

				</div>
				
				<div class="box-title">
					<h1><span class="title-icon"></span><a href="">New Sellers' Product</a></h1>
				</div>

				<div class="section group example">
						<?php
						$query="SELECT * FROM bike WHERE  (ItemRemaining>=1&& ItemRemaining<=3) AND bikeVisibility=1  ORDER BY UserID ASC LIMIT 4" ; 
						$result=$db->query($query);
						while ( $row = mysqli_fetch_array($result, MYSQL_BOTH)) {
						$bikeID=$row[0];
						echo "
					<div class='col_1_of_2 span_1_of_2'>

					<img src='bike_image/$bikeID.jpg' alt=''/ width='120' height='80'>
						</div>";
						}

				?>
					 
	 				
				<div class="clear"></div>
		   		 </div>
				<div class="clear"></div>
				</div>
	</div>
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
</div>
</div>
</div>
</div>
</body>
</html>

    	
    	
            