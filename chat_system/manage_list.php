<?php 
include('includes/db_connect.php'); 
include('includes/functions.php'); 
include('includes/sidebar.php'); 
$err_msg="";
$suc_msg="";


if(isset($_POST['upload_csv']))
{
	
	    $filename = time().$_FILES['csvfile']['name'];
        $list_name=$_POST['list_name'];
		$creDate =date("Y-m-d h:i:s");
		$ListQury=mysqli_query($conn,"INSERT INTO list_master SET customer_id='".$_SESSION['userid']."',list_name='".$list_name."',create_date='".$creDate."'");
		$last_list_id=mysqli_insert_id($conn);
		
		//$filename =$_FILES['csvfile']['name'];
   		if($filename!="")
	    {
		    $file_size =$_FILES['csvfile']['size'];
		    $file_tmp  =$_FILES['csvfile']['tmp_name'];
		    $file_type =$_FILES['csvfile']['type'];  
		  
		    $desired_dir ="uploads";
		    $boolVal=move_uploaded_file($file_tmp,$desired_dir."/".$filename); 
			if($boolVal)
				{
					
					$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
   					 $csv_file= $desired_dir."/".$filename;
					 
					$csvfile = fopen($csv_file, 'r');
					$theData = fgets($csvfile);
				
					$i = 0;
					$j = 2;
					$error=0;
				    
					while (!feof($csvfile))
					{
						$csv_data[] = fgets($csvfile, 1024);
						$csv_array=str_getcsv($csv_data[$i], ",", '"');
					
						$customerName =$csv_array[0];
						$telephoneNo  =trim($csv_array[1]);
						$telnumlength = strlen((string)$telephoneNo);
						
					//	$userName     =$csv_array[2];
					    $userName     ="";
					    $password     ="";
					//	$password     =$csv_array[3];
						$parent_id    =$_SESSION['userid'];
						$create_date  =date("Y-m-d h:i:s");
					//	$passwordlength = strlen((string)$password);
						
					/*	
						if(!is_numeric($telephoneNo))
						{
							$error++;
							$err_msg=$err_msg."<p><strong>Danger!</strong> ".$telephoneNo." Enter Telephone Number Numeric</p>";
						}
						
						if($telnumlength!=9)
						{
							$error++;
							$err_msg=$err_msg."<p> <strong>Danger!</strong> ".$telephoneNo." Enter Telephone Number 9 Digit</p>";
						}
						
						if($passwordlength<4 || $passwordlength>8)
						{
							$error++;
							$err_msg=$err_msg."<p><strong>Danger!</strong> ".$password."  Password Lenght should be 4 to 8 </p>";
						}
						*/
						if($customerName!="")
						{
    						$insertSql=mysqli_query($conn, "INSERT INTO users SET under_user_id='".$parent_id."',list_id='".$last_list_id."',user_type='subcustomer',name='".$customerName."',telephone_no='".$telephoneNo."',username='".$userName."',pass_word='".md5($password)."',create_date='".$create_date."'");
    							 $suc_msg="CSV Uploaded Successfully..";
						}
						
					  $i++;
					  $j++;	
					}
					fclose($csvfile);
				}
		}
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MANAGE LIST</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage List</li>
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
				 <form  name="frm" id="frm" method="post" enctype="multipart/form-data">
				  <div class="form-group">
                    <label for="name">Enter List Name</label>
                    <input type="text" class="form-control" required id="list_name" name="list_name" placeholder="Enter List Name">
                  </div>
				  
				   <div class="form-group">
                    <label for="exampleInputFile">UPLOAD CSV</label> 
					
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="csvfile" name="csvfile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                       <button type="submit" name="upload_csv"  class="btn btn-block btn-danger btn-sm">submit</button>
                      </div>
                    </div>
					<a href="uploads/sample_customer_csv.csv"> download sample CSV </a>
                  </div>
				 </form> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
				   <th> ID</th>
                    <th>List Name</th>
                    <th>Create Date</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php
				  if($_SESSION['usertype']=='admin')
				  {
					$listSql=mysqli_query($conn,"SELECT * FROM list_master ORDER BY id DESC");  
				  }
				  if($_SESSION['usertype']=='customer')
				  {
				    $listSql=mysqli_query($conn,"SELECT * FROM list_master WHERE customer_id='".$_SESSION['userid']."' ORDER BY id DESC");
				  }
				   while($ListArr=mysqli_fetch_array($listSql))
				   {
					?>
                  <tr>
				  <td><?php echo $ListArr['id'];?></td>
                    <td><?php echo $ListArr['list_name'];?></td>
                    <td><?php echo $ListArr['create_date'];?></td>
                    <td><a href="manage_subcustomer.php?listid=<?php echo base64_encode($ListArr['id']);?>"class="btn btn-block btn-success btn-xs">view list</a></td>
                   
                  </tr>
				   <?php } ?>
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