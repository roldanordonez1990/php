<?php
session_start();



if (isset($_COOKIE['intentos']) && $_COOKIE['intentos'] != 0) {
    
    if(isset($_SESSION['nombre'])){
    header('location: inicio.php');
}

    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $error = $conex->errorInfo();
    } catch (PDOException $exc) {

        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }



    if (isset($_POST['enviar']) && preg_match("/^[a-z]{1,50}$/i", $_POST["nombre"]) && preg_match("/^[a-z]{1,50}$/i", $_POST["apellido"]) && preg_match("/^[a-z]{1,50}$/i", $_POST["direccion"]) && preg_match("/^[a-z]{1,50}$/i", $_POST["localidad"]) && preg_match("/^[a-z0-9-]{1,}@[a-z0-9-]{1,}(\.[a-z]{2,})$/i", $_POST["email"]) && preg_match("/^[0-9a-z]{1,50}$/i", $_POST["pass"]) && !empty($_POST['color_letra']) && !empty($_POST['color_fondo']) && !empty($_POST['tipo_letra']) && !empty($_POST['tam_letra'])) {
        $passCodificada = md5($_POST['pass']);
        $result2 = $conex->query("SELECT * from perfil_usuario where user='$_POST[email]'");
        if ($result2->rowCount()) {
            $error = true;
           
        }else{
                $result = $conex->exec("INSERT INTO perfil_usuario (nombre,apellidos,direccion,localidad,user,pass,color_letra,color_fondo,tipo_letra,tam_letra) VALUES('$_POST[nombre]','$_POST[apellido]','$_POST[direccion]','$_POST[localidad]','$_POST[email]','$passCodificada','$_POST[color_letra]','$_POST[color_fondo]','$_POST[tipo_letra]','$_POST[tam_letra]')");
                
                 
                $_SESSION['nombre'] = $_POST['nombre'];
                $_SESSION['apellidos'] = $_POST['apellido'];
                $_SESSION['direccion'] = $_POST['direccion'];
                $_SESSION['localidad'] = $_POST['localidad'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['pass'] = $_POST['pass'];
                $_SESSION['color_letra'] = $_POST['color_letra'];
                $_SESSION['color_fondo'] = $_POST['color_fondo'];
                $_SESSION['tipo_letra'] = $_POST['tipo_letra'];
                $_SESSION['tam_letra'] = $_POST['tam_letra'];
            
            header('location: inicio.php');
            
        }
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
                    <form action="" method="post">
                        Nombre:<input type="text" name="nombre" <?php
                        if (!empty($_POST['nombre'])) {
                            echo 'value="' . $_POST['nombre'] . '"';
                        }
                        ?>/>
                                     
                                      <?php
                                      if (isset($_POST['enviar'])) {
                                          if (!preg_match("/^[a-z]{1,50}$/i", $_POST["nombre"])) {
                                              echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                                          }
                                      }
                                      ?><br><br>

                        Apellido:<input type="text" name="apellido" <?php
                        if (!empty($_POST['apellido'])) {
                            echo 'value="' . $_POST['apellido'] . '"';
                        }
                        ?>/>
                                        <?php
                                        if (isset($_POST['enviar'])) {
                                            if (!preg_match("/^[a-z]{1,50}$/i", $_POST["apellido"])) {
                                                echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                                            }
                                        }
                                        ?><br><br>
                        Dirección:<input type="text" name="direccion" <?php
                        if (!empty($_POST['direccion'])) {
                            echo 'value="' . $_POST['direccion'] . '"';
                        }
                        ?>/>
                                         <?php
                                         if (isset($_POST['enviar'])) {
                                             if (!preg_match("/^[a-z]{1,50}$/i", $_POST["direccion"])) {
                                                 echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                                             }
                                         }
                                         ?><br><br>
                        Localidad:<input type="text" name="localidad" <?php
                        if (!empty($_POST['localidad'])) {
                            echo 'value="' . $_POST['localidad'] . '"';
                        }
                        ?>/>
                                         <?php
                                         if (isset($_POST['enviar'])) {
                                             if (!preg_match("/^[a-z]{1,50}$/i", $_POST["localidad"])) {
                                                 echo "<span style='color:red'>No puede estar vacio y se permiten solo letras</span>";
                                             }
                                         }
                                         ?><br><br>
                        Email:<input type="text" name="email" <?php
                        if (!empty($_POST['user'])) {
                            echo 'value="' . $_POST['user'] . '"';
                        }
                        ?>/>
                                     <?php
                                     if (isset($_POST['enviar'])) {

                                         if (!preg_match("/^[a-z0-9-]{1,}@[a-z0-9-]{1,}(\.[a-z]{2,})$/i", $_POST["email"])) {
                                             echo "<span style='color:red'>No puede estar vacio y debe tener el formato a@dd. </span>";
                                         }
                                     }
                                     
                                     if (isset($_POST['enviar']) && $error == true) {
                                            echo "<span style='color:red'>Este email ya existe</span>";
                                         
                                     }
                                     ?><br><br>
                        Contraseña:<input type="password" name="pass" <?php
                        if (!empty($_POST['pass'])) {
                            echo 'value="' . $_POST['pass'] . '"';
                        }
                        ?>/>
                                          <?php
                                          if (isset($_POST['enviar'])) {
                                              if (!preg_match("/^[0-9a-z]{1,50}$/i", $_POST["pass"])) {
                                                  echo "<span style='color:red'>No puede estar vacio</span>";
                                              }
                                          }
                                          ?><br><br>

                        Color de Letra:<select name="color_letra">
                            <?php
                            $colorLetra = ["negro" => "black", "rojo" => "red", "azul" => "blue", "verde" => "green"];
                            foreach ($colorLetra as $key => $value) {
                                echo '<option value="' . $value . '" ';
                                if (!empty($_POST["color_letra"]) && $_POST["color_letra"] == $value) {
                                    echo 'selected';
                                }
                                echo ">" . $key . '</option>';
                            }
                            ?></select><br><br>
                        Color de Fondo:<select name="color_fondo">
                            <?php
                            $colorFondo = ["blanco" => "white", "rojo" => "red", "azul" => "blue", "verde" => "green"];
                            foreach ($colorFondo as $key => $value) {
                                echo '<option value="' . $value . '" ';
                                if (!empty($_POST["color_fondo"]) && $_POST["color_fondo"] == $value) {
                                    echo 'selected';
                                }
                                echo ">" . $key . '</option>';
                            }
                            ?></select><br><br>
                        Tipo de Letra:<select name="tipo_letra">
                            <?php
                            $tipoLetra = ["Arial", "Times New Roman", "Fantasy", "Comic Sans"];
                            foreach ($tipoLetra as $key) {
                                echo '<option value="' . $key . '" ';
                                if (!empty($_POST["tipo_letra"]) && $_POST["tipo_letra"] == $key) {
                                    echo 'selected';
                                }
                                echo ">" . $key . '</option>';
                            }
                            ?></select><br><br>
                        Tamaño letra: <select type="number" name="tam_letra">
                            <?php
                            for ($i = 12; $i <= 22; $i++) {

                                echo " <option value='$i'";
                                if (isset($_SESSION['tam_letra']) == $i) {
                                    echo 'selected';
                                }

                                echo ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type='submit' name='enviar' value='Registrar'/>
                        <input type='submit' name='volver' value='Volver'/>
                    </form>
                </fieldset>
            </div>
        </body>
    </html>
    <?php
} else {

    header('location: index.php');
}

if(isset($_POST['volver'])){
    header('location: index.php');
}
?>