<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_dues";
	include("adminsidepan.php");

  if(isset($_GET['type'])){
    $duestype = $_GET['type'];
  }
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
                Add <?php if($duestype == 1){ echo 'Due to ';} else{echo 'Due by ';}?>Head: 								
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" method="post" action="admin_dues_add_suc.php">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">Head Name</label>
										
										<div class="col-sm-7">
											<input type="text" id="form-field-1" name="head" placeholder="Enter Head Name" class="col-xs-10 col-sm-5" autocomplete="off" required />
                      <input type="hidden" name="id" value="1" />
										</div>
										
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Details </label>

										<div class="col-sm-7">
											<textarea type="text" id="form-field-3" name="details" placeholder="Enter details"  class="col-xs-7 col-sm-5" autocomplete="off" ></textarea>
										</div>
									</div>
                  
                  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Remarks </label>

										<div class="col-sm-7">
											<textarea type="text" id="form-field-3" name="remarks" placeholder="Enter Remarks"  class="col-xs-7 col-sm-5" autocomplete="off" ></textarea>
										</div>
									</div>
                  
									<div class="clearfix form-group">
										<div class="col-md-offset-3 col-md-9">
                      <button id='submit' class='btn btn-success' type='submit'>
                                  <i class='ace-icon fa fa-check bigger-110'></i>
                                  Submit
                                </button>											
											<a href="admin_dues.php"><button class="btn btn-info" type="button">
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