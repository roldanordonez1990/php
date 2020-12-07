<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './dadoPoker.php';
        
        $dado1=new dadoPoker();
        $tirada=dadoPoker::tirar($dado1);
        echo "Tirada del dado1: ". $tirada."<br>";
        echo dadoPoker::getTiradas()."<br>";
        
        $dado2=new dadoPoker();
        $tirada=dadoPoker::tirar($dado2);
        echo "Tirada del dado2: ". $tirada."<br>";
        echo dadoPoker::getTiradas()."<br>";
        
        $dado3=new dadoPoker();
        $tirada=dadoPoker::tirar($dado3);
        echo "Tirada del dado3: ". $tirada."<br>";
        echo dadoPoker::getTiradas()."<br>";
        
        $dado4=new dadoPoker();
        $tirada=dadoPoker::tirar($dado4);
        echo "Tirada del dado4: ". $tirada."<br>";
        echo dadoPoker::getTiradas()."<br>";
        
        $dado5=new dadoPoker();
        $tirada=dadoPoker::tirar($dado5);
        echo "Tirada del dado5: ". $tirada."<br>";
        echo dadoPoker::getTiradas()."<br>";
        
        echo dadoPoker::getTiradas();
        
        ?>
    </body>
</html>