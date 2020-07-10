<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_employee";
	include("adminsidepan.php");	
  if(isset($_GET['empid'])){
    $empid = $_GET['empid'];
    $employee = $connection->query("SELECT * FROM employee WHERE empid = '$empid'");
    $row = $employee->fetch_assoc();
    $cluster = $connection->query("SELECT * FROM allot WHERE empid ='$empid' AND Status = 1");
    $clustercount = $cluster->num_rows;
  }
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Terminate Employee
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="admin_emp_ter_suc.php">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee ID </label>

										<div class="col-sm-7">
											<input type="text" id="form-field-1" value="<?php echo $row['empid']; ?>" class="col-xs-10 col-sm-5" disabled="">
											<input type="hidden" id="form-field-1" value="<?php echo $row['empid']; ?>" name="empid" class="col-xs-10 col-sm-5">		
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
                      <?php 
                        if($clustercount > 0){
                          echo "<button class='btn btn-danger' type='submit' disabled=''>
                                <i class='ace-icon fa fa-close bigger-110'></i>
                                Terminate
                              </button>";                        
                        }
                        else{
                          echo "<button class='btn btn-danger' type='submit' onclick='return confirm(\"Are you sure to terminate Employee, there is no revert!\")'>
                                <i class='ace-icon fa fa-close bigger-110'></i>
                                Terminate
                              </button>";                        
                        }                        
                        
											?>
											<a href="admin_employee.php"><button class="btn btn-info" type="button">
												<i class="ace-icon fa fa-arrow-left bigger-110"></i>
												Back
											</button></a>	
                      <?php 
                        if($clustercount > 0){
                          echo "<span style='color:red;'>First you have remove Employee from Cluster assignment</span>";
                        }
                      ?>
                      
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