<?php	  
	include("admin_session.php");
	$_SESSION['curpage']="admin_employee";
	include("adminsidepan.php");	
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $empid = $_POST['empid'];    
    $empter = $connection->query("UPDATE employee SET empstatus = 0 WHERE empid = '$empid'");    
  }
   header("location:admin_employee.php");
     
?>
