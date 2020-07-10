<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_cluster";
	include("adminsidepan.php");

  date_default_timezone_set('Asia/Kolkata');
 	$timedate = date('Y-m-d H:i:s', time());

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_SESSION['login_user'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];  

    $sqlcluster = $connection->query("SELECT * FROM cluster");
    $clusno  = $sqlcluster->num_rows;
    $clusterid = $clusno + 100;
    $clusterid = 'C'.$clusterid;

    $sql1 = "INSERT INTO cluster (ClusterID, ClusterName, Address, Mobile, MACSID,status) 
               VALUES ('$clusterid', '$name', '$address', '$mobile', NULL,1)";
    $result1 = $connection->query($sql1);	  
	 
  	
    $clus = $connection->query("SELECT * FROM cluster WHERE ClusterID = '$clusterid'");
    $row = $clus->fetch_assoc();  
}
?>

			<div class="main-content">
				<div class="main-content-inner">
        <div class="page-content">
						<div class="page-header">
							<h1>
								Cluster Added Successfully
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
            <div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Cluster Name</label>

										<div class="col-sm-7">
											<input type="text" id="form-field-1" value="<?php echo $row['ClusterName']; ?>" class="col-xs-10 col-sm-5" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Address</label> 

										<div class="col-sm-7">
											<input type="text" id="form-field-1" value="<?php echo $row['Address']; ?>" class="col-xs-10 col-sm-5" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Phone No</label>

										<div class="col-sm-4">
											<input type="text" id="form-field-3" value="<?php echo $row['Mobile']; ?>" class="col-xs-10 col-sm-5" disabled>
										</div>
									</div>                  
									<div class="clearfix form-group">
										<div class="col-md-offset-3 col-md-9">											
											<a href="admin_cluster.php"><button class="btn btn-info" type="button">
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