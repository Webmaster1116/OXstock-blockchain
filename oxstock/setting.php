<?php 
require_once 'classes/configure.php'; 
include(DIR_BASE.'user_header.php');
error_reporting(E_ERROR|E_WARNING);

$conn = mysqli_connect("localhost", "root", "", "oxstock");
if($conn === false){
	die("ERROR: Could not connect. " 
		. mysqli_connect_error());
}

if(!isset($userId) || $userId <= 0){
	$_SESSION['message_type'] = 'error';
	$_SESSION['message'] = 'Please login first!';
	header('Location: '.URL_BASE."login");
	exit;
}
$UserData = fetchqry('*',TB_USER,array("id="=>$userId));

if(isset($_REQUEST['send'])){
	$sql = "UPDATE `user` SET firstname = '".$_REQUEST['firstname']."', lastname = '".$_REQUEST['lastname']."',middlename = '".$_REQUEST['middlename']."',address = '".$_REQUEST['address']."',address_data = '".$_REQUEST['address_data']."',city ='".$_REQUEST['city']."',state = '".$_REQUEST['state']."',country = '".$_REQUEST['country']."',zipcode = '".$_REQUEST['zipcode']."',phoneno = '".$_REQUEST['phoneno']."',birthdate = '".$_REQUEST['birthdate']."' WHERE id = '".$userId."' ";
    mysqli_query($conn, $sql);
	header('Location: http://3.70.110.37/oxstock/setting?suc=true');
	exit;	

}
?>
<div class="dashboard-main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="owallet-wrap">
					<?php require_once DIR_BASE.'sidebar.php'; ?>
					<div class="owallet-right main">
						<div class="top-nav">
							<div class="owt-left">
								<h5>Hi <?php echo $UserData['firstname'].' '.$UserData['lastname'];?> Welcome Back!</h5>
								<!--<form>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="search">
										<span><i class="fa fa-search"></i></span>
									</div>
								</form>-->
							</div>
							<!--<div class="owt-right">
								<a href="javascript:;" class="upload"><span><i class="fas fa-upload"></i></span>sell
								your artwork</a>
								<div class="owt-option">
									<a href="javascript:;">
										<img src="<?php echo URL_BASE;?>images/wallet/bell-icol.png" />
									</a>
									<a href="javascript:;">
										<img src="<?php echo URL_BASE;?>images/wallet/options-icon.png" />
									</a>
									<a href="javascript:;">
										<i class="fas fa-user"></i>
									</a>
								</div>
							</div>-->
						</div>
						<div class="owl-body">
							<div class="ow-tab">
								<ul class="nav nav-pills">
									<li class="nav-item active">
										<a class="nav-link" data-toggle="pill" href="#profile" role="tab"
										aria-controls="pills-profile" aria-selected="true">Change Profile
									Details</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="pill" href="#contact" role="tab"
									aria-controls="pills-contact" aria-selected="false">Contact us</a>
								</li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="profile" role="tabpanel"
								aria-labelledby="profile-tab">
								<div class="form-detail">
									<div class="row">
										<div class="col-lg-4 col-md-6">
														<div class="uprofile-detail">
															<!-- <figure>
																<img src="<?php echo URL_BASE;?>images/wallet/user.png" alt="">

															</figure> 
															<div class="usrpencl"><a href=""> <i class="fas fa-pencil-alt"></i></a></div>-->
                                                            <!-- <form>
                                                                <div class="file-input">
                                                                    <input type="file" id="file" class="file">
                                                                    <label for="file">Select file</label>
                                                                </div>
                                                            </form> -->
                                                        </div>
                                                        <form class="upform oxwalletprofile" method="post">
                                                        	<div class="form-group">
                                                        		<input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $UserData['firstname']; ?>">
                                                        	</div>
                                                        	<div class="form-group">
                                                        		<input type="text" class="form-control" name="middlename" placeholder="Middle Name" value="<?php echo $UserData['middlename']; ?>">
                                                        	</div>
                                                        	<div class="form-group">
                                                        		<input type="text" class="form-control" name="lastname" placeholder="Surname" value="<?php echo $UserData['lastname']; ?>">
                                                        	</div>
                                                        	<div class="form-group">
                                                        		<input type="date" class="form-control" name="birthdate" placeholder="DOB" value="<?php echo $UserData['birthdate']; ?>">
                                                        	</div>
                                                        	<div class="form-group">
                                                        		<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $UserData['email']; ?>" disabled>
                                                        	</div>
                                                        	<div class="form-group">
                                                        		<input type="number" class="form-control" name="phoneno" placeholder="Mobile" value="<?php echo $UserData['phoneno']; ?>">
                                                        	</div>
                                                        	<div class="form-group">
                                                        		<textarea type="text" class="form-control" name="address" placeholder="Address"><?php echo $UserData['address']; ?></textarea> 
                                                        	</div>

                                                        	<div class="form-group">
                                                        		<textarea type="text" class="form-control" name="address_data" placeholder="Appartment, suite, etc."><?php echo $UserData['address_data']; ?></textarea> 
                                                        	</div>

                                                        	<div class="form-group">
                                                        		<input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $UserData['city']; ?>">
                                                        	</div>

															<div class="form-group">
                                                        		<input type="text" class="form-control" name="state" placeholder="State/province" value="<?php echo $UserData['state']; ?>">
                                                        	</div>

															<div class="form-group">
                                                        		<input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo $UserData['country']; ?>">
                                                        	</div>

                                                        	<div class="form-group">
                                                        		<input type="text" class="form-control" name="zipcode" placeholder="Zip/postal code" value="<?php echo $UserData['zipcode']; ?>">
                                                        	</div>

                                                            <button class="btn btn-orange" type="submit" name="send" id="send">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <div class="row">
                                            	<div class="col-lg-4 col-md-6">
                                            		<form class="upform">
                                            			<div class="form-group">
                                            				<input type="text" class="form-control"
                                            				placeholder="Full Name">
                                            			</div>
                                            			<div class="form-group">
                                            				<input type="number" class="form-control"
                                            				placeholder="Mobile number">
                                            			</div>
                                            			<div class="form-group">
                                            				<input type="email" class="form-control"
                                            				placeholder="Email">
                                            			</div>
                                            			<div class="form-group">
                                            				<input type="text" class="form-control"
                                            				placeholder="Location">
                                            			</div>
                                            			<div class="form-group">
                                            				<textarea class="form-control" rows="3"
                                            				placeholder="About Us"></textarea>
                                            			</div>
                                            			<button type="button" class="btn btn-orange">Update</button>
                                            		</form>
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