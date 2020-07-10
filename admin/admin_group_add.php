<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_group";
	include("adminsidepan.php");

  $sql1 = $connection->query("SELECT * FROM cluster");
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								Add New Group
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="admin_group_add_suc.php">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Group Name</label>

										<div class="col-sm-7">
											<input type="text" id="form-field-1" name="name" placeholder="Enter Group Name" class="col-xs-10 col-sm-5" autocomplete="off" required />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Address</label> 

										<div class="col-sm-7">
                      <textarea type="text" id="form-field-1" name="address" placeholder="Enter Address" class="col-xs-10 col-sm-5" autocomplete="off" required ></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Phone No</label>

										<div class="col-sm-4">
											<input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile no." minlength="10" maxlength="10" style="width:270px;" required >
												<div id = "mobilestatus">Mobile number already exits</div>
                    </div>
									</div>

                  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Under Cluster</label>

										<div class="col-sm-7">
											<select name="clusterid" class="col-xs-10 col-sm-5">
													<option></option>
													<?php while ($row1 = $sql1->fetch_assoc()) 												
														echo "<option value ='".$row1['ClusterID']."'>".$row1['ClusterName']."</option>";								
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
											<a href="admin_group.php"><button class="btn btn-info" type="button">
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

<!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

  

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	

	
<script>		
		$(document).ready(function()
		{ 	$("#mobilestatus").hide();
			$('#mobile').keyup(function() 
			{   
				var mobile = $("#mobile").val();					
				if(mobile.length <= 10 )
				{
					$.ajax({  
						type: "POST",  
						url: "mobilecheck.php",  
						data: "mobile="+ mobile, 
						success: function(count){ 																				
							if(count == 1)
 							{	
								$("#mobilestatus").show();								
								$("#submit").addClass("disabled");
							}  
							else {
								$("#mobilestatus").hide();								
								$("#submit").removeClass("disabled");
							}								
						} 
					}); 
				}				
			return false;
			});			
		});
</script>

<script>
    $(document).ready(function(){
        $('#mobile').keypress(function(e) {
	      if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
        })
        .on("cut copy paste",function(e){
	   	  e.preventDefault();
        });
    });
</script>