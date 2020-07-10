<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_member";
	include("adminsidepan.php");

  $member = $connection->query("SELECT * FROM members");	
?>
			
      <div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Members
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12"> <!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-md-3">	
									  <p style="padding:12px"><a href="admin_member_add.php"><button class="btn btn-success">Add new member</button></a></p>
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
													<th class="detail-col">Sl.No.</th>
													<th class="detail-col">Member ID</th>
													<th class="center">Member Name</th>
													<th class="center">Group</th>
                          <th class="center">Cluster</th>
													<th class="center">Address</th>
													<th class="center">Mobile No.</th>
													<th class="center" width="50px">Edit</th>
													<th class="center" width="50px">Delete</th>
												</tr>
											</thead>
											<tbody>
                        <?php 
                          if($member->num_rows > 0){
                            $slno = 1;
                            while($row = $member->fetch_assoc()){
                              echo "<tr>";
                              echo "<td align='center'>".$slno."</td>";
                              echo "<td align='center'><a href='admin_mem_det.php?memid=".$row['memid']."'>".$row['memid']."</a></td>";
                              echo "<td>".$row['memname']."</td>";
                              $memgroupid = $row['memgroupid'];
                              $group = $connection->query("SELECT * FROM groups WHERE GroupID = '$memgroupid'");
                              $grouprow = $group->fetch_assoc();
                              echo "<td>".$grouprow['GroupName']."</td>";
                              $clusterid = $grouprow['ClusterID'];
                              $cluster = $connection->query("SELECT * FROM cluster WHERE ClusterID = '$clusterid'");
                              $clusterrow = $cluster->fetch_assoc();
                              echo "<td>".$clusterrow['ClusterName']."</td>";
                              echo "<td align='center'>".$row['memaddress']."</td>";
                              echo "<td align='center'>".$row['memphone']."</td>";
                              echo "<td class='center'><a href='admin_mem_edit.php?memid=".$row['memid']."'><button class='btn btn-xs btn-info'><i class='ace-icon fa fa-pencil bigger-120'></i></button></a></td>";
                              echo "<td class='center'><a href='admin_mem_del.php?memid=".$row['memid']."'><button class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></a></td></tr>";
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
            
       
			 var $tdElement2 = $row.find("td:eq(2)");
			 var $tdElement4 = $row.find("td:eq(4)");
			 
			 var id2 = $tdElement2.text().toLowerCase();
			 var matchedIndex2 = id2.indexOf(value);
			 var id4 = $tdElement4.text().toLowerCase();
			 var matchedIndex4 = id4.indexOf(value);
			       if ( matchedIndex2 == -1 && matchedIndex4 == -1) {
                 $row.hide();
             }
             else {
                 
				         addHighlighting($tdElement2, value);
				         addHighlighting($tdElement4, value);
                 $row.show();
            }
        }
    });
  });
});
</script>