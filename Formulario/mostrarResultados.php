<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>

        <?php
        
        $nombre = ($_POST['nombre']);
        echo $nombre.'</br>';
        $apellidos = ($_POST['apellidos']);
        echo $apellidos;
        echo '<br/>';
        $aficiones = json_decode($_POST['aficion']);
        
        foreach ($aficiones as $value){
            echo $value.' ,';
        }
        echo '<br/>';
        $estudios = json_decode($_POST['estudios']);
        
        foreach ($estudios as $value){
            
            echo $value.' ,';
        }
        echo '<br/>';
        $sexo = $_POST['genero'];
        
        echo $sexo;
        
        echo '<br/>';
        $anyos = $_POST['anyos'];
        
        echo $anyos;
        
        echo '<br/>';
        $estado = $_POST['estado'];
        
        echo $estado;
        
        echo '<br/>';
        $genero = $_POST['genero'];
        
        echo $genero;
        ?>
        
        
    
</body>
</html>
