<?php
	session_start(); ob_start();
	if(isset($_GET['logout'])) {
		session_destroy();
		header('Location: index.php');
		ob_end_flush();
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Welcome To Bari Bhara Site</title>
		<link rel="shortcart icon" type="image/png" href="img/logo.png" />
		<!-- Bootstrap Link -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Fontawsome Link -->
		<link rel="stylesheet" href="css/fa-svg-with-js.css" />
		<!-- Google Font Link -->
		<link href="https://fonts.googleapis.com/css?family=Amaranth|Kanit|Limelight|Paprika" rel="stylesheet">
		<!-- Custom CSS Link -->
		<link rel="stylesheet" href="css/style.css" />
	</head>
<body id="backSlider">
	<!--Header Section Start From Here-->
	<header>
		<div class="container">
			<div class="row">
				<!-- Header Band Logo Part -->
				<div class="col-md-6 col-sm-5 col-lg-8 col-4">
					<a href="index.php">
						<div class="brandImg">
							<img src="img/logo.png">
						</div>
						<div class="brandTitle">
							<h1>Bari Bhara</h1>
							<p>Now This Site Under-Constraction</p>
						</div>
					</a>
				</div>
				<!-- User Part -->
				<div class="col-md-6 col-sm-7 col-lg-4 col-8">
					<div class="userpart">
						<?php
							// Modal Adding
							include_once 'modal.html';
							require_once 'func/get.inc.php';
							$obj = new getinfo();
							if(isset($_SESSION['userid']) && isset($_SESSION['email'])){
								$data = $obj->getdata('user_login','*','user_id',$_SESSION['userid']);
								if($data['user_image'] == null){
									echo '<ul class="profile fa-ul my-2">
										<li class="plist">
											<span class="fa-li">
												<i class="fas fa-user fa-1x"></i>
											</span>'.$data['user_fname'].' '.$data['user_lname'].'
										</li>
										<div class="userMenu">
											<ul class="fa-ul"><li class="userMenuItem"><a href="profile.php"><span class="fa-li"><i class="fas fa-user"></i></span>My Profile</a></li></ul>
											<ul class="fa-ul"><li class="userMenuItem"><a href="mypost.php"><span class="fa-li"><i class="fas fa-check-square"></i></span>My Posts</a></li></ul>
											<ul class="fa-ul"><li class="userMenuItem"><a href="#"><span class="fa-li"><i class="fas fa-check-square"></i></span>Others</a></li></ul>
											<ul class="fa-ul"><li class="userMenuItem"><a href="index.php?logout"><span class="fa-li"><i class="fas fa-power-off"></i></span>Log Out</a></li></ul>
										</ul>
									</div>';
								} else {
								echo '<ul class="profile">
									<li class="mt-c plist">'.$data['user_fname'].' '.$data['user_lname'].'</li>
									<li class="plist"><img src="'.$data['user_image'].'" class="profileImg" height="40" width="40"></li>
									<div class="userMenu">
										<ul class="fa-ul"><li class="userMenuItem"><a href="profile.php"><span class="fa-li"><i class="fas fa-user"></i></span>My Profile</a></li></ul>
										<ul class="fa-ul"><li class="userMenuItem"><a href="mypost.php"><span class="fa-li"><i class="fas fa-check-square"></i></span>My Posts</a></li></ul>
										<ul class="fa-ul"><li class="userMenuItem"><a href="#"><span class="fa-li"><i class="fas fa-check-square"></i></span>Others</a></li></ul>
										<ul class="fa-ul"><li class="userMenuItem"><a href="index.php?logout"><span class="fa-li"><i class="fas fa-power-off"></i></span>Log Out</a></li></ul>
										</ul>
									</div>';
								}
							}else{
								echo '<ul class = "menu_list">
									<li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
									<li><a href="#" data-toggle="modal" data-target="#register">SignUp</a></li>
								</ul>';
							}
						?>
						<form class="search">
							<input type="text" name="search">
							<button type="submit">Search</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Nav Start From Here-->
	<div class="navCustom">
	  	<nav class="navbar navbar-expand-lg navbar-light">
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav nav-center">
		      		<li class="nav-item active">
		        		<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="posts.php">All Posts <span class="sr-only">(current)</span></a>
		      		</li>
		      		<?php
						if(isset($_SESSION['userid']) && isset($_SESSION['email'])){
							echo '<li class="nav-item">
				        			<a class="nav-link" href="#" data-toggle="modal" data-target=".bd-example-modal-lg">New Post</a>
				      			</li>';
						}
					?>
					<li class="nav-item">
		        		<a class="nav-link" href="#">About Us <span class="sr-only">(current)</span></a>
		      		</li><li class="nav-item">
		        		<a class="nav-link" href="#">Contact<span class="sr-only">(current)</span></a>
		      		</li>
			    </ul>
		  	</div>
	  	</nav>
	</div>
	<!-- Nav End Here-->