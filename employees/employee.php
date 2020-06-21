<?php	  
	include("emp_session.php");
	$_SESSION['curpage']="employee";
	include("emp_sidepan.php");
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								Dash Board
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
              <div class="col-md-7 col-xs-12"> <!-- PAGE CONTENT BEGINS -->	
                <div class="col-md-12 ">
                  <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                      <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-rss orange"></i>
                        Cash Book 
                      </h4>													
                    </div>
                    <div class="widget-body">
                      <div class="widget-main padding-8">
                        <div id="profile-feed-1" class="profile-feed">
                          <div class="profile-activity clearfix">								
                            <table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
                              <thead>
                                <tr>														
                                  <th rowspan="2" style="text-align: center;">Transaction ID</th>														
                                  <th colspan="2" style="text-align: center;">Cash</th>
                                  <th colspan="2" style="text-align: center;">Adjustment</th>														
                                </tr>
                                  <tr><th style="text-align: center;">Receipt</th>
                                  <th style="text-align: center;">Payment</th>
                                  <th style="text-align: center;">Receipt</th>
                                  <th style="text-align: center;">Payment</th>
                                </tr>                                      
                                                </thead>	
                              <tbody>
                                <tr>																
                                  <td><b>Opening Balance</b></td>                                
                                  <td align="right"><b>890.00</b></td>																                                																
                                  <td></td>
                                  <td></td>
                                  <td></td>																
                                </tr>
                                <tr>																
                                  <td><b>Closing Balance</b></td>																
                                  <td></td>
                                  <td align="right"><b>890.00</b></td>																                                
                                  <td></td>																
                                  <td></td>																
                                </tr>
                                <tr>																
                                  <td><b>Grand Total</b></td>
                                  <td align="right"><b>890.00</b></td>
                                  <td align="right"><b>890.00</b></td>
                                  <td align="right"><b>0.00</b></td>
                                  <td align="right"><b>0.00</b></td>																
                                </tr>
                              </tbody>
                            </table>	
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-12 ">
                  <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                      <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-rss orange"></i>
                        Cash Transfers Pending 
                        <small><a href="accounts_cash_transfer_all.php"> view all Cash Transfers </a></small>
                      </h4>													
                    </div>
                    <div class="widget-body">
                      <div class="widget-main padding-8">
                        <div id="profile-feed-1" class="profile-feed">
                          <div class="profile-activity clearfix">
                            <table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
                              <thead>
                                <tr>														
                                  <th style="text-align: center;">Sl.No</th>
                                  <th style="text-align: center;">Transfer ID</th>
                                  <th style="text-align: center;">Transfer Type</th>
                                  <th style="text-align: center;">Office Name</th>
                                  <th style="text-align: center;">Date</th>
                                  <th style="text-align: center;">Amount</th>                                                                                
                                </tr>
                              </thead>	
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><a href="accounts_cash_transfer_view.php?cashid=Cash1013"><button class'btn-primary'="">Cash1013</button></a></td>
                                  <td>Cash Sent</td>
                                  <td>Head Office</td>
                                  <td>2020-06-17</td>
                                  <td align="right">90.00</td>
                                </tr>
                              </tbody>
                            </table>																				
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-5 col-xs-12"> <!-- PAGE CONTENT BEGINS -->
                <div class="col-md-12 ">											
                  <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                      <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-rss orange"></i>
                        Group wise deposit balances                            
                      </h4>													
                    </div>
                    <div class="widget-body">
                      <div class="widget-main padding-8">
                        <div id="profile-feed-1" class="profile-feed">
                          <div class="profile-activity clearfix">
                            <table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
                              <thead>
                                <tr>														
                                  <th style="text-align: center;">Sl.No</th>                                        
                                  <th style="text-align: center;">Group Name</th>
                                  <th style="text-align: center;">Balance</th>														                                        													
                                </tr>
                                                </thead>	
                              <tbody>
                                <tr>
                                  <td align="center">1</td>
                                  <td align="left">Ganga Group</td>
                                  <td align="right">1,400.00</td>
                                </tr>
                                <tr>
                                  <td align="center">2</td>
                                  <td align="left">Sujatha SHG</td>
                                  <td align="right">300.00</td>
                                </tr>
                                <tr>
                                  <td align="center"></td>
                                  <td align="left">Total</td>
                                  <td align="right">1,700.00</td>
                                </tr>                                      
                              </tbody>
                            </table>																				
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>                    

                <div class="col-md-12 ">											
                  <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                      <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-rss orange"></i>
                        Group wise Loan Balances
                      </h4>													
                    </div>
                    <div class="widget-body">
                      <div class="widget-main padding-8">
                        <div id="profile-feed-1" class="profile-feed">
                          <div class="profile-activity clearfix">
                            <table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
                              <thead>
                                <tr>														
                                  <th style="text-align: center;">Sl.No</th>                                        
                                  <th style="text-align: center;">Group Name</th>
                                  <th style="text-align: center;">Balance</th>														
                                </tr>
                                                </thead>	
                              <tbody>
                                <tr>
                                  <td align="center">1</td>
                                  <td align="left">Ganga Group</td>
                                  <td align="right">500.00</td>
                                </tr>
                                <tr>
                                  <td align="center">2</td>
                                  <td align="left">Sujatha SHG</td>
                                  <td align="right">1,500.00</td>
                                </tr>
                                <tr>
                                  <td align="center"></td>
                                  <td align="left">Total</td>
                                  <td align="right">2,000.00</td>
                                </tr>                                      
                              </tbody>
                            </table>																											
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>                                                            

                <div class="col-md-12 ">											
                  <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                      <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-rss orange"></i>
                        Recent Deposits
                      </h4>													
                    </div>
                    <div class="widget-body">
                      <div class="widget-main padding-8">
                        <div id="profile-feed-1" class="profile-feed">
                          <div class="profile-activity clearfix">
                            <table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
                              <thead>
                                <tr>														
                                  <th style="text-align: center;">Mem ID</th>
                                  <th style="text-align: center;">Dep No</th>														
                                  <th style="text-align: center;">Mem Name</th>
                                  <th style="text-align: center;">Amount</th>														
                                </tr>
                              </thead>	
                              <tbody>
                                <tr>
                                  <td align="center">M105</td>
                                  <td align="center">D104</td>
                                  <td align="left">Sujatha</td>
                                  <td align="right">300.00</td>
                                </tr>
                                <tr>
                                  <td align="center">M104</td>
                                  <td align="center">D103</td>
                                  <td align="left">B Supriya</td>
                                  <td align="right">500.00</td>
                                </tr>
                                <tr>
                                  <td align="center">M101</td>
                                  <td align="center">D102</td>
                                  <td align="left">V Vijaya Kumari</td>
                                  <td align="right">500.00</td>
                                </tr>
                                <tr>
                                  <td align="center">M101</td>
                                  <td align="center">D101</td>
                                  <td align="left">V Vijaya Kumari</td>
                                  <td align="right">200.00</td>
                                </tr> 
                              </tbody>
                            </table>																				
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 ">											
                  <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                      <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-rss orange"></i>
                        Recent Loans
                      </h4>													
                    </div>
                    <div class="widget-body">
                      <div class="widget-main padding-8">
                        <div id="profile-feed-1" class="profile-feed">
                          <div class="profile-activity clearfix">
                            <table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
                              <thead>
                                <tr>														
                                  <th style="text-align: center;">Mem ID</th>														
                                  <th style="text-align: center;">Loan No</th>														
                                  <th style="text-align: center;">Mem Name</th>
                                  <th style="text-align: center;">Amount</th>														
                                </tr>
                              </thead>	
                              <tbody>
                                <tr>
                                  <td align="center">M104</td>
                                  <td align="center">L103</td>
                                  <td align="left">B Supriya</td>
                                  <td align="right">500.00</td>
                                </tr>
                                <tr>
                                  <td align="center">M105</td>
                                  <td align="center">L102</td>
                                  <td align="left">Sujatha</td>
                                  <td align="right">1,500.00</td>
                                </tr>
                                <tr>
                                  <td align="center">M101</td>
                                  <td align="center">L101</td>
                                  <td align="left">V Vijaya Kumari</td>
                                  <td align="right">200.00</td>
                                </tr> 
                              </tbody>
                            </table>																				
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 ">											
                  <div class="widget-box transparent">
                    <div class="widget-header widget-header-small">
                      <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-rss orange"></i>
                         Expenses Pending for Approval
                        <small><a href="acc_cb_expenses_all.php"> view all transactions </a></small>
                      </h4>													
                    </div>
                    <div class="widget-body">
                      <div class="widget-main padding-8">
                        <div id="profile-feed-1" class="profile-feed">
                          <div class="profile-activity clearfix">
                            <table style="font-size:13px" id="simple-table" class="table  table-bordered table-hover">
                              <thead>
                                <tr>														
                                  <th style="text-align: center;">Exp ID</th>														
                                  <th style="text-align: center;">Sub Head</th>														
                                  <th style="text-align: center;">Purpose</th>
                                  <th style="text-align: center;">Amount</th>														
                                </tr>
                                                </thead>	
                              <tbody>
                                <tr>
                                  <td align="center"><a href="acc_cb_expenses_view.php?expid=EXP1005"><button class'btn-primary'="">EXP1005</button></a></td>
                                  <td align="left">Misc Income</td>
                                  <td align="left">Expenses</td>
                                  <td align="right">200.00</td>
                                </tr> 
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
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php 
	include("footer.php");    
?>			