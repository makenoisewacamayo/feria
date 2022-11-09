 <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example11").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
  function DelData(id)
  {
	 var r = confirm("Are your sure, You want to delete");
	 if (r == true) {
     $("#suc_div").hide();
        var Inputform_data = new FormData();
		
		 Inputform_data.append("del_id", id);
		 Inputform_data.append("action", 'DeleteSubCustomer');
		 
	 $.ajax({
                type: "POST",
                url: 'action.php',
                data: Inputform_data,
                contentType: false,
                processData: false,
                success: function(response) {
                // alert(response); return;
				 if(response=='ok')
				 {
					 $("#suc_div").show();
					 $("#row_"+id).hide();
				 }
                 console.log(response);
				
                },
                error: function(response) {
                    
                     alert("Failed..");
                    
                }
        });
     } 
	 
  }
  
  $( ".sendAllmsgMtn" ).click(function() {
	  $("#message").removeClass('errClass');
		var message             =$("#message").val();
		var from_message_id     =$("#from_message_id").val();
		var cur_list_id            =$("#cur_list_id").val();
		
		
		 if($("#message").val().trim().length==0)
		 {	
			 $("#message").addClass('errClass');
			 return false;
		 }
		 
		 
		
		 var Inputform_data = new FormData();
		 Inputform_data.append("post_message", $("#message").val());
		 Inputform_data.append("post_from_message_id", $("#from_message_id").val());
	     Inputform_data.append("post_list_id", $("#cur_list_id").val());
		 Inputform_data.append("action",'SendAllMessageFromCustomer');
		 Inputform_data.append("to_message_id",$("#to_message_id").val());	
		
	     $('.sendAllmsgMtn').hide();
	     $("#loader_div").show();
		
	 $.ajax({
                type: "POST",
                url: 'action.php',
                data: Inputform_data,
                contentType: false,
                processData: false,
                success: function(response) {
               
                 console.log(response); 
				 var Res =JSON.parse(response);
				 if(Res.success==1);
				 {
					 $("#frm")[0].reset(); 
					var Content=""; 
					 for(var i=0;i<Res.AllMsgArr.length;i++)
					 {
		if(from_message_id==Res.AllMsgArr[i]['from_id'])
		  {
						Content+='<div class="direct-chat-msg right">';
						Content+='<div class="direct-chat-infos clearfix">';
						Content+='<span class="direct-chat-name float-right">'+Res.AllMsgArr[i]['fromsendername']+'</span>';
						Content+='<span class="direct-chat-timestamp float-left">'+Res.AllMsgArr[i]['send_time']+'</span>';
						Content+='</div>';
						
						Content+='<img class="direct-chat-img" src="assets/dist/img/user3-128x128.jpg" alt="Message User Image">';
						
						Content+='<div class="direct-chat-text">'+Res.AllMsgArr[i]['msg']+'</div>';
						Content+='</div>';
		  }
		  else
		  {
		      	Content+='<div class="direct-chat-msg">';
						Content+='<div class="direct-chat-infos clearfix">';
						Content+='<span class="direct-chat-name float-left">'+Res.AllMsgArr[i]['fromsendername']+'</span>';
						Content+='<span class="direct-chat-timestamp float-right">'+Res.AllMsgArr[i]['send_time']+'</span>';
						Content+='</div>';
						
						Content+='<img class="direct-chat-img" src="assets/dist/img/user1-128x128.jpg" alt="Message User Image">';
						
						Content+='<div class="direct-chat-text">'+Res.AllMsgArr[i]['msg']+'</div>';
						Content+='</div>';
		      
                      
		  }
						
					 }
					 $(".direct-chat-messages").html(Content);
					 $("#loader_div").hide();
		              $('.sendAllmsgMtn').show();
					
				 }							
                },
                error: function(response) {
                    loaderoff();
                     alert("Failed..");
                    
                }
        });
	 });
  
  function loaderAllCustomerSendToListMsg(customerid,listid)
  {
	
	var Inputform_data = new FormData();
		 
		 Inputform_data.append("postfrommessageid", customerid);
	     Inputform_data.append("postlistid", listid);
		 Inputform_data.append("action",'GetAllMessageFromCustomer');		
		
	     
		
	 $.ajax({
                type: "POST",
                url: 'action.php',
                data: Inputform_data,
                contentType: false,
                processData: false,
                success: function(response) {
               
                 console.log(response); 
				 var Res =JSON.parse(response);
				 if(Res.success==1);
				 {
					 
					var Content=""; 
					 for(var i=0;i<Res.AllMsgArr.length;i++)
					 {
						Content+='<div class="direct-chat-msg right">';
						Content+='<div class="direct-chat-infos clearfix">';
						Content+='<span class="direct-chat-name float-right">'+Res.AllMsgArr[i]['fromsendername']+'</span>';
						Content+='<span class="direct-chat-timestamp float-left">'+Res.AllMsgArr[i]['send_time']+'</span>';
						Content+='</div>';
						
						Content+='<img class="direct-chat-img" src="assets/dist/img/user3-128x128.jpg" alt="Message User Image">';
						
						Content+='<div class="direct-chat-text">'+Res.AllMsgArr[i]['msg']+'</div>';
						Content+='</div>';
						
					 }
					 $(".direct-chat-messages").html(Content);
					  $('#modal-lg').modal('show');
		             
					
				 }							
                },
                error: function(response) {
                    loaderoff();
                     alert("Failed..");
                    
                }
        });
	  
  }
  
</script>
</body>
</html>
