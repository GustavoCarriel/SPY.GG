<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="winner.css">
    <title>SPY.GG - Parabéns Detetive!</title>
</head>

<body id="fundo">

    <div class="box">
        <h1>PARABÉNS DETETIVE!</h1>
        <p>Você desvendou o misterio, prendeu o assassino e descobriu que arma foi usada no crime, bom trabalho!</p><br><br>
        <a href="tela_jogo2.php">FINAL</a>
    </div>

</body>

<?php
 session_start();
 $_SESSION['Nivel'] =2;
?>

</html>