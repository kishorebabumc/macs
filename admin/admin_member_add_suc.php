<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_member";
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
    $groupid = $_POST['groupid'];

    $sqlmem = $connection->query("SELECT max(mid(memid,2)) FROM members");
    $memid  = $sqlmem->fetch_assoc();
    $memid  = $memid['max(mid(memid,2))'] + 1;
    $memid = 'M'.$memid;

    $memadd = "INSERT INTO `members` (`memid`, `memname`, `gender`, `dob`, `memaddress`,`memphone`,`doj`,`memstatus`,`memgroupid`,`mementrydate`,`memempid`) 
               VALUES ('$memid', '$name', '$gender', '$dob', '$address', '$mobile', '$doj' ,1,'$groupid','$timedate','$user')";
    $rowmemadd = $connection->query($memadd);	
  
	  //$lastid = $empid['max(id)'] + 1;
    //if ($connection->query($result1) === TRUE) {
        //$lastid = $connection->insert_id;
        //echo "New record created successfully. Last inserted ID is: " . $lastid;
    //} 
    //else {
        //echo "Error: " . $result1 . "<br>" . $connection->error;
    //}   
  	
    $mem = $connection->query("SELECT * FROM members WHERE memid = '$memid'");
    $rowmem= $mem->fetch_assoc();
    $groupid = $rowmem['memgroupid'];
    $memgroup = $connection->query("SELECT * FROM groups WHERE GroupID = '$groupid'");
    $rowmemgroup = $memgroup->fetch_assoc();
}
else {
		header("location:sessionexpire.php");
}
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
                Member Added Sucessfully
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i> 
									
								</small>
							</h1>
						</div><!-- /.page-header -->
                        
						      <div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="admin_mem_add_suc.php">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Member Name </label>

										<div class="col-sm-7">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo $rowmem['memid']; ?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Gender</label>

										<div class="col-sm-9">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo $rowmem['gender']; ?>" disabled>		
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Date of Birth </label>

										<div class="col-sm-4">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo date('d-m-Y',strtotime($rowmem['dob'])); ?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Date of Joining </label>

										<div class="col-sm-4">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo date('d-m-Y',strtotime($rowmem['doj'])); ?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> Group Name </label>

										<div class="col-sm-7">
                      <input type="text" class="form-control"  style="width:270px;" value="<?php echo $rowmemgroup['GroupName']; ?>" disabled>            
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Member Address </label>

										<div class="col-sm-7">
                      <textarea type="text" class="form-control"  style="width:270px;" value="" disabled><?php echo $rowmem['memaddress']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-7"> Mobile No. </label>

										<div class="col-sm-4">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo $rowmem['memphone']; ?>" disabled>
										</div>
									</div>
									
									
									<div class="clearfix form-group">
										<div class="col-md-offset-3 col-md-9">
											<a href="admin_member.php"><button class="btn btn-info" type="button">
												<i class="ace-icon fa fa-arrow-left bigger-110"></i>
												Back
											</button></a>											
										</div>
									</div>
                </form>
							</div>
						</div>
              
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php 
	include("footer.php");    
?>			