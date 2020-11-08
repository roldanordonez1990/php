<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    <?php
    require_once './ejemploFechaFuncion.php';
    if (!empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['anio'])) {
        
            if(checkdate($_POST['mes'], $_POST['dia'], $_POST['anio'])){
                
                echo fecha(mktime(0,0,0,$_POST['mes'],$_POST['dia'],$_POST['anio']));
            }
            else{
                echo 'fecha incorrecta';
            }            
            
    } else {
 
    ?>
        <form name="input" action="" method="post">
         Dia:
        <input type="text" name="dia" value="<?php 
        if(!empty($_POST['dia'])){
            echo $_POST['dia'];
        }
        ?>" /><br>
        Mes:<input type="text" name="mes" value="<?php 
        if(!empty($_POST['mes'])){
            echo $_POST['mes'];
        }        
        ?>" /><br>
        Año:<input type="text" name="anio" value="<?php 
        if(!empty($_POST['anio'])){
            echo $_POST['anio'];
        }
       ?>" />
        <br><input type="submit" value="Enviar" name="enviar"/>
        </form>
     <?php
    }
     ?>
    </body>
</html>