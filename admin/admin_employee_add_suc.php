<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_employee";
	include("adminsidepan.php");

  date_default_timezone_set('Asia/Kolkata');
 	$timedate = date('Y-m-d H:i:s', time());

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_SESSION['login_user'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];  

    $sqlemp = $connection->query("SELECT * FROM employee");
    $noemp  = $sqlemp->num_rows;
    $noemp = $noemp + 101;
    $empid = 'E'.$noemp;
    
    $empins = $connection->query("INSERT INTO `employee` (`empid`, `empname`, `empgender`, `empdob`, `empaddress`,`empmobile`,`empstatus`,`empdate`,`empuserid`) 
               VALUES ('$empid', '$name', '$gender', '$dob', '$address', '$mobile', 1,'$doj','$user')");	 	 
  	
    $empret = $connection->query("SELECT * FROM employee WHERE empid = '$empid'");
    $row = $empret->fetch_assoc();  
  }
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Employee Added Successfully
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee ID </label>

										<div class="col-sm-7">
											<input type="text" id="form-field-1" value="<?php echo $row['empid'];  ?>" class="col-xs-10 col-sm-5" disabled="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Name </label>

										<div class="col-sm-7">
											<input type="text" id="form-field-1" value="<?php echo $row['empname']; ?>" class="col-xs-10 col-sm-5" disabled="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Gender</label>

										<div class="col-sm-7">
												<input type="text" id="form-field-1" value="<?php echo $row['empgender']; ?>" class="col-xs-10 col-sm-5" disabled="">		
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Date of Birth </label>

										<div class="col-sm-4">
																		<input type="text" id="form-field-1" value="<?php echo $row['empdob']; ?>" class="col-xs-10 col-sm-5" disabled="">		
										</div>
									</div>									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Date of Joining </label>

										<div class="col-sm-4">
											<input type="text" id="form-field-1" value="<?php echo $row['empdate']; ?>" class="col-xs-10 col-sm-5" disabled="">		
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-6"> Address </label>

										<div class="col-sm-9">
											<textarea cols="35" rows="3" id="form-field-6" disabled=""><?php echo $row['empaddress']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-7"> Mobile No. </label>

										<div class="col-sm-4">
											<input type="text" id="form-field-1" value="<?php echo $row['empmobile']; ?>" class="col-xs-10 col-sm-5" disabled="">		
										</div>
									</div>
									<div class="clearfix form-group">
										<div class="col-md-offset-3 col-md-9">											
											<a href="admin_employee.php"><button class="btn btn-info" type="button">
												<i class="ace-icon fa fa-arrow-left bigger-110"></i>
												Back
											</button></a>											
										</div>
									</div>
								</form>		
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.main-content -->

<?php 
	include("footer.php");    
?>			