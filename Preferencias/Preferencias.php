<?php
session_start();
//Creamos la sesión
//setcookie(session_name(), session_id(), time()+3600);

if(isset($_POST['establecer'])){
//Mientras la sesión permanece abierta, puedes utilizar la variable superglobal $_SESSION para añadir información a la sesión del usuario
$_SESSION['idioma'] = $_POST['idioma'];
$_SESSION['perfil'] = $_POST['perfil'];
$_SESSION['zona'] = $_POST['zona'];
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>preferencias</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <fieldset>
            <legend>Preferencias</legend>
            <?php
            if(isset($_POST['establecer'])){
               ?>
                 <span class="mensaje">Información guardada en la sesión</span>
               <?php
            }
            ?>
           
            <form action="" method="post">
                <label class="etiqueta">Idioma:</label>
                <select name="idioma">
                   <?php
                   $idiomas = ["Español", "Inglés"];
                   foreach ($idiomas as $idioma){
                       ?>
                    <option value="<?php echo $idioma?>" <?php if(isset($_SESSION['idioma'])) if($_SESSION['idioma'] == $idioma) echo "selected"?>><?php echo $idioma;?></option>
                    <?php
                   }
                   ?>
                </select>
                <br/>
                <br/>
                <label class="etiqueta">Perfil Público:</label>
                <select name="perfil">
                      <?php
                   $perfiles = ["Si", "No"];
                   foreach ($perfiles as $perfil){
                       ?>
                    <option value="<?php echo $perfil?>" <?php if(isset($_SESSION['perfil'])) if($_SESSION['perfil'] == $perfil) echo "selected"?>><?php echo $perfil;?></option>
                    <?php
                   }
                   ?>
                </select>
                <br/>
                <br/>
                <label class="etiqueta">Zona horaria:</label>
                <select name="zona">
                    <?php
                   $zonas = ["GMT-2", "GMT-1", "GMT", "GMT+1", "GMT+2"];
                   foreach ($zonas as $zona){
                       ?>
                    <option value="<?php echo $zona?>"  <?php if(isset($_SESSION['zona'])) if($_SESSION['zona'] == $zona) echo "selected"?>><?php echo $zona;?></option>
                    <?php
                   }
                   ?>
                </select>
                <br/>
                <br/>
                <input type="submit" name="establecer" value="Establecer Preferencias">
                <br/>
                <br/>
                <a href="Mostrar.php">Mostrar preferencias</a>

            </form>
        </fieldset>
    </body>
</html>
