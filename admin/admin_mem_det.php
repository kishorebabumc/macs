<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_member";
	include("adminsidepan.php");

  if(isset($_GET['memid'])){
    $memid = $_GET['memid'];
    $member = $connection->query("SELECT * FROM members WHERE memid = '$memid'");
    $memberdata = $member->fetch_assoc();
    $groupid = $memberdata['memgroupid'];
    $group = $connection->query("SELECT * FROM groups WHERE GroupID = '$groupid'");
    $groupdata = $group->fetch_assoc();
    $clusterid = $groupdata['ClusterID'];
    $cluster = $connection->query("SELECT * FROM cluster WHERE ClusterID = '$clusterid'");
    $clusterdata = $cluster->fetch_assoc();
    $sharecapital = $connection->query("SELECT * FROM acc_sharecapital WHERE memid = '$memid'");
    $deposits = $connection->query("SELECT * FROM acc_deposits WHERE memid = '$memid'");
    $loans = $connection->query("SELECT * FROM acc_loans WHERE memid = '$memid'");
  }
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								 Member Details
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
													<div class="profile-info-name"> Member ID </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $memberdata['memid']; ?> </span>
													</div>
                          
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Member Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $memberdata['memname']; ?></span>
													</div>
												</div>
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Group Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $groupdata['GroupName']; ?></span>
													</div>
												</div>
                        
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Cluster Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo $clusterdata['ClusterName']; ?> </span>
													</div>
												</div>
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Mobile No </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo $memberdata['memphone']; ?> </span>
													</div>
												</div>

											</div>

											<div class="space-20"></div>

											<div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Share Capital 
													</h4>													
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
																				<th class="center">Member ID</th>
																				<th class="center">Total Share Capital</th>													
                                        
																			</tr>
																		</thead>

																		<tbody>
                                      <?php 
                                        if($sharecapital->num_rows > 0){
                                          $slno = 1;
                                          while($rowshare = $sharecapital->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td align='center'>".$slno."</td>";
                                            echo "<td align='center'><a href='admin_mem_acc_det.php?accno=".$rowshare['memid']."'>".$rowshare['memid']."</a></td>";
                                            echo "<td align='center'>".$rowshare['balance']."</td>";
                                            $slno = $slno + 1;
                                          }
                                        }
                                      ?>
																		</tbody>
																	</table>																				
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

                      <div class="widget-box transparent">
												<div class="widget-header widget-header-small" style = "text-align:left;" >
													<h4 class="widget-title blue smaller" align ="left">
														<i class="ace-icon fa fa-rss orange"></i>
														Deposits 
													</h4>
                          
<!-- 														<button class="btn btn-primary" style = "float:right;" >
                              New Deposit
                             </button>   -->
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
																				<th class="center">Type of Deposit</th>
																				<th class="center">Deposit Number</th>													
                                        <th class="center">Balance</th>
                                        <th class="center">Status</th>
                                        
																			</tr>
																		</thead>

																		<tbody>
                                      <?php 
                                        if($deposits->num_rows > 0){
                                          $slno = 1;
                                          while($rowdeposits = $deposits->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td align='center'>".$slno."</td>";
                                            $subid = $rowdeposits['subheadid'];
                                            $subhead = $connection->query("SELECT * FROM acc_subhead WHERE SubID = '$subid'");
                                            $deposittype = $subhead->fetch_assoc();
                                            echo "<td align='center'>".$deposittype['SubHead']."</td>";
                                            echo "<td align='center'><a href='admin_mem_acc_det.php?accno=".$rowdeposits['depositno']."&amp;memid=".$memid."'>".$rowdeposits['depositno']."</a></td>";
                                            echo "<td align='center'>".$rowdeposits['cb']."</td>";
                                            if($rowdeposits['status'] == 1){
                                              echo "<td align='center'>Active</td></tr>";
                                            }
                                            else{
                                              echo "<td align='center'>Closed</td></tr>";
                                            }
                                            $slno = $slno + 1;
                                          }
                                        }
                                      ?>
																																				
																		</tbody>
																	</table>																				
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
                      
                       <div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Loans 
													</h4>					
                          
<!--                           <button class="btn btn-primary" style = "float:right;" >
                              New Loan
                            </button>  
												</div>
                         -->
												<div class="widget-body">
													<div class="widget-main padding-8">
														<div id="profile-feed-1" class="profile-feed">
															<div class="profile-activity clearfix">
																<div>
												
																	<table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
																		<thead>
																			<tr>													
																				<th class="detail-col">S.No.</th>
																				<th class="center">Type of Loan</th>
																				<th class="center">Loan Number</th>													
                                        <th class="center">Date of Issue</th>													
                                        <th class="center">Total Loan</th>													
                                        <th class="center">Balance</th>	
                                        <th class="center">Status</th>
                                        
																			</tr>
																		</thead>

																		<tbody>
                                      <?php 
                                        if($loans->num_rows > 0){
                                          $slno = 1;
                                          while($rowloans = $loans->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td align='center'>".$slno."</td>";
                                            $subid = $rowloans['subheadid'];
                                            $subhead = $connection->query("SELECT * FROM acc_subhead WHERE SubID = '$subid'");
                                            $loantype = $subhead->fetch_assoc();
                                            echo "<td align='center'>".$loantype['SubHead']."</td>";
                                            echo "<td align='center'><a href='admin_mem_acc_det.php?accno=".$rowloans['loanno']."&amp;memid=".$memid."'>".$rowloans['loanno']."</a></td>";
                                            echo "<td align='center'>".$rowloans['dateofissue']."</td>";
                                            echo "<td align='center'>".$rowloans['ob']."</td>";
                                            echo "<td align='center'>".$rowloans['cb']."</td>";
                                            if($rowloans['status'] == 1){
                                              echo "<td align='center'>Active</td></tr>";
                                            }
                                            else{
                                              echo "<td align='center'>Closed</td></tr>";
                                            }
                                            $slno = $slno + 1;
                                          }
                                        }
                                      ?>
																																					
																		</tbody>
																	</table>																				
																</div>
															</div>
														</div>
													</div>
												</div>
                          <a href="admin_member.php"><button class="btn btn-primary" style="float:right;">
                            <i class="fa fa-arrow-left" style="margin-right:10px;"></i>Back</button></a>
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