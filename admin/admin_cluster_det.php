<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_cluster";
	include("adminsidepan.php");

  if(isset($_GET['clusterid'])){
    $clusterid = $_GET['clusterid'];
    $cluster = $connection->query("SELECT * FROM cluster WHERE ClusterID = '$clusterid'");
    $clusterdata = $cluster->fetch_assoc();
    $group = $connection->query("SELECT * FROM groups WHERE ClusterID = '$clusterid'");
        
    $employee = $connection->query("SELECT allot.*,empname FROM allot,employee WHERE ClusterID = '$clusterid' AND allot.EmpID = employee.empid AND allot.status = 1");
    
    $empassign = $connection->query("SELECT * FROM employee");
  }
?>

			<div class="main-content">
				<div class="main-content-inner">					
						<div class="page-content">
						<div class="page-header">
							<h1>
								 Cluster Details
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
													<div class="profile-info-name"> Cluster ID </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $clusterdata['ClusterID'];?></span>
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Cluster Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username"> <?php echo $clusterdata['ClusterName'];?> </span>
													</div>
												</div>
											</div>

											<div class="space-20"></div>

											<div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Groups Under <?php echo $clusterdata['ClusterName'];?> Cluster
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
																				<th class="center">Group ID</th>
																				<th class="center">Group Name</th>													
																				<th class="center">No of Members in Group</th>
                                        <th class="center">Leave</th>
                                        
																			</tr>
																		</thead>
																		<tbody>
                                      <?php
                                      if($group->num_rows > 0){
                                        $slno = 1;
                                        while($row = $group->fetch_assoc()){
                                          $groupid = $row['GroupID'];
                                          echo "<tr>";
                                          echo "<td align='center'>".$slno."</td>";
                                          echo "<td align='center'><a href='admin_group_det.php?groupid=".$groupid."'>".$row['GroupID']."</a></td>";
                                          echo "<td align='center'>".$row['GroupName']."</td>";
                                          $members = $connection->query("SELECT * FROM members WHERE memgroupid = '$groupid'");
                                          echo "<td align='center'>".$members->num_rows."</td>";
                                          echo "<td class='center'><a href='admin_cluster_group_allot_close.php?groupid=".$groupid."&amp;&amp;clusterid=".$clusterdata['ClusterID']."<i='' class='ace-icon fa fa-times orange'></a></td></tr>"; 
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
                      
											<div class="space-6"></div>
                      <div class="widget-header widget-header-small">
                        <h4 class="widget-title blue smaller">
                          Assign Group
                        </h4>													
											</div>
                      
                      <div class="content table-responsive table-full-width">
                       <table class="table ">											
                        <tbody>
                          <tr> <form action="admin_cluster_group_allot.php" method="post"></form>
                            <td>
                              <select name="groupid" class="form-control" required="">
                                
                                                              </select>
                              <input type="hidden" name="clusterid" value="<?php echo $clusterdata['ClusterID'];?>"> 
                            </td>
                            <td><button type="submit" class="btn btn-info btn-fill">Assign Group</button></td>                            													
                            
                          </tr>
                        </tbody>
                      </table>
                      </div>

                      <div class="space-6"></div>
                      
                      
                      
                      
                      <div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-user orange"></i>
														Woking Employee
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
																				<th class="center">Employee ID</th>
																				<th class="center">Employee Name</th>													
																				<th class="center">From</th>
                                        <th class="center">Leave</th>
																			</tr>
																		</thead>

																		<tbody>
                                      <?php
                                        if($employee->num_rows > 0){
                                          $slno = 1;
                                          while($rowemployee = $employee->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td align='center'>".$slno."</td>";
                                            echo "<td align='center'>".$rowemployee['EmpID']."</td>";
                                            echo "<td align='center'>".$rowemployee['empname']."</td>";
                                            echo "<td align='center'>".$rowemployee['DOE']."</td>";
                                            echo "<td class='center'><a href='admin_cluster_allot_close.php?empid=".$rowemployee['EmpID']."&amp;&amp;clusterid=".$rowemployee['ClusterID']." <i='' class='ace-icon fa fa-times orange'></a></td></tr>";																			
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
											<div class="space-6"></div>

                      <div class="widget-header widget-header-small">
                        <h4 class="widget-title blue smaller">
                          Assign Employees
                        </h4>													
											</div>
                      
                      <div class="content table-responsive table-full-width">
                       <table class="table ">											
                        <tbody>
                          <tr> <form action="admin_cluster_allot.php" method="post"></form>
                            <td>
                              <select name="empassign" class="form-control" style="width:230px">
                                <option></option>
                                <?php while ($rowassign = $empassign->fetch_assoc()) 												
                                  echo "<option value ='".$rowassign['empid']."'>".$rowassign['empname']."</option>";								
                                 ?>
                              </select>
                              <input type="hidden" name="clusterid" value="<?php echo $clusterdata['ClusterID'];?>"> 
                            </td>
                            <td><button type="submit" class="btn btn-info btn-fill">Assign Employee</button></td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
											<div class="space-6"></div>
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