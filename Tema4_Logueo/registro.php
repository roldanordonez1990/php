<?php
session_name();
session_start();

if (isset($_COOKIE['intentos']) && ($_COOKIE['intentos']) == 3) {



    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);

        $error = $conex->errorInfo();
    } catch (PDOException $exc) {

        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
    
    if (isset($_POST['enviar'])) {
            $result = $conex->query("INSERT INTO perfil_usuario (nombre,apellidos,direccion,localidad,user,pass,color_letra,color_fondo,tipo_letra,tam_letra) VALUES('$_POST[nombre]','$_POST[apellido]','$_POST[direccion]','$_POST[localidad]','$_POST[email]','$_POST[pass]','$_POST[colorLetra]','$_POST[colorFondo]','$_POST[tipoLetra]','$_POST[tam_letra]')");
        }
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>

        </head>
        <body>
            <div id="login">
                <fieldset id="login" class=>

                    <legend id="login">Formulario de registro</legend>
                    <form action="inicio.php" method="post">
                        Nombre: <input type="text" name="nombre" value="">
                        <br>
                        Apellido: <input type="text" name="apellido" value="">
                        <br>
                        Dirección: <input type="text" name="direccion" value="">
                        <br>
                        Localidad: <input type="text" name="localidad" value="">
                        <br>
                        Email: <input type="text" name="email" value="">
                        <br>
                        Password: <input type="text" name="pass" value="">
                        <br>
                        <br>
                        Color letra: <select type="text" name="colorLetra">
    <?php
    $colorLetra = ["rojo" => "red", "azul" => "blue", "verde" => "green", "amarillo" => "yellow", "negro" => "black"];
    foreach ($colorLetra as $color => $values) {
        ?>
                                <option value="<?php echo $values ?>" <?php if (isset($_SESSION['colorLetra'])) if ($_SESSION['colorLetra'] == $color) echo "selected" ?>><?php echo $color; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <br>
                        Color fondo: <select type="text" name="colorFondo">
    <?php
    $colorFondo = ["rojo" => "red", "azul" => "blue", "verde" => "green", "amarillo" => "yellow", "negro" => "black"];
    foreach ($colorFondo as $color => $values) {
        ?>
                                <option value="<?php echo $values ?>" <?php if (isset($_SESSION['colorFondo'])) if ($_SESSION['colorFondo'] == $color) echo "selected" ?>><?php echo $color; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <br>
                        Tipo de letra: <select type="text" name="tipoLetra">
    <?php
    $tipoLetra = ["Times New Roman", "Verdana", "Arial", "Comic Sans"];
    foreach ($tipoLetra as $letra) {
        ?>
                                <option value="<?php echo $letra ?>" <?php if (isset($_SESSION['tipoLetra'])) if ($_SESSION['tipoLetra'] == $color) echo "selected" ?>><?php echo $letra; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <br>
                        Tamaño letra: <select type="number" name="tam_letra">
    <?php
    for ($i = 12; $i <= 18; $i++) {

        echo " <option value='$i'";
        if (isset($_SESSION['tamanoLetra']) == $i) {
            echo 'selected';
        }

        echo ">" . $i . "</option>";
    }
    ?>
                        </select>
                        <br>
                        <input id="login" type="submit" name="enviar" value="Enviar">

                    </form>
                </fieldset>
            </div>
        </body>
    </html>
    <?php
} else {

    header('location: index.php');
}
?>