<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_employee";
	include("adminsidepan.php");	
  if(isset($_GET['empid'])){
    $empid = $_GET['empid'];
    $employee = $connection->query("SELECT * FROM employee WHERE empid = '$empid'");
    $empdata = $employee->fetch_assoc();
    $cluster = $connection->query("SELECT ClusterName, cluster.ClusterID FROM cluster, allot WHERE allot.EmpID = '$empid' AND allot.Status = 1 AND allot.ClusterID = cluster.ClusterID");
    $cluscount = $cluster->num_rows;
    $clusterdata = $cluster->fetch_assoc();
  }
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Employee Profile Page
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
                          <?php 
                            if($empdata['empgender'] == 'male')
                              echo "<img id='avatar' class='editable img-responsive'' alt='Alex's Avatar' src='../assets/images/avatars/avatar4.png'>";
                            else
                              echo "<img id='avatar' class='editable img-responsive'' alt='Alex's Avatar' src='../assets/images/avatars/avatar3.png'>";
                          ?>
													
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?php echo $empdata['empname']; ?></span>
														</a>													
													</div>
												</div>
											</div>

											<div class="space-6"></div>																						

											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-9">											

											<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Employee ID </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo $empdata['empid']; ?> </span>
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Employee Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo $empdata['empname']; ?> </span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Date of Birth </div>

													<div class="profile-info-value">
														<span class="editable" id="age"><?php echo $empdata['empdob']; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Address </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?php echo $empdata['empaddress']; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Mobile </div>

													<div class="profile-info-value">
														<span class="editable" id="login"><?php echo $empdata['empmobile']; ?> </span>
													</div>
												</div>												
											</div>

											<div class="space-20"></div>

											<div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Clusters Assigned
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
																				<th class="center">Name of the Cluster</th>
																				<th class="center">Status</th>																				
																			</tr>
																		</thead>

																		<tbody>
                                      <?php 
                                        if($cluscount > 0){
                                          echo "<tr>";
                                          echo "<td class='center'>1</td>";
                                          echo "<td class='center'>".$clusterdata['ClusterName']."</td>";
                                          echo "<td class='center'><a href='admin_cluster_allot_close.php?empid=".$empid."&&clusterid=".$clusterdata['ClusterID']."' ><i class='ace-icon fa fa-times orange'></a></td>";
																		      echo "</tr>";    
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