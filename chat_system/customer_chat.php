<?php 
include('includes/db_connect.php'); 
include('includes/functions.php'); 
include('includes/sidebar.php'); 
$err_msg="";
$suc_msg="";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Chat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	

          <div class="col-md-12">
            <!-- DIRECT CHAT DANGER -->
            <div class="card card-danger direct-chat direct-chat-danger">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                <!--  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                          data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>-->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                   <!--<div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                   
                    <img class="direct-chat-img" src="assets/dist/img/user1-128x128.jpg" alt="Message User Image">
                   
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                   
                  </div>-->
                
              <?php
			  $AllMsgSql=mysqli_query($conn,"SELECT m.*,u.name as fromsendername,l.list_name FROM `messages` m LEFT JOIN users u ON u.id=m.from_id LEFT JOIN list_master l ON l.id=m.list_id WHERE (m.from_id='".$_SESSION['userid']."' AND m.list_id='".$_SESSION['listid']."' and m.to_id='".$_SESSION['underuserid']."') OR (m.from_id='".$_SESSION['underuserid']."' AND m.list_id='".$_SESSION['listid']."' and m.to_id='".$_SESSION['userid']."') GROUP by m.send_time ORDER BY m.send_time ASC");
		   $AllMsgArr=array();
		   while($SubcustomerArr=mysqli_fetch_array($AllMsgSql))
		   {
		       if($SubcustomerArr['from_id']==$_SESSION['userid'])
		       {
            ?>   
             <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right"><?php echo $SubcustomerArr['fromsendername'];?></span>
                      <span class="direct-chat-timestamp float-left"><?php echo $SubcustomerArr['send_time'];?></span>
                    </div>
                    
                    <img class="direct-chat-img" src="assets/dist/img/user3-128x128.jpg" alt="Message User Image">
                  
                    <div class="direct-chat-text">
                      <?php echo $SubcustomerArr['msg'];?>
                    </div>
                  
                  </div> 
                  <?php } else { ?>
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"><?php echo $SubcustomerArr['fromsendername'];?></span>
                      <span class="direct-chat-timestamp float-right"><?php echo $SubcustomerArr['send_time'];?></span>
                    </div>
                   
                    <img class="direct-chat-img" src="assets/dist/img/user1-128x128.jpg" alt="Message User Image">
                   
                    <div class="direct-chat-text">
                     <?php echo $SubcustomerArr['msg'];?>
                    </div>
                   
                  </div>
                  
                  <?php } ?>
                  
		   <?php } ?>
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form  id="frm" method="post">
				<input type="hidden" id="from_message_id" name="from_message_id" value="<?php echo $_SESSION['userid'];?>">
				<!--<input type="hidden" id="cur_list_id" name="cur_list_id" value="<?php echo $_SESSION['listid'];?>">-->
				<input type="hidden" id="to_message_id" name="to_message_id" value="<?php echo $_SESSION['underuserid'];?>">
				
				 <div class="input-group">
                    <select name="cur_list_id"  id="cur_list_id"  class="form-control">
                            <option value="">Select List</option>
                            <?php
                             $ListSql=mysqli_query($conn,"SELECT * FROM list_master WHERE customer_id='".$_SESSION['userid']."'");
                             while($ListArr=mysqli_fetch_array($ListSql))
                             {
                             ?>
                            <option value="<?php echo $ListArr['id'];?>"> <?php echo $ListArr['list_name'];?></option>
                            <?php } ?>
                    </select>    
                </div> <br>  
                
                  <div class="input-group">
                    <input type="text" name="message"  id="message" placeholder="Type Message ..." class="form-control" value="Dear '*NAME*', my name is <?php echo $_SESSION['user_name'];?>, Im going to be your personal trainer for next 2 months">
					
                    <span class="input-group-append">
                      <button type="button" class="btn btn-danger sendAllmsgMtn">Send</button>
                    </span>
					<button class="btn btn-primary" type="button" disabled id="loader_div" style="display:none;">
						<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
						<span class="sr-only">Loading...</span>
					</button>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
          </div>
          <!-- /.col -->
        </div>
	<?php include('includes/footer.php'); ?>