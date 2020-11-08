<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
       
        <?php

        $nombres = array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa");
         
        echo count($nombres). " elementos";
        
        foreach ($nombres as $nombre => $value){
            
            echo "<ul>";
            echo "<li>".$value."</li>";
            echo "</ul>";
        }
       
        ?>
            
        
    </body>
</html>

