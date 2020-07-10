<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_group";
	include("adminsidepan.php");

  if(isset($_GET['groupid'])){
    $groupid = $_GET['groupid'];
    $group = $connection->query("SELECT * FROM groups WHERE GroupID = '$groupid'");
    $groupdata = $group->fetch_assoc();
    $members = $connection->query("SELECT * FROM members WHERE memgroupid = '$groupid'");
  }
?>

			<div class="main-content">
				<div class="main-content-inner">					
						<div class="page-content">
						<div class="page-header">
							<h1>
								 Group Details
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
													<div class="profile-info-name">GroupID</div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $groupdata['GroupID'];?></span>  
													</div>
												</div>
                        <div class="profile-info-row">
													<div class="profile-info-name"> Group Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $groupdata['GroupName'];?></span>
													</div>
												</div>
											</div>

											<div class="space-20"></div>

											<div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Members Under <?php echo $groupdata['GroupName'];?> group
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
																				<th class="center">MemberID</th>
																				<th class="center">Member Name</th>													
																				<th class="center">Address</th>
                                        <th class="center">Mobile no.</th>
                                        
																			</tr>
																		</thead>
																		<tbody>
                                    <?php  
                                      if($members->num_rows > 0){
                                          $slno = 1;
                                          while($row = $members->fetch_assoc()){
                                          echo "<tr>";
                                          echo "<td align='center'>".$slno."</td>";
                                          echo "<td align='center'><a href='admin_mem_det.php?memid=".$row['memid']."'>".$row['memid']."</a></td>";  
                                          //echo "<td align='center'>".$row['memid']."</td>";
                                          echo "<td align='center'>".$row['memname']."</td>";
                                          echo "<td align='center'>".$row['memaddress']."</td>";
                                          echo "<td align='center'>".$row['memphone']."</td></tr>";
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
                      
											
                                      
                      
                      
                      
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.main-content -->

<?php 
	include("footer.php");    
?>			