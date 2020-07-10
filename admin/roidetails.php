<html>
  

<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<title>MACS - Accountant Panel</title>

		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css">

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css">
		<link rel="stylesheet" href="../assets/css/chosen.min.css">
		<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css">
		<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css">
		<link rel="stylesheet" href="../assets/css/daterangepicker.min.css">
		<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="../assets/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css">

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style">

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css">
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css">

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script><style>@keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-moz-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-webkit-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-ms-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-o-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}.ace-save-state{animation-duration:10ms;-o-animation-duration:10ms;-ms-animation-duration:10ms;-moz-animation-duration:10ms;-webkit-animation-duration:10ms;animation-delay:0s;-o-animation-delay:0s;-ms-animation-delay:0s;-moz-animation-delay:0s;-webkit-animation-delay:0s;animation-name:nodeInserted;-o-animation-name:nodeInserted;-ms-animation-name:nodeInserted;-moz-animation-name:nodeInserted;-webkit-animation-name:nodeInserted}</style>
		
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		
		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
 
<body class="no-skin">
		

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
      
 <?php
  include("admin_session.php");
  $_SESSION['curpage']="admin_roi";
  if(isset($_GET['subhead'])){
	  $subhead = $_GET['subhead'];
    $roi = $connection->query("SELECT acc_rateofinterest.*,SubHead FROM acc_rateofinterest,acc_subhead WHERE SubHead = '$subhead' AND SubID = subheadid"); 
	  $roidata = $roi->fetch_assoc();
  }
  else {
		header("location:sessionexpire.php");
	}
 ?>
			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								Rate of interest 
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div>
									<div id="user-profile-1" class="user-profile row">
										
										<div class="col-xs-12 col-sm-9">											

											<div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														ROI Details
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
																				<th class="center">Subhead</th>
																				<th class="center">From date</th>
																				<th class="center">Todate</th>
																				<th class="center">ROI</th>
																			</tr>
																		</thead>

																		<tbody>
																		<?php
                                      $slno = 1;
                                      while($roidata = $liabilitiesroi->fetch_assoc()){
                                          echo "<tr>";
                                          echo "<td align='center'>".$slno."</td>";
                                          echo "<td align='center'>".$roidata['SubHead']."</td>";
                                          echo "<td align='center'>".$roidata['doe']."</td>";
                                          echo "<td align='center'>".$roidata['doe']."</td>";
                                          echo "<td align='center'>".$roidata['roi']."</td></tr>";
                                          $slno = $slno + 1;
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
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->


			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">© Manvi Software Solutions</span>
							MACS Application 
						</span>

						&nbsp; &nbsp;						
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	

			</body>
  </html>