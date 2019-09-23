<?php
	include_once 'header.php';
	if(isset($_SESSION['userid']) && isset($_SESSION['email'])){
		if(isset($_GET['post_id'])){
			$pid = $_GET['post_id'];
			$_SESSION['pid'] = $pid;
			$row = $obj->getdata('newpost','*','post_id',$pid);
			$img = $obj->getdata('postimage','image_path','post_id',$pid);
			echo '<div class="container">
			<!-- My Post Details -->
			<div class="row">
				<div class="col-md-5 px-1">
					<div class="postImageBody">';
						if(empty($img)) {
							echo '<i class="far fa-images fa-10x posticon"></i>';
						} else {
							echo '<img src='.$img['image_path'].' class="img-fluid mb-2" style="max-height:300px" width="100%">';
						}
						
						echo '<div class="row mx-0">
							<div class="col-3 px-1"><img src="img/slider_1.jpg" class="img-fluid"></div>
							<div class="col-3 px-1"><img src="img/slider_2.jpg" class="img-fluid"></div>
							<div class="col-3 px-1"><img src="img/slider_3.jpg" class="img-fluid"></div>
							<div class="col-3 px-1"><img src="img/slider_1.jpg" class="img-fluid"></div>
						</div>
					</div>
				</div>
				<div class="col-md-7 px-1">
					<div class="postBody">
						<div class="row">
							<div class="col-md-8">
								<h3 class="posttitle">'.$row['post_title'].'<a class="editbtn" data-toggle="modal" data-target="#etitle"> Edit</a></h3>
								<p>'.$row['post_time'].'</p>
								<h5>Details of House/Room/Store</h5>
							</div>
							<p class="col-md-4 rent">Rent Amount<a class="editbtn" data-toggle="modal" data-target="#rprice"> Edit</a><br>৳'.$row['post_rent'].'</p>
						</div><hr>
						<table class="table table-hover mptborder">
						  	<tbody>
						  		<tr>
							      	<td><div><i class="far fa-building fa-fw"></i> Ads For</div></td>
							      	<td colspan="2">'.$row['post_type_of_Rent'].'</td>
							      	<td><a href="#" data-toggle="modal" data-target="#tOFr">Edit</a></td>
						    	</tr>
								<tr>
							      	<td><div><i class="fab fa-connectdevelop fa-fw"></i> Area Type</div></td>
							      	<td colspan="2">'.$row['post_p_type'].'</td>
							      	<td><a href="#" data-toggle="modal" data-target="#pType">Edit</a></td>
						    	</tr>
								<tr>
							      	<td><div><i class="fab fa-laravel fa-fw"></i> Room Size</div></td>
							      	<td colspan="2">'.$row['post_size'].'sqt</td>
							      	<td><a href="#" data-toggle="modal" data-target="#sizeofp">Edit</a></td>
						    	</tr>
								<tr>
							      	<td><div><i class="fas fa-check fa-fw"></i> Rental Terms</div></td>
							      	<td colspan="2">
							      		<ul class="mb-0">
											<li class="mt-3 mb-1"><i class="fas fa-genderless fa-fw"></i> Religion - '.$row['post_religion'].'</li>
											<li><i class="fas fa-genderless fa-fw"></i> People Type - '.$row['post_allowed_people'].'</li>
										</ul>
							      	</td>
							      	<td><a href="#" data-toggle="modal" data-target="#rentTerm">Edit</a></td>
						    	</tr>
						    	<tr>
							      	<td><div><i class="fas fa-smile fa-fw"></i> Facilities</div></td>
							      	<td colspan="2">
							      		<ul class="mb-0">';
											if($row['post_f1'] == 'yes'){ echo '<li class="mb-1"><i class="fas fa-arrow-right fa-fw"></i> 24 Hours Water</li>';}
											if($row['post_f2'] == 'yes'){ echo '<li class="mb-1"><i class="fas fa-arrow-right fa-fw"></i> 24 Hours Electricity</li>';}
											if($row['post_f3'] == 'yes'){ echo '<li class="mb-1"><i class="fas fa-arrow-right fa-fw"></i> Attached Bath</li>';}
											if($row['post_f4'] == 'yes'){ echo '<li class="mb-1"><i class="fas fa-arrow-right fa-fw"></i> Balcony</li>';}
											if($row['post_f5'] == 'yes'){ echo '<li class="mb-1"><i class="fas fa-arrow-right fa-fw"></i> Wifi 24 Hours</li>';}
											if($row['post_f6'] == 'yes'){ echo '<li class="mb-1"><i class="fas fa-arrow-right fa-fw"></i> Fully Tiled</li>';}
											if($row['post_f7'] == 'yes'){ echo'<li class="mb-1"><i class="fas fa-arrow-right fa-fw"></i> Non Tiles</li>';}
											if($row['post_f8'] == 'yes'){ echo '<li class="mb-1"><i class="fas fa-arrow-right fa-fw"></i> Food Facility</li>';}
											if($row['post_f9'] == 'yes'){ echo '<li><i class="fas fa-arrow-right fa-fw"></i> Pure Drinking Water</li>';}
										echo '</ul>
							      	</td>
							      	<td><a href="#" data-toggle="modal" data-target="#facility">Edit</a></td>
						    	</tr>
						  	</tbody>
						</table>
						<div class="list-group mb-2" id="list-tab" role="tablist">
						    <a class="btn btn-primary active mb-sm-2 ml-2" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Description</a>
						    <a class="btn btn-primary mb-sm-2 ml-2" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Contact Info</a>
						</div>
						<div class="col-12">
						    <div class="tab-content" id="nav-tabContent">
							    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
							      	<p class="posttitle">'.$row['post_description'].'<a class="editbtn" data-toggle="modal" data-target="#ediscrip"> Edit</a></p>
							    </div>
						      	<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
						      		<table class="table contable">
						      			<tbody>
									  		<tr>
										      	<td><div><i class="fas fa-user fa-fw"></i> Name</div></td>
										      	<td colspan="2"> '.$row['post_owner_name'].'</td>
										      	<td><a href="#" data-toggle="modal" data-target="#eOname">Edit</a></td>
									    	</tr>
											<tr>
										      	<td><div><i class="fas fa-mobile fa-fw"></i> Phone Number</div></td>
										      	<td colspan="2">0'.$row['post_phone_number'].'</td>
										      	<td><a href="#" data-toggle="modal" data-target="#ephone">Edit</a></td>
									    	</tr>
											<tr>
										      	<td><div><i class="fas fa-map-marker fa-fw"></i> Address</div></td>
										      	<td colspan="2">'.$row['post_address'].', '.$row['post_area'].', '.$row['post_thana'].'<br>'.$row['post_district'].'</td>
										      	<td><a href="#" data-toggle="modal" data-target="#eaddress">Edit</a></td>
									    	</tr>
									  	</tbody>
						      		</table>
						      	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Adding -->';
	}
		include_once 'footer.php';
	} else {
		header("Location: index.php");
		exit();
	}
?>