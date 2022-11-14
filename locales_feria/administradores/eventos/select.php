<?php
include("db_connect.php");
?>
<?php  
 
 $output = '';  
 session_start();
 $id=$_SESSION["id_administrador"];
 $sql = "SELECT * FROM `eventos` WHERE ID_ADMINISTRADOR = '$id' "; 
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID_EVENTO</th>  
                      
                     <th width="10%">NOMBRE EVENTO</th>
                     <th width="10%">LUGAR</th>
                     <th width="10%">FECHA</th>
                     <th width="15%">NUMERO LOCALES</th>
                     <th width="5%">X</th>

                     
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>  <a href="administrar_evento/seleccionar_evento.php?subject='.$row["ID"].'">'.$row["ID"].'</a></td>
                     <td>'.$row["NOMBRE_EVENTO"].'</td>
                     <td class="lugar" data-id1="'.$row["ID"].'" contenteditable>'.$row["LUGAR"].'</td>  
                     <td class="fecha" data-id2="'.$row["ID"].'" contenteditable>'.$row["FECHA"].'</td>  
                     <td class="numero_locales" data-id3="'.$row["ID"].'" contenteditable>'.$row["NUMERO_LOCALES"].'</td>  
                     <td><button type="button" name="delete_btn" data-id4="'.$row["ID"].'" class="btn btn-xs btn-danger btn_delete">Borrar</button></td>  
                     
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