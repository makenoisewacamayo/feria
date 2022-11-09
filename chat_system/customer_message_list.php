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
            <h1>MANAGE MESSAGE LIST</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Message List</li>
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
				<?php
				  if(!empty($err_msg))
				  {
					  
					echo '<div class="alert alert-danger">';
					 echo $err_msg;
					echo '</div>';
				} 
				if(!empty($suc_msg))
				  {
					  
					echo '<div class="alert alert-success">';
					 echo $suc_msg;
					echo '</div>';
				} 
				
				?>	
				 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
				   <th> SL</th>
                    <th>SubCustomer Name</th>
                    <th>Mobile No</th>
                    <th>Message</th>
                    <th>Status</th>
                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php

				 $listSql=mysqli_query($conn,"SELECT m.*,u.name as subcustomer_name,u.telephone_no FROM messages m LEFT JOIN users u ON u.id=m.to_id WHERE m.from_id='".$_SESSION['userid']."' ORDER BY m.send_time DESC");
				 
				  $sl=0;
				   while($ListArr=mysqli_fetch_array($listSql))
				   {
				       $sl++;
					  
					?>
                  <tr>
				  <td><?php echo $sl;?></td>
                    <td><?php echo $ListArr['subcustomer_name'];?></td>
                    <td><?php echo $ListArr['telephone_no'];?></td>
                    <td><?php echo $ListArr['msg'];?></td>
                <td> <?php if($ListArr['read_status']==0) { echo "FALSE"; }?> </td>
                   
                  </tr>
				   <?php } ?>
				   <tfoot>
				         <th> SL</th>
                    <th>SubCustomer Name</th>
                    <th>Mobile No</th>
                    <th>Message</th>
                    <th>Status</th>
				   
                  </tfoot>
                </table>
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
