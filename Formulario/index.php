
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
    http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Formulario web -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulario web</title>
    </head>
    <body>
        <?php
        if (isset($_POST['enviar']) &&(!empty($_POST['nombre'])) && (!empty($_POST['modulos']))) {

            $nombre = $_POST['nombre'];
            $modulos = $_POST['modulos'];
            echo "Nombre: " . $nombre . "<br />";
            foreach ($modulos as $modulo) {
                print "Modulo: " . $modulo . "<br />";
            }
            
            echo '<a href="./index.php" title="back">Volver con el formulario vacío</a>';
            echo '<br>';
           
        } else {
            ?>
            <form name="input" action="" method="post">
                Nombre del alumno: <input type="text" name="nombre" value="<?php 
                
                if(!empty($_POST['nombre'])){
                     echo $_POST['nombre'];
                }
               
                ?>" />
  
                <?php
                if (isset($_POST['enviar']) && empty($_POST['nombre'])) 
                   echo "<span style='color:red'> <-- Debe introducir un nombre!!</span>" 
                
                ?>
                <p>Módulos que cursa
                
                 <?php
                if(isset($_POST['enviar']) &&  empty($_POST['modulos'])) 
                   echo "<span style='color:red'> <-- Debe seleccionar al menos uno!!</span>" 
                 ?>
                    :</p>
                <br/>
                <input type="checkbox" name="modulos[]" value="DWES" 
                <?php
                    if(isset($_POST['modulos'])&& in_array("DWES",$_POST['modulos']))
                    echo 'checked="checked"';
                    
                 ?> 
                       />
                Desarrollo web en entorno servidor<br />
               
                <input type="checkbox" name="modulos[]" value="DWEC" 
                 <?php
                    if(isset($_POST['modulos']) && in_array("DWEC",$_POST['modulos']))
                    echo 'checked="checked"';
                    
                ?> 
                       />
                Desarrollo web en entorno cliente<br />
                <br />
                <input type="submit" value="Enviar" name="enviar"/>
            </form>
            <?php
        }
        ?>
    </body>
</html>

