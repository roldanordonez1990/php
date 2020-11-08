<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>



        <form name="input" action="variosComponentes2.php" method="post">
            Nombre: <input type="text" name="nombre" value="" />
            <br/>
            <br/>
            Apellidos: <input type="text" name="apellidos" value="" />
            <br/>
            <br/>

            Aficiones: 
            <br/>
            <input type="checkbox" name="aficion[]" value="cine">

            <label for="vehicle1">Cine</label><br>

            <input type="checkbox" name="aficion[]" value="lectura">

            <label for="vehicle1">Lectura</label><br>

            <input type="checkbox" name="aficion[]" value="TV">

            <label for="vehicle1">TV</label><br>

            <input type="checkbox" name="aficion[]" value="deporte">

            <label for="vehicle1">Deporte</label><br>

            <input type="checkbox" name="aficion[]" value="musica">

            <label for="vehicle1">Música</label><br>
            <br/>

            Estudios:
            <br/>
            <select multiple name="estudios[]">
                <option value="eso">ESO</option>
                <option value="bachiller">Bachiller</option>
                <option value="fp">FP</option>
                <option value="uni">Universidad</option>
                <option value="master">Master</option>
            </select>

            <br />
            <br />

            Sexo: 
            <br/>
            <input type="radio" name="genero" value="hombre"> hombre
            <br/>
            <input type="radio" name="genero" value="mujer"> mujer<br/>  
            <br/> 
            <input type="submit" value="Enviar" name="enviar"/>
            <br/>
        </form>
        <?php
        ?>




    </body>
</html>

