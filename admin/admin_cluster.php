<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_cluster";
	include("adminsidepan.php");

  $cluster = $connection->query("SELECT * FROM cluster WHERE ClusterID!='C100'");	
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Clusters
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-md-3">	
									  <p style="padding:12px"><a href="admin_cluster_add.php"><button class="btn btn-success">Add New Cluster</button></a></p>
									 </div>
									 <div class="col-md-9">	
									  <form class="form-horizontal" role="form" method="post" action="">
									   <button class="btn btn-search" type="submit" style="float:right;height:42pxmargin-right:2px; margin-top:15px;"><i class="ace-icon fa fa-search bigger-120"></i></button>
									   <input type="text" id="clustersearch" name="clustersearch" style="float:right;height:42px;margin-top:15px;" placeholder="Search" class="col-xs-4 col-sm-2" autocomplete="off" required="">
									  </form>
									 </div>
								</div>								
								
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>													
													<th class="center" width="100">Sl.No.</th>
													<th class="center" width="200">Cluster ID</th>
													<th class="center" width="250">Cluster Name</th>
													<th class="center">Address</th>
													<th class="center" width="200">Phone No.</th>													
												</tr>
											</thead>
											<tbody>
                        <?php 
                          if($cluster->num_rows > 0){
                            $slno = 1;
                            while($row = $cluster->fetch_assoc()){
                              echo "<tr>";
                              echo "<td class='center'>".$slno."</td>";
                              echo "<td class='center'><a href='admin_cluster_det.php?clusterid=".$row['ClusterID']."'>".$row['ClusterID']."</a></td>";
                              echo "<td>".$row['ClusterName']."</td>";
                              echo "<td>".$row['Address']."</td>";
                              echo "<td class='center'>".$row['Mobile']."</td>";
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
$("#clustersearch").on("keyup", function() {
     var value = $(this).val().toLowerCase();
    
     removeHighlighting($("table tr span"));

     $("table tr").each(function(index) {
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
			     
			       if ( matchedIndex1 == -1 && matchedIndex2 == -1 && matchedIndex3 == -1 && matchedIndex4 == -1 ) {
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