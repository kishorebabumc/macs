<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_group";
	include("adminsidepan.php");

  $group = $connection->query("SELECT * FROM groups");	
?>			

      <div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Groups
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-md-3">	
									  <p style="padding:12px"><a href="admin_group_add.php"><button class="btn btn-success">Add New Group</button></a></p>
									 </div>
									 <div class="col-md-9">	
									  <form class="form-horizontal" role="form" method="post" action="">
									   <button class="btn btn-search" type="submit" style="float:right;height:42pxmargin-right:2px; margin-top:15px;"><i class="ace-icon fa fa-search bigger-120"></i></button>
									   <input type="text" id="ddosearch" name="ddosearch" style="float:right;height:42px;margin-top:15px;" placeholder="Search" class="col-xs-4 col-sm-2" autocomplete="off" required="">
									  </form>
									 </div>
								</div>								
								
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>													
													<th style="text-align: center;">Sl.No.</th>														
                          <th style="text-align: center;">GroupID</th>
                          <th style="text-align: center;">Group Name</th>
                          <th style="text-align: center;">Address</th>
                          <th style="text-align: center;">Mobile No.</th>
                          <th style="text-align: center;">ClusterID</th>
											</thead>
											<tbody>
                        <?php 
                          if($group->num_rows > 0){
                            $slno = 1;
                           while($row = $group->fetch_assoc()){
                              echo "<tr>";
                              echo "<td align='center'>".$slno."</td>";
                              echo "<td align='center'><a href='admin_group_det.php?groupid=".$row['GroupID']."'>".$row['GroupID']."</a></td>";
                              echo "<td align='center'>".$row['GroupName']."</td>";
                              echo "<td align='center'>".$row['Address']."</td>";
                              echo "<td align='center'>".$row['Mobile']."</td>";
                              echo "<td align='center'>".$row['ClusterID']."</td>";
                              $slno = $slno + 1;
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
$("#ddosearch").on("keyup", function() {
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
			       if ( matchedIndex1 == -1 && matchedIndex2 == -1 && matchedIndex3 == -1 && matchedIndex4 == -1 && matchedIndex5 == -1) {
                 $row.hide();
             }
             else {
                 
				         addHighlighting($tdElement1, value);
				         addHighlighting($tdElement2, value);
                 addHighlighting($tdElement3, value);
				         addHighlighting($tdElement4, value);
                 addHighlighting($tdElement5, value);
                 $row.show();
            }
        }
    });
  });
});
</script>