<?php
	include_once 'header.php';
	$select = "post_id, post_title, post_owner_name, post_rent, post_description, post_time";
	$data = $obj->getlimitdata('newpost', $select, 'user_id' , $_SESSION['userid']);
	$row = sizeof($data);
?>
<div class="container">
	<!-- My Post Part -->
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
		    		<div class="px-3 pfdiv1">
		    			<a href="mypost_details.php?post_id='.$data[$i][0].'" class="d-block c-3 pfd">Details</a>
		    		</div>
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
		    		<div class="px-3 pfdiv1">
		    			<a href="mypost_details.php?post_id='.$data[$i][0].'" class="d-block c-3 pfd">Details</a>
		    		</div>
		    	</div>
			</div>';
			}
		}
	?>
</div>
<!-- Footer Part Add -->
<?php include_once 'footer.php'; ?>