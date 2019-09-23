<?php
	include_once 'header.php';
	if(isset($_SESSION['userid']) && isset($_SESSION['email'])) {
		$cAddress = $data['user_caddress'].', '.$data['user_carea'].', '.$data['user_cthana'].', '.$data['user_cdistrict'].' - '.$data['user_czip'];
		$pAddress = $data['user_paddress'].', '.$data['user_parea'].', '.$data['user_pthana'].', '.$data['user_pdistrict'].' - '.$data['user_pzip'];

		echo '
		<!-- Profile Start From Here -->
		<div class="container mt-2">
			<div class="user_profile">
				<div class="row">
					<div class="col-md-4 mb-3">
						<div class="pro_pic">';
						if(empty($data['user_image'])){
							echo '<i class="fas fa-user fa-10x icon_pro"></i>';
						} else {
							echo '<img src='.$data['user_image'].' class="img-fluid">';
						} echo '<div class="pro_pic_edit">
								<a href="#" data-toggle="modal" data-target="#proImg"><i class="fas fa-camera fa-3x"></i><p>Upload New</p></a>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="pro_detail">
							<div class="row justify-content-between">
								<div>
									<h2 class="ml-4">'.$data['user_fname'].' '.$data['user_lname'].'</h2>
									<div><i class="fab fa-buromobelexperte fa-fw"></i> Respected member of the Bari-Bhara.com </div>
								</div>
								<div class="status">
									<p>Total Post: '.$obj->countrow('newpost', 'post_id', 'user_id' , $_SESSION['userid']).'</p>
									<a href="mypost.php">My All Post</a>
								</div>
							</div>
							<hr>
							<table class="table table-hover table-dark">
							  	<tbody>
							  		<tr>
								      	<td><div><i class="fas fa-universal-access fa-fw"></i> Name</div></td>
								      	<td colspan="2">'.$data['user_fname'].' '.$data['user_lname'].'</td>
								      	<td><a href="#" data-toggle="modal" data-target="#name">Edit</a></td>
							    	</tr>
									<tr>
								      	<td><div><i class="fas fa-user-md fa-fw"></i> Occupation</div></td>
								      	<td colspan="2">'.$data['user_job'].'</td>
								      	<td><a href="#" data-toggle="modal" data-target="#job">';if(empty($data['user_job'])){ echo "ADD"; }else{ echo "Edit"; }echo '</a></td>
							    	</tr>
									<tr>
								      	<td><div><i class="far fa-envelope-open fa-fw"></i> E-mail</div></td>
								      	<td colspan="2">'.$data['user_email'].'</td>
								      	<td><a href="#" data-toggle="modal" data-target="#email">Edit</a></td>
							    	</tr>
									<tr>
								      	<td><div><i class="fas fa-phone fa-fw"></i> Phone Number</div></td>
								      	<td colspan="2">'.$data['user_phone'].'</td>
								      	<td><a href="#" data-toggle="modal" data-target="#phone">';if(empty($data['user_phone'])){ echo "ADD"; }else{ echo "Edit"; }echo '</a></td>
							    	</tr>
							    	<tr>
								      	<td><div><i class="fas fa-genderless fa-fw"></i> Gender</div></td>
								      	<td colspan="2">'.$data['user_gender'].'</td>
								      	<td><a href="#" data-toggle="modal" data-target="#gender">';if(empty($data['user_gender'])){ echo "ADD"; }else{ echo "Edit"; }echo '</a></td>
							    	</tr>
									<tr>
								      	<td><div><i class="fas fa-birthday-cake fa-fw"></i> Date of Birth</div></td>
								      	<td colspan="2">'.$data['user_dob'].'</td>
								      	<td><a href="#" data-toggle="modal" data-target="#dob">';if(empty($data['user_dob'])){ echo "ADD"; } else { echo "Edit"; }echo '</a></td>
							    	</tr>
									<tr>
								      	<td><div><i class="fas fa-location-arrow fa-fw"></i> Current Address</div></td>
								      	<td colspan="2">'.$cAddress.'</td>
								      	<td><a href="#" data-toggle="modal" data-target="#cAddress">';if(empty($data['user_caddress']) && empty($data['user_cdistrict'])){ echo "ADD"; }else{ echo "Edit"; }echo '</a></td>
							    	</tr>
							    	<tr>
								      	<td><div><i class="fas fa-map-marker fa-fw"></i> Permanent Address</div></td>
								      	<td colspan="2">'.$pAddress.'</td>
								      	<td><a href="#" data-toggle="modal" data-target="#pAddress">';if(empty($data['user_paddress']) && empty($data['user_pdistrict'])){ echo "ADD"; }else{ echo "Edit"; }echo '</a></td>
							    	</tr>
							  	</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Profile End Here -->';

	// Footer Add Part
	include_once 'footer.php';
	}else {
		echo '<h1>Page Not Found!</h1>';
	}
?>
