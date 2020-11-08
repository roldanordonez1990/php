<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
        $meses = array("Enero" => 9, "Febrero" => 12, "Marzo" => 0, "Abril" => 17);
        
        foreach ($meses as $pelicula => $valor){
            
            if($valor != 0){
                echo ("En ".$pelicula." he visto ".$valor." películas"."<br>");
            }
        }
        
        ?>
    </body>
</html>