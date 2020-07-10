<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_cashtr";
	include("adminsidepan.php");	
  $clusters = $connection->query("SELECT * FROM cluster WHERE ClusterID != 'C100'");
  $clusbal = $connection->query("SELECt  Balance FROM acc_cluster_balance WHERE ClusterID = 'C100'");	
  $clusbal = $clusbal->fetch_assoc();
  $clusbal = $clusbal['Balance'];
  
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Cash Transfer
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
                
							  <form action="president_cash_transfer.php" method="post">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Select Cluster </label>
												<select name="cluster" class="js-example-basic-single form-control" required="">
                           <?php 
                              if($clusters->num_rows > 0){
                                while($row = $clusters->fetch_assoc()){
                                  echo "<option  value=".$row['ClusterID'].">".$row['ClusterName']."</option>";                                  
                                }
                              }
                            ?>
												</select>
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Details </label>
												<input type="text" class="form-control" name="details" required="">
											</div>
										</div>	
                    
                    <div class="col-md-3">
											<div class="form-group">
												<label>Cash Balance </label>
												<input type="text" class="form-control" value="<?php echo $clusbal; ?>" id="cashbalance" name="cashbalance" readonly="">
											</div>
										</div>	
                    
                    <div class="col-md-3">
											<div class="form-group">
												<label>Amount </label>
												<input type="text" class="form-control" name="amount" id="amount" required="">
												
											</div>
										</div>
									</div>

									<div class="row">   
										<div class="col-md-8">
											
										</div>										
										<div class="col-md-4">
											<div class="form-group label-floating">												
												
												<button type="submit" id="submit" class="btn btn-info btn-fill pull-right" disabled=""><i class="fa fa-check" aria-hidden="true" style="padding-right:5px"></i>Submit</button>
											</div>
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