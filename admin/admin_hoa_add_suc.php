<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_hoa";
	include("adminsidepan.php");

  date_default_timezone_set('Asia/Kolkata');
 	$timedate = date('Y-m-d H:i:s', time());

  if($_SERVER["REQUEST_METHOD"] == "POST"){
	$user = $_SESSION['login_user'];
	$majorid = $_POST['majorid'];
  
	$subhead = $_POST['subhead'];
  
	$subheaddesc = $_POST['subheaddesc'];
  
	$moduleid = $_POST['moduleid'];
  
	
	$connection->query("start transaction");
	
	$sql1 = "INSERT INTO `acc_subhead` (`SubID`, `SubHead`, `SubHeadDesc`, `SubHeadModule`, `MajorID`,`Status`) 
		         VALUES (NULL, '$subhead', '$subheaddesc', '$moduleid', '$majorid', 1)";
	$result1 = $connection->query($sql1);	
  
	//$lastid = $connection->insert_id;
  if ($connection->query($result1) === TRUE) {
    $lastid = $connection->insert_id;
    //echo "New record created successfully. Last inserted ID is: " . $lastid;
  } 
  else {
    echo "Error: " . $result1 . "<br>" . $connection->error;
  }  
  
	
	
	$sql2 = $connection->query("SELECT * FROM acc_majorheads WHERE MajorID = '$majorid'");	
	$row2 = mysqli_fetch_assoc($sql2);
	$sql3 = $connection->query("SELECT * FROM acc_subhead_module WHERE ModuleID = '$moduleid'");	
	$row3 = mysqli_fetch_assoc($sql3);		
	if($moduleid == 2){
		$moduleid = 1;
		$subheadpur = "Purchase of ".$subhead;
		$subheaddescpur = "Purchase of ".$subheaddesc;
		$majorid = 29;
		$sql4 = "INSERT INTO `acc_subhead` (`SubID`, `SubHead`, `SubHeadDesc`, `SubHeadModule`, `MajorID`, `SubHeadEmpID`,`Status`,`InventoryLink`,`timedate`) 
		         VALUES (NULL, '$subheadpur', '$subheaddescpur', '$moduleid', '$majorid', '$user',  1, '$lastid','$timedate')";
		$result4 = $connection->query($sql4) or die(mysqli_error());		
		$subheadsal = "Sale of ".$subhead;
		$subheaddescsal = "Sale of ".$subheaddesc;
		$majorid = 13;
		$sql5 = "INSERT INTO `acc_subhead` (`SubID`, `SubHead`, `SubHeadDesc`, `SubHeadModule`, `MajorID`, `SubHeadEmpID`,`Status`,`InventoryLink`,`timedate`) 
		         VALUES (NULL, '$subheadsal', '$subheaddescsal', '$moduleid', '$majorid', '$user',  1, '$lastid','$timedate')";
		$result5 = $connection->query($sql5) or die(mysqli_error());	
	}
  
  if($moduleid == 2){
    if($result1 && $result4 && $result5){
			$connection->query("commit");
		}
		else{
			$connection->query("rollback");
		}
    
  }
  else {
    if($result1){
			$connection->query("commit");
		}
		else{
			$connection->query("rollback");
		}
  }
  $sql6 = $connection->query("SELECT * FROM acc_subhead WHERE SubID = '$lastid'");
  $row6 = $sql6->fetch_assoc();  
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
                head of accounts
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
            <div class="row">
							<div class="col-md-6 col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div class="col-md-12 ">											
									<div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
											<h3 class="widget-title blue smaller" style="padding-left:1em">
                        New Head Added Sucessfully
											</h3>													
										</div>
                    </div>
                  </div>
                </div>
						</div>
            
						      <div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>MajorHead</label>
                        <input type="text" class="form-control"  value="<?php echo $row2['MajorHead']; ?>" disabled>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Name of the SubHead  </label>
												<input type="text" class="form-control"  value="<?php echo $row6['SubHead']; ?>" disabled>
											</div>
										</div>										
									</div>

									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>SubHead Descritpion</label>
												<input type="text" class="form-control"  value="<?php echo $row6['SubHeadDesc']; ?>" disabled>
											</div>
										</div>                
										<div class="col-md-3">
											<div class="form-group">
												<label>SubHead Module</label>
												<input type="text" class="form-control"  value="<?php echo $row3['ModuleType']; ?>" disabled>
											</div>
										</div>                										
									</div>									
									<div class="row">   
										<div class="col-md-6">
											<div class="form-group label-floating">
												<a href="admin_hoa.php"><button type="button" class="btn btn-info btn-fill"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button></a>
											</div>
										</div>                            
									</div>
              
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php 
	include("footer.php");    
?>			