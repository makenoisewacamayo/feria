<?php 
include('includes/db_connect.php'); 
include('includes/functions.php'); 
include('includes/sidebar.php'); 
$err_msg="";
$suc_msg="";

?>
<style>
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MANAGE CUSTOMER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Customer</li>
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
			  <form name="frm" method="post">
			  <form name="hid_id" id="hid_id"> 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
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
				   $list_id=$_GET['listid'];
				   $listid=base64_decode($list_id);
				   $subCustomerSql=mysqli_query($conn,"SELECT * FROM users WHERE under_user_id=0 and id!='".$_SESSION['userid']."' and user_type='customer' ORDER BY id DESC");
				  
				   while($SubCustmerArr=mysqli_fetch_array($subCustomerSql))
				   {
					?>
                  <tr id="row_<?php echo $SubCustmerArr['id'];?>">
				  <td><?php echo $SubCustmerArr['id'];?></td>
                    <td><?php echo $SubCustmerArr['name'];?></td>
                    <td><?php echo $SubCustmerArr['telephone_no'];?></td>
					 <td><img src="assets/dist/img/avatar.png" alt="Avatar" class="avatar"></td>
					 
                    <td>
					<a  href="javascript:void(0)" onclick="DelData(<?php echo $SubCustmerArr['id'];?>)" class="btn btn-block btn-success btn-xs">delete</a>
					
                   
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
	<?php include('includes/footer.php'); ?>