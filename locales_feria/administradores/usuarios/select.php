<?php include("db_connect.php");
?>
<?php  

 $output = '';  
 $sql = "SELECT * FROM medicos ORDER BY ID ASC";  
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
                     <th width="15%">ESPECIALIDAD</th>
                     <th width="5%">BORRAR</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["ID"].'</td>  
                     <td class="nombre" data-id1="'.$row["ID"].'" contenteditable>'.$row["NOMBRE"].'</td>  
                     <td class="rut" data-id2="'.$row["ID"].'" contenteditable>'.$row["RUT"].'</td>
                     <td class="telefono" data-id7="'.$row["ID"].'" contenteditable>'.$row["TELEFONO"].'</td>  
                     <td class="email" data-id8="'.$row["ID"].'" contenteditable>'.$row["EMAIL"].'</td>  
                     <td class="especialidad" data-id9="'.$row["ID"].'" contenteditable>'.$row["ESPECIALIDAD"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["ID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="nombre" contenteditable></td>  
                <td id="rut" contenteditable></td>  
                <td id="telefono" contenteditable></td>
                <td id="email" contenteditable></td>
                <td id="especialidad" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
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
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>