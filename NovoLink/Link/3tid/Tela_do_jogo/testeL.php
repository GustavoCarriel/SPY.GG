<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

session_start();
$IdNovo = 1;
    function comecar($IdNovo)
    {

        include('conexao.php');
        $sqlD = "SELECT * FROM dialogos WHERE IdDialogo = $IdNovo";
        $relustD = mysqli_query($conexao, $sqlD);
        $pers = 4;
        $sqlP = "SELECT * FROM personagens WHERE IdDial =$pers ";

        $resultP = mysqli_query($conexao, $sqlP);




        
                    $_SESSION['IdNovo'] = $IdNovo++;
             
                echo $IdNovo."<br>".$pers;
                $_SESSION['teste'] = 2;
            
        }
    

    comecar($IdNovo);

    ?>

    <a href="tela_jogo.php">tela jogo</a>
</body>
</html>