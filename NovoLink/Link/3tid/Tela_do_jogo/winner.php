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
      <p>Você desvendou o misterio de assassinato e prendeu o assassino!</p><br><br>
      <a href="tela_jogo2.php">SEGUNDA FASE</a>
    </div>
    
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
    
        // $nome = $_SESSION['nome'];
        // echo $nome;
        ?>
  </body>
</html>