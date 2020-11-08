<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       $conexion = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
      //echo $conexion -> server_info;
      if(!$conexion->connect_errno){
          
          $conexion->autocommit(false);
          
         $error1 = $conexion->query('update stock set unidades=1 where tienda=1 and producto="3DSNG"');
          
         $error2 = $conexion->query('insert into stock values("3DSNG",3,1)');
         
         if($error1 && $error2){
             $conexion->commit();
         }else{
             echo 'No se ha podido actualizar';
             $conexion->rollback();
         }
      }
        //echo $conexion->connect_error;
        ?>
    </body>
</html>
