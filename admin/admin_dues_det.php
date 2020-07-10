<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_dues";
	include("adminsidepan.php");

  if(isset($_GET['duesid'])){
    $duesid = $_GET['duesid'];
    $dues = $connection->query("SELECT * FROM acc_dues WHERE duesid = '$duesid'");
    $duesdata = $dues->fetch_assoc();
  }
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								 Dues
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div>
									<div id="user-profile-1" class="user-profile row">
										
										<div class="col-xs-12 col-sm-10">											

											<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">											
												
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Due Head </div>

													<div class="profile-info-value">
														<span class="editable" id="duesnsme"><?php echo $duesdata['duesname'];?></span>
													</div>
												</div>
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Type of Due </div>

													<div class="profile-info-value">
														<span class="editable" id="duestype"><?php if($duesdata['duestype'] == 1){ echo 'Due To/ Sundry Debtor';} else{echo 'Due To/ Sundry Creditor';}  ?></span>
													</div>
												</div>
                        
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Details </div>

													<div class="profile-info-value">
														<span class="editable" id="details"><?php echo $duesdata['details'];?></span>
													</div>
												</div>
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Remarks </div>

													<div class="profile-info-value">
														<span class="editable" id="remarks"><?php echo $duesdata['remarks'];?></span>
													</div>
												</div>
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Due Amount </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo 'Rs.'.$duesdata['balance'];?></span>
													</div>
												</div>

											</div>

											<div class="space-20"></div>

											<div class="widget-box transparent">
												<div class="widget-header widget-header-small">													
                          <span style="float:left"><a href="admin_dues_receipt.php?duesid=<?php echo $duesid;?>"><button class="btn btn-primary">
                              Receipt
                          </button></a></span>                          
                          <span style="float:right"><a href="admin_dues_payment.php?duesid=<?php echo $duesid;?>"><button class="btn btn-primary">
                              Payment
                          </button></a></span>
												</div>

												<div class="widget-body">
													<div class="widget-main padding-8">
														<div id="profile-feed-1" class="profile-feed">
															<div class="profile-activity clearfix">
																<div>
												
																	<table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
																		<thead>
																			<tr>													
																				<th class="detail-col">S.No.</th>
																				<th class="center">Trans ID</th>
																				<th class="center">Date</th>
                                        <th class="center">Opening</th>
                                        <th class="center">Receipt</th>
                                        <th class="center">Payment</th>
                                        <th class="center">Closing</th>											
                                        
																			</tr>
																		</thead>

																		<tbody>
																																					
																		</tbody>
																	</table>																				
																</div>
															</div>
														</div>
													</div>
												</div>
                        <a href="admin_dues.php"><button class="btn btn-primary" style="float:right;">
                            <i class="fa fa-arrow-left" style="margin-right:10px;"></i>Back
                          </button></a>
											</div>

                                      
                      
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php 
	include("footer.php");    
?>			