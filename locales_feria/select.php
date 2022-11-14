<?php
include("db_connect.php");
session_start();
$nombre_tabla=$_SESSION["NOMBRE_TABLA"];


 
 $output = '';  
 $sql = "SELECT * FROM `$nombre_tabla` "; 
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">N° LOCAL</th>  
                     <th width="10%">PRECIO</th>
                     <th width="10%">CATEGORIA</th>
                     <th width="10%">STATUS</th>
                     <th width="10%">RESERVAR</th>
                                          
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     
                     <td>'.$row["NUMERO_LOCAL"].'</td>
                     <td class="lugar" data-id1="'.$row["NUMERO_LOCAL"].'" contenteditable>'.$row["PRECIO"].'</td>  
                     <td class="fecha" data-id2="'.$row["NUMERO_LOCAL"].'" contenteditable>'.$row["CATEGORIA"].'</td>  
                     <td class="numero_locales" data-id3="'.$row["NUMERO_LOCAL"].'" >'.$row["STATUS"].'</td>  
                     <td>  <a href="crear_pago.php?id='.$row["NUMERO_LOCAL"].'&precio='.$row["PRECIO"].'"><button type="button" name="btn_buy" class="btn btn-xs btn-success btn_success">RESERVAR</button></a></td>
                </tr>  
           ';  
           
           
      }  
      $output .= '  
           <tr>  
                
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                    <td></td>  
                <td id="lugar" contenteditable></td>  
                <td id="fecha" contenteditable></td>  
                <td id="numero_locales" contenteditable></td>
                                
                 
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output; 
 ?>