<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_hoa";
	include("adminsidepan.php");

  $sql2 = $connection->query("SELECT * FROM acc_subhead_module"); 
  if(isset($_GET['head'])){
	  $head = $_GET['head'];
	  if($head == 1){
		  $sql1 = $connection->query("SELECT * FROM `acc_majorheads` WHERE MainID = 1 OR MainID = 3 OR MainID = 5");		
	  }
	  else if ($head == 2){
		  $sql1 = $connection->query("SELECT * FROM `acc_majorheads` WHERE MainID = 2 OR MainID = 4 OR MainID = 6");
	  }
	  else {
		  header("location:sessionexpire.php");
	  }
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
								Add New Head
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="admin_hoa_add_suc.php">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">SubHead</label>
										
										<div class="col-sm-7">
											<input type="text" id="form-field-1" name="subhead" placeholder="Enter SubHead" class="col-xs-10 col-sm-5" autocomplete="off" required />
										</div>
										
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Details </label>

										<div class="col-sm-7">
											<textarea type="text" id="form-field-3" name="subheaddesc" placeholder="Enter details"  class="col-xs-7 col-sm-5" autocomplete="off" ></textarea>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-4">Ledger Module </label>

										<div class="col-sm-7">
											<select name="moduleid" class="form-control" style="width:270px;">
													<option></option>
													<?php while ($row2 = $sql2->fetch_assoc()) 												
														echo "<option value ='".$row2['ModuleID']."'>".$row2["ModuleType"]."</option>";								
													 ?>
												</select>
										</div>
									 </div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">MajorHead </label>

										<div class="col-sm-9">
                      <select name="majorid" class="form-control" style="width:270px;">
													<option></option>
													<?php while ($row1 = $sql1->fetch_assoc()) 												
														echo "<option value ='".$row1['MajorID']."'>".$row1["MajorHead"]."</option>";								
													 ?>
												</select>
										</div>
									</div>
									
									<div class="clearfix form-group">
										<div class="col-md-offset-3 col-md-9">
											<button id="submit" class="btn btn-success" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
											<a href="admin_hoa.php"><button class="btn btn-info" type="button">
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