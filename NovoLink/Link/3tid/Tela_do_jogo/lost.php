<!DOCTYPE html>
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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="lost.css">
    <title>SPY.GG - Você Perdeu!</title>
</head>

<body id="fundo">
    <div class="box">
        <h1>VOCÊ PERDEU!</h1>
        <p>QUE PENA DETETIVE! MELHORE AS SUAS TÉCNICAS DE INVESTIGAÇÃO.</p><br><br>
        <a href="tela_jogo.php">RECOMEÇAR</a>
    </div>
</body>

</html>