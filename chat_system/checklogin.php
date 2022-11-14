<?php 
include('includes/db_connect.php'); 

 //echo "<pre>"; print_r($_POST); exit();
 
  if(isset($_POST['username']))
  {
	   $username =trim($_POST['username']);
       $password =md5($_POST['psw']);	   
	  
	  $selQry="SELECT * FROM users WHERE telephone_no='".$username."' AND pass_word='".$password."'";
	  $qery=mysqli_query($conn,$selQry);
	  $Arr=mysqli_fetch_array($qery); 
	  
	  $count=count($Arr[0]); 
	 
	  if($count>0)
	  {
		  
        $_SESSION['userid']=$Arr['id'];
		$_SESSION['usertype']=$Arr['user_type'];
		$_SESSION['user_name']=$Arr['name'];
		$_SESSION['underuserid']=$Arr['under_user_id'];
		$_SESSION['listid']=$Arr['list_id'];
        header('location:dashboard.php');  		 
	  }
	  else
	  {
		header('location:index.php?msg=Invalid credtial');  
		   
	  }
	 
	  
  }
  
  

?>