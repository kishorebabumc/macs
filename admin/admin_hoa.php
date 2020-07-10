<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_hoa";
	include("adminsidepan.php");

  $member = $connection->query("SELECT * FROM members");
  $liabilitiesquery = "SELECT
			     acc_mainheads.MainHead,
			     acc_majorheads.MajorHead,
			     acc_subhead.SubHead,
			     acc_subhead_module.ModuleType
			     FROM acc_subhead
			     INNER JOIN acc_majorheads ON acc_subhead.MajorID = acc_majorheads.MajorID
			     INNER JOIN acc_mainheads ON acc_mainheads.MainID = acc_majorheads.MainID
			     INNER JOIN acc_subhead_module ON acc_subhead.SubHeadModule = acc_subhead_module.ModuleID
			     WHERE  acc_mainheads.MainID = 1 OR acc_mainheads.MainID = 3 OR acc_mainheads.MainID = 5 ORDER by acc_mainheads.MainID";
  $liabilities = $connection->query($liabilitiesquery);
  $assetsquery = "SELECT
			     acc_mainheads.MainHead,
			     acc_majorheads.MajorHead,
			     acc_subhead.SubHead,
			     acc_subhead_module.ModuleType
			     FROM acc_subhead
			     INNER JOIN acc_majorheads ON acc_subhead.MajorID = acc_majorheads.MajorID
			     INNER JOIN acc_mainheads ON acc_mainheads.MainID = acc_majorheads.MainID
			     INNER JOIN acc_subhead_module ON acc_subhead.SubHeadModule = acc_subhead_module.ModuleID
			     WHERE acc_mainheads.MainID = 2 OR acc_mainheads.MainID = 4 OR acc_mainheads.MainID = 6 ORDER by acc_mainheads.MainID";
	$assets = $connection->query($assetsquery);
?>

			<div class="main-content">
				<div class="main-content-inner">					
					<div class="page-content">
						<div class="page-header">
							<h1>
								Head of Accounts
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box widget-color-blue2">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													Liabilities & Income
													<span class="smaller-80" style="float:right"><a href='admin_hoa_add.php?head=1'><button class="btn btn-info">Add New Head</button></a></span>
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-8">
												<table  id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>													
													<th class="detail-col">Sl.No.</th>
													<th class="detail-col" style="width=200px;">SubHead</th>
													<th class="center">MajorHead</th>
													<th class="center">MainHead</th>
												</tr>
											</thead>

											<tbody>
											<?php
                          $slno = 1;
                          while($row1 = $liabilities->fetch_assoc()){
                              echo "<tr>";
                              echo "<td align='center'>".$slno."</td>";
                              echo "<td style='width:200px;'>".$row1['SubHead']."</td>";                              
                              echo "<td>".$row1['MajorHead']."</td>";
                              echo "<td>".$row1['MainHead']."</td>";
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
													Assets & Expenditure
													<span class="smaller-80" style="float:right"><a href='admin_hoa_add.php?head=2'><button class="btn btn-success">Add New Head </button></a></span>
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-8">
												<table  id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>													
													<th class="detail-col">Sl.No.</th>
													<th class="detail-col" width="200px">SubHead</th>
													<th class="center">MajorHead</th>
													<th class="center">MainHead</th>
												</tr>
											</thead>

											<tbody>
											<?php
                        $slno = 1;
                        while($row2 = $assets->fetch_assoc()){
                            echo "<tr>";
                            echo "<td align='center'>".$slno."</td>";
                            echo "<td style='width:200px;'>".$row2['SubHead']."</td>";                            
                            echo "<td>".$row2['MajorHead']."</td>";
                            echo "<td>".$row2['MainHead']."</td>";
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

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
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