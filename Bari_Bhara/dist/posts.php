<?php
	include_once 'header.php';
	$select = "post_id, post_title, post_owner_name, post_rent, post_description, post_time";
	$data = $obj->getAlldata('newpost', $select);
	$row = sizeof($data);
?>
<div class="container">
	<section id="BodyPart">
		<div class="row">
			<!-- Specific Search Part-->
			<div class="col-md-4 col-lg-3 mb-2">
				<div class="menuPart">
					<h3>Find Your Place</h3>
					<form>
						<div class="input-group mb-3">
							<select class="custom-select" id="inputGroupSelect121">
						  		<option selected>Choose...</option>
						  		<option value="Dhaka">Dhaka</option>
							</select>
							<div class="input-group-append">
						  		<label class="input-group-text" for="inputGroupSelect121">City</label>
							</div>
						</div>
						<div class="input-group mb-3">
							<select class="custom-select" id="inputGroupSelect103">
						  		<option selected>Choose...</option>
						  		<option value="">নির্বাচন করুন</option>
						  		<option value="2602">আদাবর</option>
						  		<option value="2604">বাড্ডা</option>
						  		<option value="2606">বিমান বন্দর</option>
							</select>
							<div class="input-group-append">
						  		<label class="input-group-text" for="inputGroupSelect101">Upazila</label>
							</div>
						</div>
						<div class="input-group mb-3">
							<select class="custom-select" id="inputGroupSelect105">
						  		<option selected>Choose...</option>
						  		<option value="1">One</option>
						  		<option value="2">Two</option>
						  		<option value="3">Three</option>
							</select>
							<div class="input-group-append">
						  		<label class="input-group-text" for="inputGroupSelect105">Area</label>
							</div>
						</div>
						<div class="input-group mb-3">
							<select class="custom-select" id="inputGroupSelect107">
						  		<option selected>Choose...</option>
						  		<option value="Flat">Flat</option>
						  		<option value="Room">Room</option>
						  		<option value="Student Room">Student Room(Mass)</option>
						  		<option value="Store">Store</option>
							</select>
							<div class="input-group-append">
						  		<label class="input-group-text" for="inputGroupSelect107">House Type</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Search</button>
					</form>
				</div>
			</div>
			<!-- After Search Part -->
			<div class="col-md-8 col-lg-9 mb-5">
				<?php
					for($i = $row-1; $i>=0; $i--) {
						$pid = $data[$i][0];
						$img = $obj->getdata('postimage','image_path','post_id',$pid);
						if($i%2 != 0) {
							echo '<div class="houseDetailCon2">
							<div class="row m-0">';
								if(empty($img)) {
										echo '<div class="col-sm-4 col-md-4 col-lg-2 c-4 pr-2 pl-0 pb-1 text-center"><i class="far fa-images fa-6x posticon"></i></div>';
									} else {
										echo '<div class="col-sm-4 col-md-4 col-lg-2 pr-2 pl-0 pb-1"><img src='.$img['image_path'].' class="img-fluid mb-2" style="max-height:100px" width="100%"></div>';
									}
					    		echo '<div class="col-sm-8 col-md-8 col-lg-10 m-0 mb-sm-2 px-0 pt-0 row justify-content-between">
					    			<div>
					    				<h3 class="m-0 c-5">'.$data[$i][1].'</h3>
					    				<p class="mb-0"><i class="fas fa-location-arrow"></i> '.$data[$i][5].'</p>
					    				<p class="small"><i class="fas fa-user"></i> Posted by '.$data[$i][2].'</p>
					    			</div>
					    			<div class="productprice mb-3">
							    		<p class="c-5">'.$data[$i][3].' taka</p>
							    	</div>
					    		</div>
					      		<p class="px-2 pbd mb-3">'.$data[$i][4].'</p>
					    	</div>
					    	<div class="postfooter d-flex justify-content-between">
					    		<div></div>
					    		<div class="px-3 pfdiv1">';
					    			if(isset($_SESSION['userid']) && isset($_SESSION['email'])){
					    				echo '<a href="post_details.php?post_id='.$data[$i][0].'" class="d-block c-3 pfd">Details</a>';
					    			} else {
					    				echo '<a href="#" class="d-block c-3 pfd" data-toggle="modal" data-target="#register">Details</a>';
					    			}
					    		echo '</div>
					    	</div>
						</div>';
						} else {
							echo '<div class="houseDetailCon2">
							<div class="row m-0">';
								if(empty($img)) {
										echo '<div class="col-sm-4 col-md-4 col-lg-2 c-4 pr-2 pl-0 pb-1 text-center"><i class="far fa-images fa-6x posticon"></i></div>';
									} else {
										echo '<div class="col-sm-4 col-md-4 col-lg-2 pr-2 pl-0 pb-1"><img src='.$img['image_path'].' class="img-fluid mb-2" style="max-height:100px" width="100%"></div>';
									}
					    		echo '<div class="col-sm-8 col-md-8 col-lg-10 m-0 mb-sm-2 px-0 pt-0 row justify-content-between">
					    			<div>
					    				<h3 class="m-0 c-5">'.$data[$i][1].'</h3>
					    				<p class="mb-0"><i class="fas fa-location-arrow"></i> '.$data[$i][5].'</p>
					    				<p class="small"><i class="fas fa-user"></i> Posted by '.$data[$i][2].'</p>
					    			</div>
					    			<div class="productprice mb-3">
							    		<p class="c-5">'.$data[$i][3].' taka</p>
							    	</div>
					    		</div>
					      		<p class="px-2 pbd mb-3">'.$data[$i][4].'</p>
					    	</div>
					    	<div class="postfooter d-flex justify-content-between">
					    		<div></div>
					    		<div class="px-3 pfdiv1">';
					    			if(isset($_SESSION['userid']) && isset($_SESSION['email'])){
					    				echo '<a href="post_details.php?post_id='.$data[$i][0].'" class="d-block c-3 pfd">Details</a>';
					    			} else {
					    				echo '<a href="#" class="d-block c-3 pfd" data-toggle="modal" data-target="#register">Details</a>';
					    			}
					    		echo '</div>
					    	</div>
						</div>';
						}
					}
				?>
			</div>
		</div>
	</section>
</div>
<!-- Footer Part Add -->
<?php include_once 'footer.php'; ?>