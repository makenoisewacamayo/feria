<?php
session_start();
include("db_connect.php");


$id_evento =$_GET['id_evento'];

$sql = "SELECT * FROM `eventos` WHERE `ID`='$id_evento' ";
$res=mysqli_query($connect, $sql);
$existe = mysqli_fetch_array($res);

$nombre_tabla = $existe['NOMBRE_EVENTO'].$existe['LUGAR'];
$_SESSION["NOMBRE_TABLA"]= $nombre_tabla;


?>
<html>  
      <head>  
           <title>GESTION DE RESERVAS</title>  
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
                     <h3 align="center">GESTION DE RESERVAS</h3><br />  
                     
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
      /*
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
                url:"crear_pago.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.lugar', function(){  
           var id = $(this).data("id1");  
           var lugar = $(this).text();  
           edit_data(id, lugar, "lugar");  
      });  
      $(document).on('blur', '.fecha', function(){  
           var id = $(this).data("id2");  
           var fecha = $(this).text();  
           edit_data(id,fecha, "fecha");  
      }); 
      $(document).on('blur', '.numero_locales', function(){  
           var id = $(this).data("id3");  
           var numero_locales = $(this).text();  
           edit_data(id,numero_locales, "numero_locales");  
      }); 
      
      
      */
      $(document).on('click', '.btn_success', function(){  
           var id=$(this).data("id4"); 
           
           if(confirm("Seguro quiere reservar este local?"))  
           {  
               
               $.ajax({  
                     url:"crear_pago.php",  
                     method:"POST",  
                     data:{id:id, precio:precio},  
                     dataType:"text",  
                     success:function(data){  
                         //window.location.href = "/locales/crear_pago.php"; 
                         //alert(data);  
                          //fetch_data();  
                     }
                       
                });  
                

           }  
      });  
 });  
 </script>