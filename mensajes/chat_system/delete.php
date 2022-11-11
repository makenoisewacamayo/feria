<?php
include('includes/db_connect.php'); 
include('includes/functions.php'); 
if(isset($_GET['delsubcustomer']))
{
	$del_id =$_POST['delsubcustomer'];
	mysqli_query($conn,"DELETE FROM users WHERE id='".$del_id."'");
	header('location:manage_subcustomer.php?msg=deleted successfully');
}
?>