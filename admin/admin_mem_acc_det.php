<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_member";
	include("adminsidepan.php");

  if(isset($_GET['accno'])){
    
    $accno = $_GET['accno'];
    if(substr($accno,0,1) == 'M'){
      $memid = $accno;
    }
    if(substr($accno,0,1) == 'M'){
      $subheadid = 2;
    }
    if(substr($accno,0,1) == 'D'){
      $subheadid = 7;
    }
    if(substr($accno,0,1) == 'L'){
      $subheadid = 9;
    }
    $member = $connection->query("SELECT * FROM members WHERE memid = '$memid'");
    $memberdata = $member->fetch_assoc();
    $groupid = $memberdata['memgroupid'];
    $group = $connection->query("SELECT * FROM groups WHERE GroupID = '$groupid'");
    $groupdata = $group->fetch_assoc();
    $clusterid = $groupdata['ClusterID'];
    $cluster = $connection->query("SELECT * FROM cluster WHERE ClusterID = '$clusterid'");
    $clusterdata = $cluster->fetch_assoc();
    $memaccount = $connection->query("SELECT * FROM acc_cashbook WHERE memid = '$memid' AND subheadid = '$subheadid'");
    $memob = $connection->query("SELECT * FROM acc_mem_ob WHERE memid = '$memid' AND subheadid = '$subheadid'");
    if($memob->num_rows == 0){
      $ob = 0;
    }
    else{
      $memobdata = $memob->fetch_assoc();
      $ob = $memobdata['ob'];
    }
  }
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								 
                <?php 
                  if($subheadid == 2){
                    echo 'Member Share Capital Statement';  
                  }
                  if($subheadid == 7){
                    echo 'Member Savings Deposit Statement';  
                  }
                  if($subheadid == 9){
                    echo 'Member Long Term Loan Statement';  
                  }
                ?>
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
														<span class="editable" id="username"> <?php echo $memberdata['memid']; ?> </span>
													</div>
                          
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Member Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo $memberdata['memname']; ?> </span>
													</div>
												</div>
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Account No </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo $accno; ?> </span>
													</div>
												</div>
                        
                        <div class="profile-info-row">
													<div class="profile-info-name"> Group Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo $groupdata['GroupName']; ?> </span>
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
														<?php 
                              if($subheadid == 2){
                                echo 'Share capital';  
                              }
                              if($subheadid == 7){
                                echo 'Deposits';  
                              }
                              if($subheadid == 9){
                                echo 'Loans';  
                              }
                            ?>
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
																				<th class="center">Trans ID</th>
																				<th class="center">Date</th>
                                        <th class="center">Opening</th>
                                        <th class="center">Receipt</th>
                                        <th class="center">Payment</th>
                                        <th class="center">Closing</th>
                                                                                
                                        
																			</tr>
																		</thead>

																		<tbody>
                                      <?php 
                                        if($memaccount->num_rows > 0){
                                          $slno = 1;
                                          while($rowmemaccount = $memaccount->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td align='center'>".$slno."</td>";
                                            echo "<td align='center'>".$rowmemaccount['TransID']."</td>";
                                            echo "<td align='center'>".date('d-m-Y', strtotime($rowmemaccount['date']))."</td>";
                                            if($slno == 1){
                                              echo "<td align='center'>".$ob."</td>";
                                            }
                                            else{
                                              echo "<td align='center'>".$cb."</td>";
                                            }
                                            $receipt = $rowmemaccount['receiptcash'] + $rowmemaccount['receiptadj'];
                                            $payment = $rowmemaccount['paymentcash'] + $rowmemaccount['paymentadj'];
                                            echo "<td align='center'>".$receipt."</td>";
                                            echo "<td align='center'>".$payment."</td>";
                                            $cb = $ob + $receipt + $payment;
                                            echo "<td align='center'>".$cb."</td></tr>";
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
                        <a href="admin_mem_det.php?memid=<?php echo $memid; ?>"><button class="btn btn-primary" style="float:right;">
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