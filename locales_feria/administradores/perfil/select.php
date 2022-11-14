<?php
include("db_connect.php");
?>
<?php  
 
 $output = '';  
 session_start();
 $rut=$_SESSION["rut"];
 $sql = "SELECT * FROM `administradores` WHERE RUT = '$rut' "; 
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="15%">NOMBRE</th>  
                     <th width="10%">RUT</th>
                     <th width="10%">TELEFONO</th>
                     <th width="10%">EMAIL</th>
                     <th width="15%">PASSWORD</th>
                     
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["ID"].'</td>  
                     <td class="nombre" data-id1="'.$row["ID"].'" contenteditable>'.$row["NOMBRE"].'</td>  
                     <td>'.$row["RUT"].'</td>
                     <td class="telefono" data-id7="'.$row["ID"].'" contenteditable>'.$row["TELEFONO"].'</td>  
                     <td class="email" data-id8="'.$row["ID"].'" contenteditable>'.$row["EMAIL"].'</td>  
                     <td class="especialidad" data-id9="'.$row["ID"].'" contenteditable>'.$row["PASSWORD"].'</td>  
                       
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
                <td id="nombre" contenteditable></td>  
                <td id="rut" contenteditable></td>  
                <td id="telefono" contenteditable></td>
                <td id="email" contenteditable></td>
                <td id="especialidad" contenteditable></td>
                 
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>