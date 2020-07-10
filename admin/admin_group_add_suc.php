<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_group";
	include("adminsidepan.php");

  date_default_timezone_set('Asia/Kolkata');
 	$timedate = date('Y-m-d H:i:s', time());

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_SESSION['login_user'];
    $name = $_POST['name'];
    $clusterid = $_POST['clusterid'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];  

    $sqlgroup = $connection->query("SELECT max(mid(GroupID,2)) FROM groups");
    $groupid  = $sqlgroup->fetch_assoc();
    $groupid  = $groupid['max(mid(GroupID,2))'] + 1;
    $groupid = 'G'.$groupid;

    $group = "INSERT INTO groups (GroupID, GroupName, Address, Mobile, ClusterID,status) 
               VALUES ('$groupid', '$name', '$address', '$mobile', '$clusterid',1)";
    $rowgroup = $connection->query($group);	
  
	  //$lastid = 'C'.$clusterid;
    //if ($connection->query($result1) === TRUE) {
        //$lastid = $connection->insert_id;
        //echo "New record created successfully. Last inserted ID is: " . $lastid;
    //} 
    //else {
        //echo "Error: " . $result1 . "<br>" . $connection->error;
    //}   
  	
    $groupnew = $connection->query("SELECT * FROM groups WHERE GroupID = '$groupid'");
    $rowgroupnew = $groupnew->fetch_assoc();
    $clusterid = $rowgroupnew['ClusterID'];
    $cluster = $connection->query("SELECT * FROM cluster WHERE ClusterID = '$clusterid'");
    $rowcluster = $cluster->fetch_assoc();
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
                Group Added Sucessfully
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i> 
									
								</small>
							</h1>
						</div><!-- /.page-header -->
            
                   
            <div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="admin_group_add_suc.php">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">GroupID</label>

										<div class="col-sm-7">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo $rowgroupnew['GroupID']; ?>" disabled>
										</div>
									</div>
                  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Group Name</label>

										<div class="col-sm-7">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo $rowgroupnew['GroupName']; ?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Address</label> 

										<div class="col-sm-7">
                      <textarea type="text" class="form-control"  style="width:270px;" value="" disabled><?php echo $rowgroupnew['Address']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Phone No</label>

										<div class="col-sm-4">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo $rowgroupnew['Mobile']; ?>" disabled>
                    </div>
									</div>

                  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Under Cluster</label>

										<div class="col-sm-7">
											<input type="text" class="form-control"  style="width:270px;" value="<?php echo $rowcluster['ClusterName']; ?>" disabled> 
										</div>
									</div>

                  
									<div class="clearfix form-group">
										<div class="col-md-offset-3 col-md-9">
											<a href="admin_group.php"><button class="btn btn-info" type="button">
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