<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_roi";
	include("adminsidepan.php");

  date_default_timezone_set('Asia/Kolkata');
 	$timedate = date('Y-m-d H:i:s', time());

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_SESSION['login_user'];
    $subhead = $_POST['subhead'];
    $roi = $_POST['roi'];
    $details = $_POST['details'];
    $doe = $_POST['doe'];
    
    $subid = $connection->query("SELECT SubID FROM acc_subhead WHERE SubHead = '$subhead'");
    $subiddata = $subid->fetch_assoc();
    $subheadid = $subiddata['SubID'];
    
    $roitrans = $connection->query("START TRANSACTION");    
    $roistatus = $connection->query("UPDATE acc_rateofinterest SET status = 0 WHERE subheadid = '$subheadid' AND status = 1");
    $roiinsert = $connection->query("INSERT INTO acc_rateofinterest (subheadid, roi, details, doe, status,entrydate,entryempid) 
               VALUES ('$subheadid', '$roi', '$details', '$doe', 1,'$timedate','$user')");
    if($roistatus AND $roiinsert){
      $roicommit = $connection->query("COMMIT");
    }
    else{
      $roirollback = $connection->query("ROLLBACK");
    }
      
	  $roinew = $connection->query("SELECT * FROM acc_rateofinterest WHERE subheadid = '$subheadid' AND status = 1");
    $roinewdata = $roinew->fetch_assoc();
    //$lastid = 'C'.$clusterid;
    //if ($connection->query($result1) === TRUE) {
        //$lastid = $connection->insert_id;
        //echo "New record created successfully. Last inserted ID is: " . $lastid;
    //} 
    //else {
        //echo "Error: " . $result1 . "<br>" . $connection->error;
    //}   
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
								Rate of Interest changed successfully
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="admin_roi_edit_suc.php">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="subhead">Subhead</label>

										<div class="col-sm-7">
											<input type="text" id="subhead" name="subhead" value="<?php echo $subhead; ?>" class="col-xs-10 col-sm-5" readonly />											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Rate of interest</label>

										<div class="col-sm-7">
											<input type="text" id="roi" name="roi" value="<?php echo $roinewdata['roi']; ?>" class="col-xs-10 col-sm-5" disabled />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Details</label>

										<div class="col-sm-4">
											<input type="text" id="details" name="details" value="<?php echo $roinewdata['details']; ?>" class="col-xs-10 col-sm-5" disabled />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Date of effect</label>

										<div class="col-sm-7">
											<input type="date" id="doe" name="doe" value="<?php echo $roinewdata['doe']; ?>" class="col-xs-10 col-sm-5" disabled />
										</div>
									</div>
																		
									<div class="clearfix form-group">
										<div class="col-md-offset-3 col-md-9">
											
											<a href="admin_roi.php"><button class="btn btn-info" type="button">
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