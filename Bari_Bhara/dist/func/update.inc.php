<?php
	session_start();
	ob_end_flush();
	require_once 'insert.inc.php';
	class updateProfile extends work{
		// Edit Profile Information
		// Edit Name Function
		function editUserName($data){
			$conn = $this->connect();
			$fname = $this->modify(mysqli_real_escape_string($conn, $data['fname']));
			$lname = $this->modify(mysqli_real_escape_string($conn, $data['lname']));
			if(empty($fname) || empty($lname)) {
				$this->re_direct("profile", "input=empty");
			} else {
				if(preg_match("/^[a-z]+(\.)?( )?[a-z]*$/i", $fname) && preg_match("/^[a-z]+$/i", $lname)) {
					if($this->length($fname, 25, 4) && $this->length($lname, 25, 4)) {
						$result = $this->change("user_login", "user_fname", $fname , $_SESSION['userid']);
						$result1 = $this->change("user_login", "user_lname", $lname , $_SESSION['userid']);
						if($result == false || $result1 == false) {
							$this->re_direct("profile", "Failed");
						} else {
							$this->re_direct("profile", "Successfull");
						}
					} else {
						$this->re_direct("profile", "Error=toobigOrtooSmall");
					}
				} else {
					$this->re_direct("profile", "invalid=name");
				}
			}
		}
		// Edit Job Function
		function editUserJob($data){
			$conn = $this->connect();
			$job = mysqli_real_escape_string($conn, $data['job']);
			if(empty($job)) {
				$this->re_direct("profile", "input=empty");
			} else {
				if(preg_match("/^[a-z]+(,)?( )?[a-z]*$/i", $job)) {
					if($this->length($job, 45, 3)) {
						$result = $this->change("user_login", "user_job", $job , $_SESSION['userid']);
						if($result == false) {
							$this->re_direct("profile", "Failed");
						} else {
							$this->re_direct("profile", "Successfull");
						}
					} else {
						$this->re_direct("profile", "Error=toobigOrtooSmall");
					}
				} else {
					$this->re_direct("profile", "invalid=job");
				}
			}
		}
		// Edit phone number
		function editUserPhone($data){
			$conn = $this->connect();
			$phone = mysqli_real_escape_string($conn, $data['phone']);
			if(empty($phone)) {
				$this->re_direct("profile", "input=empty");
			} else {
				if(preg_match("/^[0][1](8|9|5|7|6)[0-9]+$/", $phone)) {
					if($this->length($phone, 11, 11)) {
						$result = $this->change("user_login", "user_phone", $phone , $_SESSION['userid']);
						if($result == false) {
							$this->re_direct("profile", "invalid=phoneNumber");
						} else {
							$this->re_direct("profile", "Successfull");
						}
					} else {
						$this->re_direct("profile", "Error=notValidPhone");
					}
				} else {
					$this->re_direct("profile", "invalid=phone");
				}
			}
		}

		// Edit Gender
		function editUserGender($data){
			$conn = $this->connect();
			$gender = mysqli_real_escape_string($conn, $data['gender']);
			if(empty($gender)) {
				$this->re_direct("profile", "input=empty");
			} else {
				if(preg_match("/^[a-zA-Z]+$/", $gender)) {
					if($gender == 'Male' || $gender == 'Female') {
						$result = $this->change("user_login", "user_gender", $gender , $_SESSION['userid']);
						if($result == false) {
							$this->re_direct("profile", "invalid=gender");
						} else {
							$this->re_direct("profile", "Successfull");
						}
					} else {
						$this->re_direct("profile", "Error=toobigOrtooSmall");
					}
				} else {
					$this->re_direct("profile", "invalid=gender");
				}
			}
		}

		// Edit User Date of Birth
		function edituserdob($data){
			$conn = $this->connect();
			$dob = mysqli_real_escape_string($conn, $data['dob']);
			if(empty($dob)) {
				$this->re_direct("profile", "input=empty");
			} else {
				if(preg_match("/^[0-9]+(\/|:|-)[0-9]+(\/|:|-)[0-9]+$/", $dob)) {
					$result = $this->change("user_login", "user_dob", $dob , $_SESSION['userid']);
					if($result == false) {
						$this->re_direct("profile", "invalid=dob");
					} else {
						$this->re_direct("profile", "Successfull");
					}
				} else {
					$this->re_direct("profile", "invalid=date");
				}
			}
		}

		// Edit User Current Address
		function edituserCaddress($data){
			$conn = $this->connect();
			$caddress = mysqli_real_escape_string($conn, $data['caddress']);
			$carea = mysqli_real_escape_string($conn, $data['carea']);
			$cthana = mysqli_real_escape_string($conn, $data['cthana']);
			$cdistrict = mysqli_real_escape_string($conn, $data['cdistrict']);
			$czip = mysqli_real_escape_string($conn, $data['czip']);
			if(empty($caddress) || empty($carea) || empty($cthana) || empty($cdistrict) || empty($czip)) {
				$this->re_direct("profile", "input=empty");
			} else {
				if(preg_match("/^[a-zA-Z]+$/", $cdistrict)) {
					if($this->length($cdistrict,25,3)){
						if(preg_match("/^[a-zA-Z]+$/", $cthana)) {
							if($this->length($cthana,25,3)) {
								if(preg_match("/^[a-zA-Z]+$/", $carea)) {
									if($this->length($carea,25,3)) {
										if($this->length($caddress,50,3)) {
											if(preg_match("/^[0-9]+$/", $czip)) {
												if($this->length($czip,4,4)) {
													$result = $this->change("user_login", "user_caddress", $caddress , $_SESSION['userid']);
													$result1 = $this->change("user_login", "user_carea", $carea , $_SESSION['userid']);
													$result2 = $this->change("user_login", "user_cthana", $cthana , $_SESSION['userid']);
													$result3 = $this->change("user_login", "user_cdistrict", $cdistrict , $_SESSION['userid']);
													$result4 = $this->change("user_login", "user_czip", $czip , $_SESSION['userid']);
													if( $result == false || $result1 == false || $result2 == false || $result3 == false || $result4 == false) {
														$this->re_direct("profile", "Failed!");
													} else {
														$this->re_direct("profile", "Successfull");
													}
												} else {
													$this->re_direct("profile", "length=tooBigORtooSmall");
												}
											} else {
												$this->re_direct("profile", "invalid=ZipCode");
											}
										} else {
											$this->re_direct("profile", "length=tooBigORtooSmall");
										}
									} else {
										$this->re_direct("profile", "length=areatooBigORtooSmall");
									}
								} else {
									$this->re_direct("profile", "invalid=area");
								}
							} else {
								$this->re_direct("profile", "length=thanatooBigORtooSmall");
							}
						} else {
							$this->re_direct("profile", "invalid=thana");
						}
					} else {
						$this->re_direct("profile", "length=DistricttooBigORtooSmall");
					}
				} else {
					$this->re_direct("profile", "invalid=District");
				}
			}
		}

		// Edit User Permanent Address
		function edituserPaddress($data){
			$conn = $this->connect();
			$paddress = mysqli_real_escape_string($conn, $data['paddress']);
			$parea = mysqli_real_escape_string($conn, $data['parea']);
			$pthana = mysqli_real_escape_string($conn, $data['pthana']);
			$pdistrict = mysqli_real_escape_string($conn, $data['pdistrict']);
			$pzip = mysqli_real_escape_string($conn, $data['pzip']);
			if(empty($paddress) || empty($parea) || empty($pthana) || empty($pdistrict) || empty($pzip)) {
				$this->re_direct("profile", "input=empty");
			} else {
				if(preg_match("/^[a-zA-Z]+$/", $pdistrict)) {
					if($this->length($pdistrict,25,3)){
						if(preg_match("/^[a-zA-Z]+$/", $pthana)) {
							if($this->length($pthana,25,3)) {
								if(preg_match("/^[a-zA-Z]+$/", $parea)) {
									if($this->length($parea,25,3)) {
										if($this->length($paddress,50,3)) {
											if(preg_match("/^[0-9]+$/", $pzip)) {
												if($this->length($pzip,4,4)) {
													$result = $this->change("user_login", "user_paddress", $paddress , $_SESSION['userid']);
													$result1 = $this->change("user_login", "user_parea", $parea , $_SESSION['userid']);
													$result2 = $this->change("user_login", "user_pthana", $pthana , $_SESSION['userid']);
													$result3 = $this->change("user_login", "user_pdistrict", $pdistrict , $_SESSION['userid']);
													$result4 = $this->change("user_login", "user_pzip", $pzip , $_SESSION['userid']);
													if( $result == false || $result1 == false || $result2 == false || $result3 == false || $result4 == false) {
														$this->re_direct("profile", "Failed!");
													} else {
														$this->re_direct("profile", "Successfull");
													}
												} else {
													$this->re_direct("profile", "length=tooBigORtooSmall");
												}
											} else {
												$this->re_direct("profile", "invalid=ZipCode");
											}
										} else {
											$this->re_direct("profile", "length=addretooBigORtooSmall");
										}
									} else {
										$this->re_direct("profile", "length=areatooBigORtooSmall");
									}
								} else {
									$this->re_direct("profile", "invalid=area");
								}
							} else {
								$this->re_direct("profile", "length=thanatooBigORtooSmall");
							}
						} else {
							$this->re_direct("profile", "invalid=thana");
						}
					} else {
						$this->re_direct("profile", "length=DistricttooBigORtooSmall");
					}
				} else {
					$this->re_direct("profile", "invalid=District");
				}
			}
		}

		// Edit Profile picture
		function editUserImg($data) {
			$conn = $this->connect();
			if(empty($data['proImg']['type']) && empty($data['proImg']['size'])){
				$this->re_direct("profile", "input=empty");
			} else {
				$extansionArray = array("jpg","jpeg","png");
				$imgName = $data['proImg']['name'];
				$imgSize = $data['proImg']['size'];
				$imgError = $data['proImg']['error'];
				$imgTmp = $data['proImg']['tmp_name'];
				$explode = explode('.',$imgName);
				$imgEx = strtolower(end($explode));
				if(!in_array($imgEx, $extansionArray)) {
					$this->re_direct("profile", "invalid=Image");
				} else {
					if($imgSize > 900000) {
						$this->re_direct("profile", "Image=too_big");
					} else {
						if($imgError>0){
							$this->re_direct("profile", "Image=Error");
						} else {
							$path = '../img/pro_images/'.$_SESSION['userid'].'.'.$imgEx;
							$db_path = 'img/pro_images/'.$_SESSION['userid'].'.'.$imgEx;
							if(!move_uploaded_file($imgTmp, $path)) {
								$this->re_direct("profile", "not=uploaded");
							} else {
								$result = $this->change("user_login", "user_image", $db_path , $_SESSION['userid']);
								if ($result == false) {
									$this->re_direct("profile", "ErrorOccurs");
								} else {
									$this->re_direct("profile", "Successfully_Uploded");
								}
							}
						}
					}
				}
			}
		}

		// Edit My Post
		// Edit Post Title
		function editTitle($data) {
			$conn = $this->connect();
			$title = $this->modify(mysqli_real_escape_string($conn, $data['title']));
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			if(empty($title)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if(preg_match("/^[a-zA-Z]+(||_|-|,|:|0-9|\.| |\*)?[a-zA-Z0-9,\.:-_* ]*$/", $title)) {
					if($this->length($title, 50, 10)) {
						$result = $this->changepost('newpost', 'post_title', $title, $uid , $pid);
						if($result == true) {
							$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=type");
				}
			}
		}
		// Edit Post Rent Amount
		function editRent($data) {
			$conn = $this->connect();
			$rent = $this->modify(mysqli_real_escape_string($conn, $data['rent']));
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			if(empty($rent)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if(preg_match("/^[0-9]+$/", $rent)) {
					if($this->length($rent, 8, 3)) {
						$result = $this->changepost('newpost', 'post_rent', $rent, $uid , $pid);
						if($result == true) {
							$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=type");
				}
			}
		}
		// Edit Post Type of Rent
		function editTypeOfRent($data) {
			$conn = $this->connect();
			$tOFr = $this->modify(mysqli_real_escape_string($conn, $data['tOFr']));
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			if(empty($tOFr)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if(preg_match("/^[a-z ]+$/i", $tOFr)) {
					if($this->length($tOFr, 25, 3)) {
						$result = $this->changepost('newpost', 'post_type_of_Rent', $tOFr, $uid , $pid);
						if($result == true) {
							$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=type");
				}
			}
		}
		// Edit Post Type of Area
		function editTypeOfArea($data) {
			$conn = $this->connect();
			$pType = $this->modify(mysqli_real_escape_string($conn, $data['pType']));
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			if(empty($pType)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if(preg_match("/^[a-z ]+$/i", $pType)) {
					if($this->length($pType, 25, 3)) {
						$result = $this->changepost('newpost', 'post_p_type', $pType, $uid , $pid);
						if($result == true) {
							$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=type");
				}
			}
		}
		// Edit Post Room Size
		function editSize($data) {
			$conn = $this->connect();
			$size = $this->modify(mysqli_real_escape_string($conn, $data['size']));
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			if(empty($size)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if(preg_match("/^[0-9]+$/", $size)) {
					if($this->length($size, 8, 2)) {
						$result = $this->changepost('newpost', 'post_size', $size, $uid , $pid);
						if($result == true) {
							$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=type");
				}
			}
		}
		// Edit Post Rental Terms
		function editTerms($data) {
			$conn = $this->connect();
			$allowed_pepole = $this->modify(mysqli_real_escape_string($conn, $data['allowed_people']));
			$religion = $this->modify(mysqli_real_escape_string($conn, $data['religion']));
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			$colName = "post_allowed_people = '".$allowed_pepole."', post_religion";
			if($allowed_pepole == "" || $religion == "") {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if(preg_match("/^[a-z ]+$/i", $allowed_pepole) || preg_match("/^[a-z ]+$/i", $religion)) {
					if($this->length($allowed_pepole, 25, 3) || $this->length($religion, 10, 3)) {
						$result = $this->changepost('newpost', $colName, $religion, $uid , $pid);
						if($result == true) {
							$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=type");
				}
			}
		}
		// Edit Post Facilities
		function editFacilities($data) {
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			function text($data){
				$arr="";
				for($i=1;$i<9;$i++){
					if(isset($data['f'.$i])){
						$arr = $arr.'post_f'.$i.' = \'yes\', ';
					} else {
						$arr = $arr.'post_f'.$i.' = \'no\', ';
					}
				}
				if(isset($data['f9'])) {
					$arr = $arr.'post_f9 = \'yes\'';
				} else {
					$arr = $arr.'post_f9 = \'no\'';
				}
				return $arr;
			}
			$arr = text($data);
			$sql = "UPDATE newpost SET ".$arr." WHERE user_id = ".$uid." AND post_id = ".$pid;
			if(mysqli_query($this->re_conn(), $sql)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
			} else {
				$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
			}
		}
		// Edit Post Description
		function editDescription($data) {
			$conn = $this->connect();
			$description = $this->modify(mysqli_real_escape_string($conn, $data['description']));
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			if(empty($description)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if($this->length($description, 2000, 10)) {
					$result = $this->changepost('newpost', 'post_description', $description, $uid , $pid);
					if($result == true) {
						$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
				}
			}
		}
		// Edit Post Name
		function editPostName($data){
			$conn = $this->connect();
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			$eOname = $this->modify(mysqli_real_escape_string($conn, $data['eOname']));
			if(empty($eOname)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if(preg_match("/^[a-z]+(\.)?( )?[a-z ]*$/i", $eOname)) {
					if($this->length($eOname, 30, 3)) {
						$result = $this->changepost("newpost", "post_owner_name", $eOname , $uid , $pid);
						if($result == false) {
							$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=type");
				}
			}
		}
		// Edit Post Phone Number
		function editPhoneNumber($data){
			$conn = $this->connect();
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			$ephone = $this->modify(mysqli_real_escape_string($conn, $data['ephone']));
			if(empty($ephone)) {
				$this->re_direct("mypost_details", "post_id=".$pid."&Empty");
			} else {
				if(preg_match("/^[0][1](8|9|5|7|6)[0-9]+$/", $ephone)) {
					if($this->length($ephone, 11, 11)) {
						$result = $this->changepost("newpost", "post_phone_number", $ephone , $uid , $pid);
						if($result == false) {
							$this->re_direct("mypost_details", "post_id=".$pid."&Failed!");
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&Successfully_Changed");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigOrSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=number");
				}
			}
		}
		// Edit Post Address
		function editPostAddress($data){
			$uid = $_SESSION['userid'];
			$pid = $_SESSION['pid'];
			$conn = $this->connect();
			$address = mysqli_real_escape_string($conn, $data['address']);
			$area = mysqli_real_escape_string($conn, $data['area']);
			$thana = mysqli_real_escape_string($conn, $data['thana']);
			$district = mysqli_real_escape_string($conn, $data['district']);
			$zip = mysqli_real_escape_string($conn, $data['zip']);
			if(empty($address) || empty($area) || empty($thana) || empty($district) || empty($zip)) {
				$this->re_direct("profile", "input=empty");
			} else {
				if(preg_match("/^[a-zA-Z]+$/", $district)) {
					if($this->length($district,25,3)){
						if(preg_match("/^[a-zA-Z]+$/", $thana)) {
							if($this->length($thana,25,3)) {
								if(preg_match("/^[a-zA-Z]+$/", $area)) {
									if($this->length($area,25,3)) {
										if($this->length($address,50,3)) {
											if(preg_match("/^[0-9]+$/", $zip)) {
												if($this->length($zip,4,4)) {
													$result = $this->changepost("newpost", "post_address", $address , $uid, $pid);
													$result1 = $this->changepost("newpost", "post_area", $area , $uid, $pid);
													$result2 = $this->changepost("newpost", "post_thana", $thana , $uid, $pid);
													$result3 = $this->changepost("newpost", "post_district", $district , $uid, $pid);
													$result4 = $this->changepost("newpost", "post_zip", $zip , $uid, $pid);
													if( $result == false || $result1 == false || $result2 == false || $result3 == false || $result4 == false) {
														$this->re_direct("mypost_details", "post_id=".$pid."&=Failed!");
													} else {
														$this->re_direct("mypost_details", "post_id=".$pid."&=Successfull");
													}
												} else {
													$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigORtooSmall");
												}
											} else {
												$this->re_direct("mypost_details", "post_id=".$pid."&invalid=ZipCode");
											}
										} else {
											$this->re_direct("mypost_details", "post_id=".$pid."&length=tooBigORtooSmall");
										}
									} else {
										$this->re_direct("mypost_details", "post_id=".$pid."&length=areatooBigORtooSmall");
									}
								} else {
									$this->re_direct("mypost_details", "post_id=".$pid."&invalid=area");
								}
							} else {
								$this->re_direct("mypost_details", "post_id=".$pid."&length=thanatooBigORtooSmall");
							}
						} else {
							$this->re_direct("mypost_details", "post_id=".$pid."&invalid=thana");
						}
					} else {
						$this->re_direct("mypost_details", "post_id=".$pid."&length=DistricttooBigORtooSmall");
					}
				} else {
					$this->re_direct("mypost_details", "post_id=".$pid."&invalid=District");
				}
			}
		}
		// My Post Edit Function End Here
		
		// function for Update profile Data
		protected function change($tablename, $colname, $value, $uid) {
			$sql = "UPDATE ".$tablename." SET ".$colname." = '".$value."' WHERE user_id = ".$uid;
			if(mysqli_query($this->re_conn(), $sql)){
				return true;
			} else {
				return false;
			}
		}
		// Function for Update MyPOST DATA
		protected function changepost($tablename, $colname, $value, $uid, $pid) {
			$sql = "UPDATE ".$tablename." SET ".$colname." = '".$value."' WHERE user_id = ".$uid." AND post_id = ".$pid;
			if(mysqli_query($this->re_conn(), $sql)){
				return true;
			} else {
				return false;
			}
			// echo $sql;
		}
	}
?>