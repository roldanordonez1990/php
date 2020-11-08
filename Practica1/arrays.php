
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        
        <?php
       
        $asignaturas = array("BD" => "Base datos", "PR" => "Programacion", "ED" => "Entornos Desarollo", "SI" => "Sistemas informáticos");
        
     //  while (each($array)){
            
           // print_r($array);
      //  }
      $mode = next($asignaturas);
      print_r($mode." ,");
      $mode = current($asignaturas);
      print_r($mode." ,");
      $mode = reset($asignaturas);
      print_r($mode." ,");
      $mode = next($asignaturas);
      print_r($mode." ,");
      $mode = end($asignaturas);
      print_r($mode." ,");
       $mode = reset($asignaturas);
      print_r($mode." ,");
      $mode = reset($asignaturas);
      print_r($mode." ,");
      
        
        ?>
    </body>
</html>

