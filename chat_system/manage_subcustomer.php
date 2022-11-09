<?php 
include('includes/db_connect.php'); 
include('includes/functions.php'); 
include('includes/sidebar.php'); 
$err_msg="";
$suc_msg="";
$list_id=$_GET['listid'];
$listid=base64_decode($list_id);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MANAGE SUBCUSTOMER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage SubCustomer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
          

            <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Customer List</h3>-->
				<div class="alert alert-success" id="suc_div" style="display:none;">
					<p><strong>!Success </strong> Deleted Successfully.. </p>
			    </div>
				 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  <form name="frm1" id="frm1" method="post">
			  
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
				  <tr>
				  <td colspan="4">
				  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Send All</label>
                  </div> 
				  </td>
				 <td>
				  <a href="javascript:void(0)" onclick="loaderAllCustomerSendToListMsg(<?php echo $_SESSION['userid'];?>,<?php echo $listid;?>)" class="btn btn-block btn-success btn-xs"><i class="fas fa-envelope bg-blue"></i></a></td>
				 </td>
                  <tr>
				   <th>ID</th>
                    <th>Customer Name</th>
                    <th>Telephone No</th>
					<th></th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				   
				   $subCustomerSql=mysqli_query($conn,"SELECT * FROM users WHERE list_id='".$listid."' ORDER BY id DESC");
				  
				   while($SubCustmerArr=mysqli_fetch_array($subCustomerSql))
				   {
					?>
                  <tr id="row_<?php echo $SubCustmerArr['id'];?>">
				  <td><?php echo $SubCustmerArr['id'];?></td>
                    <td><?php echo $SubCustmerArr['name'];?></td>
                    <td><?php echo $SubCustmerArr['telephone_no'];?></td>
					<td><img src="assets/dist/img/avatar.png" alt="Avatar" class="avatar"></td>
					 
                    <td>
					<a  href="javascript:void(0)" onclick="DelData(<?php echo $SubCustmerArr['id'];?>,<?php echo $listid;?>)" class="btn btn-block btn-success btn-xs">delete</a>
					<a href="chat.php?list_id=<?php echo $listid;?>&sub_cust_id=<?php echo $SubCustmerArr['id'];?>"  class="btn btn-block btn-success btn-xs"><i class="fas fa-envelope bg-blue"></i></a></td>
                   
                  </tr>
				   <?php } ?>
                  </tfoot>
                </table>
				</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
	<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Send Message to All Customer</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div class="col-md-12">
            <!-- DIRECT CHAT DANGER -->
            <div class="card card-danger direct-chat direct-chat-danger">
              <div class="card-header">
               

               
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
                

               
                  <!--<div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    
                    <img class="direct-chat-img" src="assets/dist/img/user3-128x128.jpg" alt="Message User Image">
                  
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                  
                  </div> -->
                  
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form  id="frm" method="post">
				<input type="hidden" id="from_message_id" name="from_message_id" value="<?php echo $_SESSION['userid'];?>">
				<input type="hidden" id="cur_list_id" name="cur_list_id" value="<?php echo $listid;?>">
				
                  <div class="input-group">
                    <input type="text" name="message"  id="message" placeholder="Type Message ..." class="form-control">
					
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
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	<?php include('includes/footer.php'); ?>