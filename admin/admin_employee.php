<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_employee";
	include("adminsidepan.php");

  $employee = $connection->query("SELECT * FROM employee WHERE empstatus = 1");	
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Employees
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div class="row">
									 <div class="col-md-3">	
									  <p style="padding:12px"><a href="admin_employee_add.php"><button class="btn btn-success">Add New Employee</button></a></p>
									 </div>
									 <div class="col-md-9">	
									  <form class="form-horizontal" role="form" method="post" action="">
									   <button class="btn btn-search" type="submit" style="float:right;height:42pxmargin-right:2px; margin-top:15px;"><i class="ace-icon fa fa-search bigger-120"></i></button>
									   <input type="text" id="empsearch" name="empsearch" style="float:right;height:42px;margin-top:15px;" placeholder="Search" class="col-xs-4 col-sm-2" autocomplete="off" required="">
									  </form>
									 </div>
								</div>								
								
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>													
													<th class="detail-col">Sl.No.</th>
													<th class="detail-col">Employee ID</th>
													<th class="center">Employee Name</th>													
													<th class="center">Mobile No.</th>
													<th class="center">Address</th>													
													<th class="center">Status</th>	
													<th class="center" width="50px">Terminate</th>
												</tr>
											</thead>

											<tbody>
                        <?php
                          if($employee->num_rows > 0){
                            $slno = 1;
                            while($row = $employee->fetch_assoc()){
                              echo "<tr>";
                              echo "<td class='center'>".$slno."</td>";
                              echo "<td class='center'><a href='admin_emp_profile.php?empid=".$row['empid']."'>".$row['empid']."</a></td>";
                              echo "<td>".$row['empname']."</td>";
                              echo "<td class='center'>".$row['empmobile']."</td>";
                              echo "<td>".$row['empaddress']."</td>";
                              if($row['empstatus'] == 1)
                                echo "<td>Working</td>";
                              else
                                echo "<td>Terminated</td>";
                              echo "<td class='center'>
                                    <a href='admin_emp_ter.php?empid=".$row['empid']."'>
                                    <button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a></td>";
                              echo "</tr>";    
                              $slno = $slno+1;
                            }
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
			</div><!-- /.main-content -->

<?php 
	include("footer.php");    
?>


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
$("#empsearch").on("keyup", function() {
     
     var value = $(this).val().toLowerCase();
     
     removeHighlighting($("table tr span"));

     $("table tr").each(function(index) {
         if (index != 0) {
             $row = $(this);
             
			 var $tdElement1 = $row.find("td:eq(1)");
			 var $tdElement2 = $row.find("td:eq(2)");
       var $tdElement3 = $row.find("td:eq(3)");
			 var $tdElement4 = $row.find("td:eq(4)");
       var $tdElement5 = $row.find("td:eq(5)");
			 //var $tdElement6 = $row.find("td:eq(6)");    
			 
			 var id1 = $tdElement1.text().toLowerCase();
			 var matchedIndex1 = id1.indexOf(value);
			 var id2 = $tdElement2.text().toLowerCase();
			 var matchedIndex2 = id2.indexOf(value);
       var id3 = $tdElement3.text().toLowerCase();
			 var matchedIndex3 = id3.indexOf(value);
			 var id4 = $tdElement4.text().toLowerCase();
			 var matchedIndex4 = id4.indexOf(value);
       var id5 = $tdElement5.text().toLowerCase();
			 var matchedIndex5 = id5.indexOf(value);
			 //var id6 = $tdElement6.text().toLowerCase();
			 //var matchedIndex6 = id6.indexOf(value);    
			       if ( matchedIndex1 == -1 && matchedIndex2 == -1 && matchedIndex3 == -1 && matchedIndex4 == -1 && matchedIndex5 == -1 ) {
                 $row.hide();
             }
             else {
                 
				         addHighlighting($tdElement1, value);
				         addHighlighting($tdElement2, value);
                 addHighlighting($tdElement3, value);
				         addHighlighting($tdElement4, value);
                 addHighlighting($tdElement5, value);
				         //addHighlighting($tdElement6, value);
                 $row.show();
            }
        }
    });
  });
});
</script>