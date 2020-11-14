<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <h3>Se han actualizado los datos</h3>
        <?php
       
           
            try {

                $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
                $error = $conex->errorInfo();
                $result = $conex->prepare("UPDATE producto SET nombre_corto=?, nombre=?, descripcion=?, PVP=? where cod ='$_POST[cod]' ");

                $nombre_corto = $_POST['nombre_corto'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $pvp = $_POST['PVP'];

                $result->bindParam(1, $nombre_corto);
                $result->bindParam(2, $nombre);
                $result->bindParam(3, $descripcion);
                $result->bindParam(4, $pvp);

                $result->execute();
                $result = null;
            } catch (PDOException $exc) {

                echo $exc->getTraceAsString(); // error de php
                echo 'Error:' . $exc->getMessage(); // error del servidor de bd
            }
        
        
        ?>
        
        <br>
        <form action="index.php">
            <input type="submit" value="Continuar">
            
        </form>
    </body>
</html>

