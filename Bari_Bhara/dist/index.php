<?php
	include_once 'header.php';
?>
<!-- BodyPart Start From Here-->
<section id="BodyPart">
	<div class="container">
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
			<!-- Box Slider Part -->
			<div class="col-md-8 col-lg-9 mb-5">
				<div class="row">
					<div class="col-md-6 col-lg-4 slideBox">
						<div class="boxItem">
							<i class="fa fa-search fa-5x"></i>
						</div>
						<div class="boxItem-2">
							<h3>find your favourite area.</h3>
						</div>
						<div class="boxItem-3">
							<i class="fa fa-thumbs-up fa-5x"></i>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 slideBox">
						<div class="boxItem">
							<i class="fa fa-university fa-5x"></i>
						</div>
						<div class="boxItem-2">
							<h3>Choose your house and rent it.</h3>
						</div>
						<div class="boxItem-3">
							<i class="fa fa-smile fa-5x"></i>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 slideBox">
						<div class="boxItem">
							<i class="fab fa-rendact fa-5x"></i>
						</div>
						<div class="boxItem-2">
							<h3>Do you want to rent your house?</h3>
						</div>
						<div class="boxItem-3">
							<i class="fa fa-thumbs-up fa-5x"></i>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 slideBox">
						<div class="boxItem">
							<i class="fa fa-university fa-5x"></i>
						</div>
						<div class="boxItem-2">
							<h3>Choose your house and rent it.</h3>
						</div>
						<div class="boxItem-3">
							<i class="fa fa-thumbs-up fa-5x"></i>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 slideBox">
						<div class="boxItem">
							<i class="fab fa-rendact fa-5x"></i>
						</div>
						<div class="boxItem-2">
							<h3>Do you want to rent your house?</h3>
						</div>
						<div class="boxItem-3">
							<i class="fa fa-thumbs-up fa-5x"></i>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 slideBox">
						<div class="boxItem">
							<i class="fa fa-search fa-5x"></i>
						</div>
						<div class="boxItem-2">
							<h3>find your favourite area.</h3>
						</div>
						<div class="boxItem-3">
							<i class="fa fa-thumbs-up fa-5x"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- BodyPart End Here-->
<!-- Script For Box-Slider -->
<script type="text/javascript">
	boxSlider();
	function boxSlider(){
		var min = 0;
		var max = 5;
		var k = Math.floor(Math.random() * (max - min + 1) ) + min;
		var x = document.getElementsByClassName('boxItem')[k];
		var y  = document.getElementsByClassName('boxItem-2')[k];
		var z  = document.getElementsByClassName('boxItem-3')[k];
		if(x.style.left == '0px') {
			x.style.left = '100%';
			y.style.left = '0px';
			z.style.left = '100%';
		}else if(y.style.left == '0px') {
			x.style.left = '100%';
			y.style.left = '100%';
			z.style.left = '0px';
		}else {
			x.style.left = '0px';
			y.style.left = '100%';
			z.style.left = '100%';
		}
		setTimeout(boxSlider,2000);
	}
</script>
<!-- Footer Part Add -->
<?php include_once 'footer.php'; ?>