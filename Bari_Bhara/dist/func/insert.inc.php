<?php
	require_once 'main.inc.php';
	class work extends main {

		protected function connect() {
			$conn = $this->re_conn();
			return $conn;
		}

		// Login
		function login($data) {
			$conn = $this->connect();
			$email = $this->modify(mysqli_real_escape_string($conn, $data['email'])); 
			$pwd = $this->modify(mysqli_real_escape_string($conn, $data['password']));
			if(empty($email) || empty($pwd)) {
				$this->re_direct("index", "input=Empty");
			} else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../index.php?invalid=Email");
					exit();
				} else {
					if($this->length($pwd, 20, 6)) {
						$sql = "SELECT * FROM user_login WHERE user_email = '$email'";
						$result = mysqli_query($conn, $sql);
						$resultCheak = mysqli_num_rows($result);
						if ($resultCheak < 1) { 
							header("Location: ../index.php?invalid=email");
							exit();
						} else {
							if($row = mysqli_fetch_assoc($result)) {
								if($row['conditions'] == 'Accept') {
									$incroptPass = password_verify($pwd, $row['user_pwd']);
									if($incroptPass == false) {
										header("Location: ../index.php?wrong=Password");
										exit();
									} elseif ($incroptPass == true) {
										$_SESSION['userid'] = $row['user_id'];
										$_SESSION['email'] = $row['user_email'];
										header("Location: ../index.php?login=success");
										exit();
									}
								} else {
									$this->re_direct("index","Id=deactive");
								}
							}
						}
					} else {
						$this->re_direct("index","Password=Invalid");
					}
				}
			}
		}
		
		// Sign Up
		function registation($data){
			$conn = $this->connect();
			$fname = $this->modify(mysqli_real_escape_string($conn, $data['fname']));
			$lname = $this->modify(mysqli_real_escape_string($conn, $data['lname']));
			$email = $this->modify(mysqli_real_escape_string($conn, $data['email']));
			$pwd = $this->modify(mysqli_real_escape_string($conn, $data['password']));
			$re_pwd = $this->modify(mysqli_real_escape_string($conn, $data['repassword']));
			$accept = $this->modify(mysqli_real_escape_string($conn, $data['atc']));
			if(empty($fname) || empty($lname) || empty($email) ||empty($pwd) || empty($re_pwd)) {
				$this->re_direct("index","input=empty");
			} else {
				if(!isset($data['atc'])) {
					$this->re_direct("index","notaccept=terms&condition");
				} else {
					if(preg_match("/^[a-z]+(\.)?( )?[a-z]*$/i", $fname)) {
						if($this->length($fname, 25, 3)) {
							if(preg_match("/^[a-z]+$/i", $lname)) {
								if($this->length($lname, 25, 3)) {
									if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
										if($this->length($pwd, 20, 6)){
											if($pwd === $re_pwd) {
												if($accept === 'Accept') {
													if($this->cheakemail($email)){
														date_default_timezone_set("Asia/Dhaka");
														$time = getdate();
														$times = "$time[hours]:$time[minutes]:$time[seconds] $time[weekday], $time[mday] $time[month] $time[year]";
														$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
														$sql = "INSERT INTO user_login(user_fname, user_lname, user_email, user_pwd, currentTime, conditions) VALUES('$fname', '$lname','$email', '$hashedpwd', '$times', '$accept')";
														if(mysqli_query($conn, $sql)) {
															$this->re_direct("index","SignUp=Successfull!");
														} else {
															$this->re_direct("index","Failed!");
														}
													} else {
														$this->re_direct("index","Email=AlreadyExsist");
													}
												} else {
													$this->re_direct("index","invalid=valueofcheakbox");
												}
											} else {
												$this->re_direct("index","password=notMatch");
											}
										} else {
											$this->re_direct("index","invalid=password-length");
										}
									} else {
										$this->re_direct("index","invalid=email");
									}
								} else {
									$this->re_direct("index","Error=lastName-length");
								}
							} else {
								$this->re_direct("index","Error=lastName");
							}
						} else {
							$this->re_direct("index","Error=firstName-length");
						}
					} else {
						$this->re_direct("index","Error=firstName");
					}
				}
			}
		}

		// New Post Entry Function
		function newPostEntry($data, $files) {
			function text($data){
				$arr="";
				for($i=1;$i<9;$i++){
					if(isset($data['f'.$i])){
						$arr = $arr.'post_f'.$i.',';
					}
				}
				return $arr;
			}
			function text1($data){
				$arr="";
				for($i=1;$i<9;$i++){
					if(isset($data['f'.$i])){
						$arr = $arr.'\'yes\',';
					}
				}
				return $arr;
			}
			$arr = text($data);
			$arr1 = text1($data);
			$conn = $this->connect();
			$title = $this->modify(mysqli_real_escape_string($conn, $data['title']));
			$rent = $this->modify(mysqli_real_escape_string($conn, $data['rent']));
			$owner_name = $this->modify(mysqli_real_escape_string($conn, $data['owner_name']));
			$phone_number = $this->modify(mysqli_real_escape_string($conn, $data['phone_number']));
			$p_type = $this->modify(mysqli_real_escape_string($conn, $data['p_type']));
			$type_of_Rent = $this->modify(mysqli_real_escape_string($conn, $data['type_of_Rent']));
			$allowed_pepole = $this->modify(mysqli_real_escape_string($conn, $data['allowed_pepole']));
			$description = addcslashes($this->modify(mysqli_real_escape_string($conn, $data['description'])),"'");
			$religion = $this->modify(mysqli_real_escape_string($conn, $data['religion']));
			$religion = $this->modify(mysqli_real_escape_string($conn, $data['religion']));
			$size = $this->modify(mysqli_real_escape_string($conn, $data['size']));
			$district = $this->modify(mysqli_real_escape_string($conn, $data['district']));
			$thana = $this->modify(mysqli_real_escape_string($conn, $data['thana']));
			$area = $this->modify(mysqli_real_escape_string($conn, $data['area']));
			$address = $this->modify(mysqli_real_escape_string($conn, $data['address']));
			date_default_timezone_set("Asia/Dhaka");
			$time = getdate();
			$times = "$time[hours]:$time[minutes]:$time[seconds] $time[weekday], $time[mday] $time[month] $time[year]";
			$uid = $_SESSION['userid'];
			if(empty($title) || 
			   empty($rent) || 
			   empty($owner_name) || 
			   empty($phone_number) || 
			   empty($p_type) || 
			   empty($type_of_Rent) || 
			   empty($allowed_pepole) ||
			   empty($description) ||
			   empty($religion) ||
			   empty($district) ||
			   empty($thana) ||
			   empty($area) ||
			   empty($address)
			) {
				echo "Empty";

			} else {
				if(preg_match("/^[a-zA-Z]+(||_|-|,|:|0-9|\.| |\*)?[a-zA-Z0-9,\.:-_* ]*$/", $title)) {
					if($this->length($title, 50, 10)) {
						if(preg_match("/^[0-9]+$/", $rent)) {
							if($this->length($rent, 8, 3)) {
								if(preg_match("/^[a-z]+(\.)?( )?[a-z ]*$/i", $owner_name)) {
									if($this->length($owner_name, 30, 3)) {
										if(preg_match("/^[0][1](8|9|5|7|6)[0-9]+$/", $phone_number)) {
											if($this->length($phone_number, 11, 11)) {
												if(preg_match("/^[a-z ]+$/i", $p_type)) {
													if($this->length($p_type, 25, 3)) {
														if(preg_match("/^[a-z ]+$/i", $type_of_Rent)) {
															if($this->length($type_of_Rent, 25, 3)) {
																if(preg_match("/^[a-z ]+$/i", $allowed_pepole)) {
																	if($this->length($allowed_pepole, 25, 5)) {
																		if($this->length($description, 1000, 10)) {
																			if(preg_match("/^[a-z ]+$/i", $religion)) {
																				if($this->length($religion, 25, 5)) {
				if(preg_match("/^[a-z ]+$/i", $district)) {
					if($this->length($district, 25, 3)) {
						if(preg_match("/^[a-z ]+$/i", $thana)) {
							if($this->length($thana, 25, 3)) {
								if(preg_match("/^[a-z ]+$/i", $area)) {
									if($this->length($area, 25, 3)) {
										if($this->length($address, 50, 3)) {
											if(isset($data['atc'])){
												if($data['atc'] == 'Accept') {
													$atc = $data['atc'];
													if(!empty($data['size'])) {
														$size = $data['size'];
														if(!empty($files['images']['name'])){
															$sql = "INSERT INTO newpost(user_id,post_title,post_rent,post_owner_name,post_phone_number,post_p_type,post_type_of_Rent,post_allowed_people,post_description,post_religion,post_size,post_district,post_thana,post_area,post_address,$arr post_time, post_active) VALUES('$uid','$title','$rent','$owner_name','$phone_number','$p_type','$type_of_Rent','$allowed_pepole','$description','$religion','$size','$district','$thana','$area','$address',$arr1'$times','$atc')";
															if (mysqli_query($conn, $sql)){
																$sql = "SELECT post_id From newpost WHERE user_id = $uid";
																$result = mysqli_query($conn, $sql);
																$vvv = mysqli_fetch_all($result);
																$size = sizeof($vvv);
																$rrr = $vvv[$size-1][0];
																$img = $this->imgProcess($files, $rrr);
																if($img == true) {
																	$this->re_direct("mypost","Successfull");
																} else {
																	$this->re_direct("mypost","failed");
																}
															} else {
																// echo $sql;
																$this->re_direct("index","Post=Failed");
															}
														} else {
															$sql = "INSERT INTO newpost(user_id,post_title,post_rent,post_owner_name,post_phone_number,post_p_type,post_type_of_Rent,post_allowed_people,post_description,post_religion,post_size,post_district,post_thana,post_area,post_address,$arr post_time, post_active) VALUES('$uid','$title','$rent','$owner_name','$phone_number','$p_type','$type_of_Rent','$allowed_pepole','$description','$religion','$size','$district','$thana','$area','$address',$arr1'$times','$atc')";
															if (mysqli_query($conn, $sql)){
																$this->re_direct("index","Successfully_posted1");
															} else {
																$this->re_direct("index","Failed_to_post");
															}
														}
													} else {
														if(!empty($files['images']['name'])){
															$sql = "INSERT INTO newpost(user_id,post_title,post_rent,post_owner_name,post_phone_number,post_p_type,post_type_of_Rent,post_allowed_people,post_description,post_religion,post_district,post_thana,post_area,post_address,$arr post_time, post_active) VALUES('$uid','$title','$rent','$owner_name','$phone_number','$p_type','$type_of_Rent','$allowed_pepole','$description','$religion','$district','$thana','$area','$address',$arr1'$times','$atc')";
															if (mysqli_query($conn, $sql)){
																$sql = "SELECT post_id From newpost WHERE user_id = $uid";
																$result = mysqli_query($conn, $sql);
																$vvv = mysqli_fetch_all($result);
																$size = sizeof($vvv);
																$rrr = $vvv[$size-1][0];
																$img = $this->imgProcess($files, $rrr);
																if($img == true) {
																	$this->re_direct("mypost","Successfull");
																} else {
																	$this->re_direct("mypost","failed");
																}
															} else {
																$this->re_direct("index","Post=Failed!");
															}
														} else {
															$sql = "INSERT INTO newpost(user_id,post_title,post_rent,post_owner_name,post_phone_number,post_p_type,post_type_of_Rent,post_allowed_people,post_description,post_religion,post_district,post_thana,post_area,post_address,$arr post_time, post_active) VALUES('$uid','$title','$rent','$owner_name','$phone_number','$p_type','$type_of_Rent','$allowed_pepole','$description','$religion','$district','$thana','$area','$address',$arr1'$times','$atc')";
															if (mysqli_query($conn, $sql)){
																$this->re_direct("index","Successfully_posted2");
															} else {
																$this->re_direct("index","Failed_to_post");
															}
														}
													}
												} else {
													$this->re_direct("index","invalid=Acceptense");
												}
											} else {
												$this->re_direct("index","notAccept=Conditions");
											}
										} else {
											$this->re_direct("index","address=TooBigOrtooSmall");
										}
									} else {
										$this->re_direct("index","area=TooBigOrtooSmall");
									}
								} else {
									$this->re_direct("index","Invalid=area");
								}
							} else {
								$this->re_direct("index","thana=TooBigOrtooSmall");
							}
						} else {
							$this->re_direct("index","Invalid=thana");
						}
					} else {
						$this->re_direct("index","district=TooBigOrtooSmall");
					}
				} else {
					$this->re_direct("index","Invalid=district");
				}
																				} else {
																					$this->re_direct("index","religion=TooBigOrtooSmall");
																				}
																			} else {
																				$this->re_direct("index","Invalid=religion");
																			}
																		} else {
																			$this->re_direct("index","Invalid=description");
																		}
																	} else {
																		$this->re_direct("index","allowed_pepole=TooBigOrtooSmall");
																	}
																} else {
																	$this->re_direct("index","Invalid=allowed_pepole");
																}
															} else {
																$this->re_direct("index","type_of_Rent=TooBigOrtooSmall");
															}
														} else {
															$this->re_direct("index","Invalid=type_of_Rent");
														}
													} else {
														$this->re_direct("index","p_type=TooBigOrtooSmall");
													}
												} else {
													$this->re_direct("index","Invalid=p_type");
												}
											} else {
												$this->re_direct("index","phone_number=TooBigOrtooSmall");
											}
										} else {
											$this->re_direct("index","Invalid=phone_number");
										}
									} else {
										$this->re_direct("index","owner_name=TooBigOrtooSmall");
									}
								} else {
									$this->re_direct("index","Invalid=owner_name");
								}
							} else {
								$this->re_direct("index","rent=TooBigOrtooSmall");
							}
						} else {
							$this->re_direct("index","Invalid=rent");
						}
					} else {
						$this->re_direct("index","title=TooBigOrtooSmall");
					}
				} else {
					$this->re_direct("index","Invalid=title");
				}
			}
		}

		// All Data Validation Function
		protected function modify($data) {
			$data = trim($data);
		  	$data = stripslashes($data);
		  	$data = htmlspecialchars($data);
		  	return $data;
		}
		protected function length($data, $max, $min){
			if (strlen($data) > $max || strlen($data) < $min) {
				return false;
			} else {
				return true;
			}
		}
		protected function cheakemail($email) {
			$conn = $this->connect();
			$sql = "SELECT user_email FROM user_login WHERE user_email = '$email'";
			$result = mysqli_query($conn, $sql);
			$resultcheak = mysqli_num_rows($result);
			if($resultcheak > 0) {
				return false;
			} else {
				return true;
			}
		}
		// image process
		function imgProcess($data, $postid) {
			$conn = $this->connect();
			if(empty($data['images']['type']) && empty($data['images']['size'])){
				$this->re_direct("profile", "input=empty");
			} else {
				$extansionArray = array("jpg","jpeg","png","PNG","JPG","JPEG");
				$imgName = $data['images']['name'];
				$imgSize = $data['images']['size'];
				$imgError = $data['images']['error'];
				$imgTmp = $data['images']['tmp_name'];
				$explode = explode('.',$imgName);
				$imgEx = strtolower(end($explode));
				if(!in_array($imgEx, $extansionArray)) {
					$this->re_direct("profile", "invalid=Image1");
				} else {
					if($imgSize > 2000000) {
						$this->re_direct("profile", "Image=too_big");
					} else {
						if($imgError>0){
							$this->re_direct("profile", "Image=Error");
						} else {
							$random = md5($imgName);
							$path = '../img/postImage/'.$_SESSION['userid'].$random.'.'.$imgEx;
							$db_path = 'img/postImage/'.$_SESSION['userid'].$random.'.'.$imgEx;
							if(!move_uploaded_file($imgTmp, $path)) {
								return false;
							} else {
								$new = $_SESSION['userid'];
								$sql = "INSERT INTO postimage(post_id,user_id,image_path) VALUES('$postid','$new','$db_path')";
								if(mysqli_query($conn, $sql)) {
									return true;
								} else {
									return false;
								}
							}
						}
					}
				}
			}
		}
		// Re-Direct Function
		protected function re_direct($location, $msg) {
			header("Location: ../".$location.".php?".$msg);
			exit();
		}
	}
?>