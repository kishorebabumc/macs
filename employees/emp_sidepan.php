<?php 

 		$user = $_SESSION['login_user']; 
    $emp = $connection->query("SELECT empname FROM employee WHERE empid = '$user'");
    $emp = $emp->fetch_assoc();
 		$cluster = $connection->query("SELECT ClusterName FROM cluster, allot WHERE EmpID = '$user' AND allot.ClusterID = cluster.ClusterID AND allot.status = 1");
    $cluster = $cluster->fetch_assoc();
    $macs = $connection->query("SELECT name FROM master");
    $macs = $macs->fetch_assoc();
    $macs = $macs['name'];
    $today = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MACS - Employee Panel</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/chosen.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-colorpicker.min.css" />
		<link rel="stylesheet" href="../assets/css/popup.css" />
		<link rel="stylesheet" href="../assets/css/popup1.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
		<link rel="icon" href="../bank.ico" type="image/ico">
		
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script>
		
		<script src="../assets/js/jquery-2.1.4.min.js"></script>
		<script src="../assets/js/jquery-ui.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
	<script>
		// Set the date we're counting down to
		var sessiontime ='<?php echo $_SESSION['expire'];?>';
		var now = '<?php echo time();?>';		
		// var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

		// Update the count down every 1 second
		var x = setInterval(function timer() {

			// Get todays date and time
			
			
			// Find the distance between now an the count down date
			var distance = sessiontime - now;
			now = now *1;
			now = now + 1;
			// Time calculations for days, hours, minutes and seconds
			var minutes = Math.floor((distance % (60 * 60)) / ( 60));
			var seconds = Math.floor((distance % (60)) );
			
			// Output the result in an element with id="demo"
			   document.getElementById("session").innerHTML = "Session Expires in " +  minutes + "m " + seconds + "s " ;
			// If the count down is over, write some text 
			if(distance <=0 ){
				alert("Your Session Expired");
				clearInterval(x);
				window.location.href = "sessionexpire.php";
			}
			
		}, 1000);		
	</script>
		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-bank"></i>
							<?php echo $macs; ?> - <?php echo $cluster['ClusterName']; ?> Cluster : <?php echo $today; ?>
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">						

						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span id="session" style="padding:20px">  </span>								
							</a>							
						</li>
						
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../assets/images/avatars/profile-pic.jpg" alt="Jason's Photo" />								
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $emp['empname']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="president_pass_change.php">
										<i class="ace-icon fa fa-cog"></i>
										Change Password
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
				    
					<li <?php if($_SESSION['curpage']=="employee"){echo "class = 'active'";} ?>>
						<a href="clerk.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>					

					<li <?php if($_SESSION['curpage']=="accounts_ddo"){echo "class = 'active'";} ?>>
						<a href="accounts_ddo.php">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Members </span>
						</a>
						<b class="arrow"></b>
					</li>

					<li <?php if($_SESSION['curpage']=="accounts_member"){echo "class = 'active'";} ?>>
						<a href="accounts_member.php">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Groups </span>
						</a>
						<b class="arrow"></b>
						
					</li>
					
					<li <?php if($_SESSION['curpage']=="accounts_hoa"){echo "class = 'active'";} ?>>
						<a href="accounts_hoa.php">
							<i class="menu-icon fa fa-inr"></i>
							<span class="menu-text"> Cash Transfer </span>
						</a>
						<b class="arrow"></b>
						
					</li>
					
					<li <?php if($_SESSION['curpage']=="accounts_ledgersetup"){echo "class = 'active'";} ?>>
						<a href="accounts_ledgersetup.php">
							<i class="menu-icon fa fa-calculator"></i>
							<span class="menu-text"> Cash Book </span>
						</a>
						<b class="arrow"></b>						
					</li>
					
					<li <?php if($_SESSION['curpage']=="accounts_newaccount" || $_SESSION['curpage']=="accounts_viewaccount" || $_SESSION['curpage']=="accounts_statement" ){echo "class = 'open'";} ?>>
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-bar-chart"></i>
							<span class="menu-text"> Reports </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if($_SESSION['curpage']=="accounts_newaccount"){echo "class = 'active'";} ?>>
								<a href="accounts_newaccount.php">
									<i class="menu-icon fa fa-arrow-left"></i>
									Cash Book
								</a>

								<b class="arrow"></b>
							</li>
							<li <?php if($_SESSION['curpage']=="accounts_viewaccount"){echo "class = 'active'";} ?>>
								<a href="accounts_viewaccount.php">
									<i class="menu-icon fa fa-history"></i>
									Receipts & Payments
								</a>

								<b class="arrow"></b>
							</li>
							
							<li <?php if($_SESSION['curpage']=="accounts_statement"){echo "class = 'active'";} ?>>
								<a href="accounts_statement.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Ledger
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>	
					</li>
					
					
					
					<li <?php if($_SESSION['curpage']=="accounts_profit"){echo "class = 'active'";} ?>>
						<a href="accounts_profit.php">
							<i class="menu-icon fa fa-arrow-left"></i>
							<span class="menu-text"> Back Date </span>
						</a>
						<b class="arrow"></b>						
					</li>
          
          <li <?php if($_SESSION['curpage']=="accounts_profit"){echo "class = 'active'";} ?>>
						<a href="accounts_profit.php">
							<i class="menu-icon fa fa-history"></i>
							<span class="menu-text"> Opening Balances </span>
						</a>
						<b class="arrow"></b>						
					</li>

					
					

					<li <?php if($_SESSION['curpage']=="logout"){echo "class = 'active'";} ?>>
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>

							<span class="menu-text">
								Logout
							</span>
						</a>
						<b class="arrow"></b>
						
					</li>
					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			