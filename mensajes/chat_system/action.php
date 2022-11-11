<?php
error_reporting(0);
include('includes/db_connect.php');
include('includes/function.php');

 if(isset($_POST['action']))
 {
	 $action=$_POST['action'];
 }
  
 if($action=='DeleteSubCustomer')
 {
     	 $exe=mysqli_query($conn,"DELETE FROM users WHERE id='".$_POST['del_id']."'");
         echo "ok"; exit();	 
 }
 
 if($action=='register')
 {
     	$postName     =$_POST['post_name']; 
		$postTel      =$_POST['post_telephone'];
		$PostPas      =md5($_POST['post_password']);  	
		$PostUsername =$_POST['post_username'];
		$createDte =date("Y-m-d h:i:s");
		$selArr=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) as count FROM users WHERE telephone_no='".$postTel."'"));
		$count=$selArr['count'];
		if($count>0)
		{
			$sucArr=array('success'=>0,'msg'=>'Telephone No already exists');
		}
		else
		{
		
		$InserSql=mysqli_query($conn, "INSERT INTO users SET user_type='customer',name='".$postName."',telephone_no='".$postTel."',username='".$PostUsername."',pass_word='".$PostPas."',create_date='".$createDte."'");
		
			$sucArr=array('success'=>1,'msg'=>'Resgister Successfully.');
			
		}
		echo json_encode($sucArr);
 
 }
 if($action=='SendAllMessageFromCustomer')
 {
     
   $post_message         =$_POST['post_message'];
   $post_from_message_id =$_POST['post_from_message_id'];
   $post_list_id         =$_POST['post_list_id'];
    if(isset($_POST['to_message_id']))
	{
		$to_message_id=$_POST['to_message_id'];
	}
	if($to_message_id==0 || empty($to_message_id))
	{
   
	   $SubcustomerSql=mysqli_query($conn,"SELECT * FROM users WHERE under_user_id='".$post_from_message_id."' AND list_id='".$post_list_id."'");
	   while($SubcustomerArr=mysqli_fetch_array($SubcustomerSql))
	   {
		   $postmessage ="";
		   $message_to_id   =$SubcustomerArr['id'];
		   $message_to_name =$SubcustomerArr['name'];
		   $postmessage =str_replace("*NAME*",$message_to_name,$post_message);
		   $send_time      =date("Y-m-d h:i:s");
		   mysqli_query($conn,"INSERT INTO messages SET list_id='".$post_list_id."',from_id='".$post_from_message_id."',to_id='".$message_to_id."',msg='".addslashes($postmessage)."',send_time='".$send_time."'");
	   }
	   $AllMsgSql=mysqli_query($conn,"SELECT m.*,u.name as fromsendername,l.list_name FROM `messages` m LEFT JOIN users u ON u.id=m.from_id LEFT JOIN list_master l ON l.id=m.list_id WHERE m.from_id='".$post_from_message_id."' AND m.list_id='".$post_list_id."' GROUP by m.send_time ORDER BY m.send_time ASC");
	   $AllMsgArr=array();
	   while($SubcustomerArr=mysqli_fetch_array($AllMsgSql))
	   {
		  $AllMsgArr[]=$SubcustomerArr; 
	   }
	}
	else
	{
	  
	    
	       $send_time      =date("Y-m-d h:i:s");
		   mysqli_query($conn,"INSERT INTO messages SET list_id='".$post_list_id."',from_id='".$post_from_message_id."',to_id='".$to_message_id."',msg='".$post_message."',send_time='".$send_time."'");	
		   
		   $AllMsgSql=mysqli_query($conn,"SELECT m.*,u.name as fromsendername,l.list_name FROM `messages` m LEFT JOIN users u ON u.id=m.from_id LEFT JOIN list_master l ON l.id=m.list_id WHERE (m.from_id='".$post_from_message_id."' AND m.list_id='".$post_list_id."' and m.to_id='".$to_message_id."') OR (m.from_id='".$to_message_id."' AND m.list_id='".$post_list_id."' and m.to_id='".$post_from_message_id."') GROUP by m.send_time ORDER BY m.send_time ASC");
		   $AllMsgArr=array();
		   while($SubcustomerArr=mysqli_fetch_array($AllMsgSql))
		   {
			  $AllMsgArr[]=$SubcustomerArr; 
		   }
	}
   
   
   
   $sucArr=array('success'=>1,'msg'=>'Resgister Successfully.','AllMsgArr'=>$AllMsgArr);
   echo json_encode($sucArr);
 }
 
 if($action=='GetAllMessageFromCustomer')
 {
	
   $post_from_message_id =$_POST['postfrommessageid'];
   $post_list_id         =$_POST['postlistid'];
   
   $AllMsgSql=mysqli_query($conn,"SELECT m.*,u.name as fromsendername,l.list_name FROM `messages` m LEFT JOIN users u ON u.id=m.from_id LEFT JOIN list_master l ON l.id=m.list_id WHERE m.from_id='".$post_from_message_id."' AND m.list_id='".$post_list_id."' GROUP by m.send_time ORDER BY m.send_time ASC");
   $AllMsgArr=array();
   while($SubcustomerArr=mysqli_fetch_array($AllMsgSql))
   {
	  $AllMsgArr[]=$SubcustomerArr; 
   }
   
   $sucArr=array('success'=>1,'msg'=>'Resgister Successfully.','AllMsgArr'=>$AllMsgArr);
   echo json_encode($sucArr);
 }
 
	

  

?>