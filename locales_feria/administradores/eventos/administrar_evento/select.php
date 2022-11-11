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
                     <th width="5%">N° LOCAL</th>  
                     <th width="10%">PRECIO</th>
                     <th width="10%">CATEGORIA</th>
                     <th width="10%">STATUS</th>
                     <th width="15%">NOMBRE CLIENTE</th>
                     <th width="15%">APELLIDO CLIENTE</th>
                     <th width="5%">FONO</th>

                     
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
                     <td class="numero_locales" data-id3="'.$row["NUMERO_LOCAL"].'" contenteditable>'.$row["NOMBRE CLIENTE"].'</td>  
                     <td class="numero_locales" data-id3="'.$row["NUMERO_LOCAL"].'" contenteditable>'.$row["APELLIDO CLIENTE"].'</td>  
                     <td class="numero_locales" data-id3="'.$row["NUMERO_LOCAL"].'" contenteditable>'.$row["FONO"].'</td>  
                     
                     
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