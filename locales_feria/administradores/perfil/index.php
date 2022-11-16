<html>  
      <head>  
           <title>MI PERFIL</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">MI PERFIL</h3><br />  
                     <form action="/panel_control_administradores.php"><input type="submit" value="VOLVER">

</form>
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var nombre = $('#nombre').text();  
           var rut = $('#rut').text();
           var telefono = $('#telefono').text();
           var email = $('#email').text();
           var password= $('#password').text();  
           if(nombre == '')  
           {  
                alert("Ingresa nombre");  
                return false;  
           }  
           if(rut == '')  
           {  
                alert("Ingresa Rut");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{nombre:nombre, rut:rut, telefono: telefono, email:email, especialidad:especialidad},  
                dataType:"text",  
                success:function(data)  
                {  
                     //alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.nombre', function(){  
           var id = $(this).data("id1");  
           var nombre = $(this).text();  
           edit_data(id, nombre, "nombre");  
      });  
      /*$(document).on('blur', '.rut', function(){  
           var id = $(this).data("id2");  
           var rut = $(this).text();  
           edit_data(id,rut, "rut");  
      });*/
      $(document).on('blur', '.telefono', function(){  
           var id = $(this).data("id7");  
           var telefono = $(this).text();  
           edit_data(id,telefono, "telefono");  
      }); 
      $(document).on('blur', '.email', function(){  
           var id = $(this).data("id8");  
           var email = $(this).text();  
           edit_data(id,email, "email");  
      }); 
      $(document).on('blur', '.password', function(){  
           var id = $(this).data("id9");  
           var password = $(this).text();  
           edit_data(id,password, "password");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          //alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>