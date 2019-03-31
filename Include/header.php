<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="index.php">
									<?php 
										if($userType==1)
											{
												echo "Bike Seller <b>$fname</b>";
											}
										else if($userType==2) {echo "Bike Buyer <b>$fname</b>" ;}							
										else echo "Admin <b>$fname</b>" ;
									?>
									</a>
								</li>
								<?php
								if($userType==0)
									{
										echo"
											<li>								
												<a href='index.php'><img src='Images/pending.png'  width=25px height=20px>";
									}
									else if($userType==1)
									{
										echo"
											<li>								
												<a href='orderview.php'><img src='Images/newOrder.png'  width=30px height=20px>";
									}
								?>
								<?php
									if($userType==0)
										{
											if($count!=0)
												{
													echo "
														<span id='mailcount'>$count</span>";
												}
										}
										else if($userType==1)
											{
												if($bikeorder!=0){


												echo "<span id='mailcount'>$bikeorder</span>";
												}
											}



								?>
												</a>
											</li>
								<?php
									if($userType==0)
										{
											echo"
												<li>
													<a href='index.php'><img src='Images/msg.png'  width=20px height=20px>";}?>
									<?php
									if($userType==0)
										{
										if ($mailcount!=0)
											{
												echo"<span id='mailcount'>$mailcount</span>";
											}
										}
									?>
													</a>
												</li>
									<?php
										if($userType==0)
										{
										echo"
								<li>
								<a href='index.php'><img src='Images/upload.png'  width=20px height=20px>";}?>
									<?php
									if($userType==0){
									if ($bikeCount!=0){
										echo"<span id='mailcount'>$bikeCount</span>";
									}}?>
									</a>
								</li>
							</ul>
						

					<?php 
				// disabling search for admin and unverified
							if($userType==2 ){
								echo'
							<form class="navbar-form navbar-left" action="search.php" method="get" role="search">
								<div class="form-group">
									<input type="text" class="form-control" name="q">
								</div> 
								<button type="submit" class="btn btn-default">
									Search
								</button>
							</form>
							';
							}
							?>
							<ul class="nav navbar-nav navbar-right">
								
								<li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										
										<li>
											<a href="contact.php">Contact Us</a>
										</li>
										<?php
										if($userType==0)
											if($adminType==1){
										{echo '

										<li>
											<a href="admin.php">Admin Log</a>
										</li>
										';}}
										?>
										<li>
											<a href="passwordchange.php">Change Password</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="logout.php">Logout
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						
					</nav>
				</div>
			</div>	
		</div>
	</div>
</div>	
	<br><br><br>