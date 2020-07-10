<?php	  
	include("emp_session.php");
	$_SESSION['curpage']="emp_member";
	include("emp_sidepan.php");
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								Members 
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
                  <a href="emp_mem_rec.php"><button class="btn btn-success">Receipt</button></a>									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
							    <div class="row">
										<div class="col-md-3">
									 		<p style="padding:12px">
                        <a href="emp_mem_new.php"><button class="btn btn-success">Add New Member</button></a>
                      </p>		
										</div>
										<div class="col-md-9">
										 	<form role="form" method="post" action="">
												<button class="btn btn-search" type="submit" style="float:right;height:42px;margin-right:2px; margin-top:15px;"><i class="ace-icon fa fa-search bigger-120"></i></button>
												<input type="text" id="memsearch" name="memsearch" style="float:right;height:42px; margin-top:15px;" placeholder="Search" class="col-xs-4 col-sm-2" autocomplete="off" required="">
											</form>													
										</div>
								</div>								
								
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>													
													<th class="detail-col">Sl.No.</th>
													<th class="detail-col">Member ID</th>
													<th class="left">Member Name</th>
													<th class="center">Address</th>
													<th class="center">Mobile No.</th>
													<th class="left">GroupName</th>
													<th class="center">ClusterName</th>
													<th class="center" width="50px">Edit</th>
<!-- 													<th class="center" width="50px">Delete</th> -->
												</tr>
											</thead>

											<tbody>
											  <tr>
                          <td class="center">1</td>
                          <td><a href="emp_mem_det.php?memid=M101">M101</a></td>
                          <td>V Vijaya Kumari</td>
                          <td class="center">Singh Nagar</td>
                          <td>9849955351</td>
                          <td>Ganga Group</td>
                          <td class="center">Marymatha</td>
                          <td class="center">
															  <a href="emp_mem_edit.php?memid=M101">
															  <button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															  </button>
															  </a>							  
													 </td>
                        </tr>                        
											</tbody>
										</table>
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