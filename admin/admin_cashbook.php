<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_cashbook";
	include("adminsidepan.php");	
  $openingbalance = $connection->query("SELECT sum(receiptcash) as receipt, sum(paymentcash) as payment FROM acc_cashbook, acc_transactions WHERE clusterid = 'C100' AND acc_cashbook.TransID = acc_transactions.TransID AND acc_transactions.TransStatus = 1 AND acc_cashbook.date < '$today'");
	$opbal = $openingbalance->fetch_assoc();	
  $receipt = $opbal['receipt'];
	$payment = $opbal['payment'];
	$opening = $receipt - $payment;

	$cashbook = $connection->query("SELECT acc_subhead.SubHead, acc_cashbook.TransID, subheadid, receiptcash, receiptadj, paymentcash, paymentadj FROM acc_cashbook, acc_subhead, acc_transactions WHERE acc_cashbook.date = '$today' AND acc_cashbook.TransID = acc_transactions.TransID AND acc_transactions.TransStatus = 1 AND acc_subhead.SubID = acc_cashbook.subheadid");	
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1> <b>Cash Book on&nbsp;&nbsp;</b><span id="bookdate"><?php echo $today;?></span>
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  <a href="admin_cashbook_receipt.php"><button class="btn btn-info btn-fill">Receipts </button></a>
                  <a href="admin_cashbook_payment.php"><button class="btn btn-info btn-fill">Payments </button></a>	
                  <a href="admin_cashbook_adj.php"><button class="btn btn-info btn-fill">Adjustment </button></a>	
                </small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-10"> <!-- PAGE CONTENT BEGINS -->
								
								<div class="row">
									<div class="col-md-10 col-xs-12">
                    <table class="table table-bordered table-hover">	
                        <thead>
																<tr>														
																	<th rowspan="2" style="text-align: center;">Transaction ID</th>														
																	<th colspan="2" style="text-align: center;">Cash</th>
																	<th colspan="2" style="text-align: center;">Adjustment</th>														
																</tr>
																<tr>
																	<th style="text-align: center;">Receipt</th>
																	<th style="text-align: center;">Payment</th>
																	<th style="text-align: center;">Receipt</th>
																	<th style="text-align: center;">Payment</th>
																</tr>									  
															</thead>	
															<tbody>                                      
																<tr>																
																	<td><b>Opening Balance</b></td>                                
																	<td align="right"><b><?php echo number_format($opening,2); ?></b></td>																                                																
																	<td></td>
																	<td></td>
																	<td></td>																
																</tr>
																<?php 
																	$receiptcashtotal = $opening;
																	$paymentcashtotal = 0;
																	$receiptadjtotal = 0;
																	$paymentadjtotal = 0;
																	$closing = $opening;
																 	if($cashbook->num_rows > 0){
																		 $subhead = 0;
																		 
																		 while($row = $cashbook->fetch_assoc()){
																			if($row['subheadid'] == $subhead){
																				echo "<tr>";
																				echo "<td>".$row['TransID']."</td>";
																				echo "<td align='right'>".number_format($row['receiptcash'],2)."</td>";																				
																				echo "<td align='right'>".number_format($row['paymentcash'],2)."</td>";
																				echo "<td align='right'>".number_format($row['receiptadj'],2)."</td>";
																				echo "<td align='right'>".number_format($row['paymentadj'],2)."</td>";
																				echo "</tr>";
																			}
																			else{
																				echo "<tr>";
																				echo "<td colspan='3'><b>".$row['SubHead']."</b></td>";
																				echo "<td></td>";
																			   	echo "<td></td>";
																				echo "</tr>";
																				echo "<tr>";
																				echo "<td>".$row['TransID']."</td>";
																				echo "<td align='right'>".number_format($row['receiptcash'],2)."</td>";																				
																				echo "<td align='right'>".number_format($row['paymentcash'],2)."</td>";
																				echo "<td align='right'>".number_format($row['receiptadj'],2)."</td>";
																				echo "<td align='right'>".number_format($row['paymentadj'],2)."</td>";
																				echo "</tr>";   
																			}
																			$subhead = $row['subheadid'];
																			$receiptcashtotal = $receiptcashtotal + $row['receiptcash'];
																			$paymentcashtotal = $paymentcashtotal + $row['paymentcash'];
																			$receiptadjtotal = $receiptadjtotal + $row['receiptadj'];
																			$paymentadjtotal = $paymentadjtotal + $row['paymentadj'];
																			$closing = $receiptcashtotal + $receiptadjtotal - $paymentcashtotal - $paymentadjtotal;
																		 }
																	 }
																?>																
																
																<tr>																
																	<td><b>Closing Balance</b></td>																
																	<td></td>
																	<td align="right"><b><?php echo number_format($closing,2); ?></b></td>																                                
																	<td></td>																
																	<td></td>																
																</tr>
																<tr>																
																	<td><b>Grand Total</b></td>
																	<td align="right"><b><?php echo number_format($receiptcashtotal,2); ?></b></td>
																	<td align="right"><b><?php echo number_format($receiptcashtotal,2); ?></b></td>
																	<td align="right"><b><?php echo number_format($receiptadjtotal,2); ?></b></td>
																	<td align="right"><b><?php echo number_format($paymentadjtotal,2); ?></b></td>																

																</tr>	
															</tbody>
                      </table>
                  </div>
								</div>
						</div>
					</div><!-- /.page-content -->
				</div>
				</div>
			</div><!-- /.main-content -->

<?php 
	include("footer.php");    
?>			