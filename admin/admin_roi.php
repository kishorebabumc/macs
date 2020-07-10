<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_roi";
	include("adminsidepan.php");

  $liabilitiesroi = $connection->query("SELECT acc_rateofinterest.*,SubHead,acc_subhead.MajorID,MainID FROM acc_rateofinterest,acc_subhead,acc_majorheads WHERE subheadid = SubID AND acc_rateofinterest.status = 1 AND acc_subhead.MajorID = acc_majorheads.MajorID AND MainID = 1");
  $assetsroi = $connection->query("SELECT acc_rateofinterest.*,SubHead,acc_subhead.MajorID,MainID FROM acc_rateofinterest,acc_subhead,acc_majorheads WHERE subheadid = SubID AND acc_rateofinterest.status = 1 AND acc_subhead.MajorID = acc_majorheads.MajorID AND MainID = 2");
  
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								Rate of Interest
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div class="col-sm-6">
										<div class="widget-box widget-color-blue2">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													Liabilities 													
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-8">
												<table  id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>													
													<th class="detail-col">Sl.No.</th>
													<th class="detail-col" style="width:160px;">SubHead</th>
													<th class="center">Rate of Interest %</th>
													<th class="center">Date of effect</th>
													<th class="center">Edit</th>
												</tr>
											</thead>

											<tbody>
											
                          <?php
                              $slno = 1;
                              while($rowliabilities = $liabilitiesroi->fetch_assoc()){
                                  $liabilitiessubhead = $rowliabilities['SubHead'];
                                  echo "<tr>";
                                  echo "<td align='center'>".$slno."</td>";
                                  echo "<td onclick = \"window.open('/admin/roidetails.php?subhead=".$liabilitiessubhead."', '_blank', 'resizable=yes, location=no, scrollbars=yes, width=500, height=400, top=150, left=500'); return false;\" > <a href=\"\">".$rowliabilities['SubHead']."</a></td>";
                                  echo "<td align='center'>".$rowliabilities['roi']."</td>";
                                  echo "<td align='center'>".date('d-m-Y',strtotime($rowliabilities['doe']))."</td>";
                                  echo "<td width='50px' class='center'> <a href='admin_roi_edit.php?subhead=".$liabilitiessubhead."'>
															  <button class='btn btn-xs btn-info'>
																<i class='ace-icon fa fa-pencil bigger-120'></i>
															  </button>
															  </a></td></tr>";
                                  $slno = $slno + 1;
                              }
                           ?>
                        </tbody>
										</table>
													
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="widget-box widget-color-green2">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													Assets													
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-8">
												<table  id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>													
													<th class="detail-col">Sl.No.</th>
													<th class="detail-col" style="width:160px;">SubHead</th>
													<th class="center">Rate of Interest %</th>
													<th class="center">Date of effect</th>
													<th class="center">Edit</th>
												</tr>
											</thead>

											<tbody>
											                      
                          <?php
                              $slno = 1;
                              while($rowassets = $assetsroi->fetch_assoc()){
                                  $assetssubhead = $rowassets['SubHead'];
                                  echo "<tr>";
                                  echo "<td align='center'>".$slno."</td>";
                                  echo "<td onclick = \"window.open('/admin/roidetails.php?subhead=".$assetssubhead."', '_blank', 'resizable=yes, location=no, scrollbars=yes, width=500, height=400, top=150, left=500'); return false;\" > <a href=\"\">".$rowassets['SubHead']."</a></td>";
                                  echo "<td align='center'>".$rowassets['roi']."</td>";
                                  echo "<td align='center'>".date('d-m-Y',strtotime($rowassets['doe']))."</td>";
                                  echo "<td width='50px' class='center'> <a href='admin_roi_edit.php?subhead=".$assetssubhead."'>
															  <button class='btn btn-xs btn-info'>
																<i class='ace-icon fa fa-pencil bigger-120'></i>
															  </button>
															  </a></td></tr>";
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
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

    <!--   Core JS Files   -->

<?php 
	include("footer.php");    
?>

  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	

    <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

<script>
function removeHighlighting(highlightedElements){
       highlightedElements.each(function(){
        var element = $(this);
        element.replaceWith(element.html());
	     })
}

function addHighlighting(element, textToHighlight){
     var text = element.text();
		 var regEx = new RegExp(textToHighlight, "ig");
     var highlightedText = '<span style="background-color: yellow;">' + textToHighlight + '</span>';
     var newText = text.replace(regEx, highlightedText);
     element.html(newText);
}
$(document).ready(function(){
     $("#search1").on("keyup", function() {
     var value = $(this).val().toLowerCase();
    
     //removeHighlighting($("table tr span"));

     $("#table1 tr").each(function(index) {
       if (index != 0) {
           $row = $(this);
            
       var $tdElement1 = $row.find("td:eq(1)");
			 var $tdElement2 = $row.find("td:eq(2)");
			 var $tdElement3 = $row.find("td:eq(3)");
       var $tdElement4 = $row.find("td:eq(4)");    
			 
			 var id1 = $tdElement1.text().toLowerCase();
			 var matchedIndex1 = id1.indexOf(value);
			 var id2 = $tdElement2.text().toLowerCase();
			 var matchedIndex2 = id2.indexOf(value);
			 var id3 = $tdElement3.text().toLowerCase();
			 var matchedIndex3 = id3.indexOf(value);
       var id4 = $tdElement4.text().toLowerCase();
			 var matchedIndex4 = id4.indexOf(value);    

			       if (matchedIndex1 == -1 && matchedIndex2 == -1 && matchedIndex3 == -1 && matchedIndex4 == -1 ) {
                 $row.hide();
             }
             else {
                   addHighlighting($tdElement1, value);
                   addHighlighting($tdElement2, value);
                   addHighlighting($tdElement3, value);
                   addHighlighting($tdElement4, value);
                   $row.show();
            }
        }
    });
  });
  
  $("#search2").on("keyup", function() {
     var value = $(this).val().toLowerCase();
    
     //removeHighlighting($("table tr span"));

     $("#table2 tr").each(function(index) {
       if (index != 0) {
          $row = $(this);
            
       var $tdElement1 = $row.find("td:eq(1)");
			 var $tdElement2 = $row.find("td:eq(2)");
			 var $tdElement3 = $row.find("td:eq(3)");
       var $tdElement4 = $row.find("td:eq(4)");    

       var id1 = $tdElement1.text().toLowerCase();
			 var matchedIndex1 = id1.indexOf(value);
			 var id2 = $tdElement2.text().toLowerCase();
			 var matchedIndex2 = id2.indexOf(value);
			 var id3 = $tdElement3.text().toLowerCase();
			 var matchedIndex3 = id3.indexOf(value);
       var id4 = $tdElement4.text().toLowerCase();
			 var matchedIndex4 = id4.indexOf(value);    

			       if (matchedIndex1 == -1 && matchedIndex2 == -1 && matchedIndex3 == -1 && matchedIndex4 == -1) {
                 $row.hide();
             }
             else {
                   addHighlighting($tdElement1, value);
   				         addHighlighting($tdElement2, value);
   				         addHighlighting($tdElement3, value);
  							   addHighlighting($tdElement4, value);
  							   $row.show();
            }
        }
    });
  });
  
});
</script>