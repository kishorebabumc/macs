<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_cluster";
	include("adminsidepan.php");
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Add New Cluster
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="admin_cluster_add_suc.php">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Cluster Name</label>

										<div class="col-sm-7">
											<input type="text" id="form-field-1" name="name" placeholder="Enter Cluster Name" class="col-xs-10 col-sm-5" autocomplete="off" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Address</label> 

										<div class="col-sm-7">
											<input type="text" id="form-field-1" name="address" placeholder="Enter Address" class="col-xs-10 col-sm-5" autocomplete="off" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Phone No</label>

										<div class="col-sm-4">
											<input type="text" id="form-field-3" name="mobile" placeholder="mobile no." minlength="10" maxlength="10" class="col-xs-7 col-sm-5" autocomplete="off" required="">
										</div>
									</div>

<!--                   <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Under MACS</label>

										<div class="col-sm-7">
											<select name="macs" class="col-xs-10 col-sm-5" autocomplete="off" required>
                                            </select> 
										</div>
									</div>
 -->
                  
									<div class="clearfix form-group">
										<div class="col-md-offset-3 col-md-9">
											<button id="submit" class="btn btn-success" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>
											<a href="admin_cluster.php"><button class="btn btn-info" type="button">
												<i class="ace-icon fa fa-arrow-left bigger-110"></i>
												Back
											</button></a>											
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