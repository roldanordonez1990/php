<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <table border="1">
        <?php
        
        foreach ($_SERVER as $nombre => $valor){
            
            echo "<tr>";
            echo "<td>".$nombre."</td>";
             echo "<td>".$valor."</td>";
            echo "</tr>";
           
        }
       
        ?>
            
        </table>
    </body>
</html>

