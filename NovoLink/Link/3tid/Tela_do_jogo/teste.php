<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste apagar div</title>
</head>
<body>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_tela_jogo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title>M's murder</title>
</head>

<body>
    <div class="container_all">
        <header>
            <h1>M's murder</h1>



            <div class="image">

                <?php
                session_start();

                $conexao = mysqli_connect("localhost", "root", "", "projeto");
                $nome = $_SESSION['nome'];
                $id = $_SESSION['IdUsuario'];
                $selt = "SELECT * FROM usuario WHERE id ='$id'";
                $resultSelt = mysqli_query($conexao, $selt);
                while ($linha = mysqli_fetch_array($resultSelt)) {
                    $IdN = $linha['detetive'];

                    $seltDT = "SELECT * FROM detetive WHERE idDetetive ='$IdN'";
                    $resultDT = mysqli_query($conexao, $seltDT);
                    while ($linhaDT = mysqli_fetch_array($resultDT)) {

                        $_SESSION['FotoDetetive'] = $linhaDT['FotoDetetive'];
                ?>
                        <button id="myBtn">
                            <a href="#" class="detetive">
                                <img src="../Tela_do_jogo/detetives/<?php echo $_SESSION['FotoDetetive'] ?>" alt="">
                            </a>
                        </button>




            </div>
        </header>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Detetive <?php echo $linhaDT['NomeDetetive']; ?></h2>
                    <h2>Jogador <?php echo $linha['nome']; ?></h2>
                </div>
                <div class="modal-body">
                    <p>Nesse caso o detetive <?php echo $linhaDT['NomeDetetive']; ?> vai ter que descobrir que matou o medico Fred</p>
                </div>
                <div class="modal-footer">
                    <h3>Modal Footer</h3>
                </div>
            </div>

        </div>


<?php


                        $_SESSION['NomeDetetive'] = $linhaDT['NomeDetetive'];
                    }
                }
?>
<section class="sct_dialogo">


    <?php


    // $sqlD = "SELECT * FROM dialogos";
    // $relustD = mysqli_query($conexao, $sqlD);
    $IdNovo = 1;
    function comecar($IdNovo)
    {


        $conexao = mysqli_connect("localhost", "root", "", "projeto");
        $sqlD = "SELECT * FROM dialogos WHERE IdDialogo = $IdNovo";
        $relustD = mysqli_query($conexao, $sqlD);
        $pers = 4;
        $sqlP = "SELECT * FROM personagens WHERE Idpersonagem =$pers ";
        $resultP = mysqli_query($conexao, $sqlP);
        while ($linhaJogo = mysqli_fetch_array($relustD)) {

            while ($linhaP = mysqli_fetch_array($resultP)) {

                $_SESSION['idDialogo'] = $linhaJogo['IdDialogo'];


    ?>


                <div class=" container">
                    <form action='' method='post'>
                        <img class="personagens-imagem" src="../Tela_do_jogo/detetives/Narrador.svg" width="100px" style="overflow: hidden;" alt="">

                        <div class="personagens-texto">
                            <h3>misterio</h3>
                            <p>Ola é aqui onde você vai começar seu primeiro caso</p>
                        </div>

                        <input type='submit' class="botao" name='comecar' id='comecar' value='comecar'>
                    </form>
                </div>
                <?php

                if (isset($_POST['comecar'])) {
                    $_SESSION['IdNovo'] = $IdNovo;
                    $_SESSION['pers'] = $pers;
                }
            }
        }
    }

    comecar($IdNovo);


    function continuar()
    {
        $conexao = mysqli_connect("localhost", "root", "", "projeto");
        $_SESSION['IdNovo']++;
        $IdC = $_SESSION['IdNovo'];
$_SESSION['apagarId'] = $IdC;
        $sqlD = "SELECT * FROM dialogos WHERE IdDialogo = $IdC";
        $resultD = mysqli_query($conexao, $sqlD);
        while ($linhaC = mysqli_fetch_array($resultD)) {

            $ccc = $linhaC['IdPers'];
            $sqlP = "SELECT * FROM personagens WHERE Idpersonagem = $ccc";
            $resultP = mysqli_query($conexao, $sqlP);


            while ($linhaP = mysqli_fetch_array($resultP)) {
                ?>
                <!-- começo dos dialogos -->
                <div id="DialogosJogo" class="dialogo-total">


                    <div class="contador">
                        <h4><?php echo $IdC; ?> /13</h4>
                    </div>
                    <div class="dialogo-personagens">

                        <img class="personagens-imagem" src="img/<?php echo $linhaP['Fotopersonagem'] ?>" width="100px" alt="">
                        <div class="personagens-texto">
                            <p><?php echo $linhaC['dialogo'] ?></p>
                            <h3><?php echo $linhaP['Nomeperso']; ?></h3>
                        </div>



                        <form action="tela_jogo.php" method="post">
                            <input type="submit" class="botao" name="continuar" id="continuar" value="continuar">
                        </form>
                    </div>

                    <div class="dialogo-detetive">
                        <img class="personagens-imagem" src="../Tela_do_jogo/detetives/<?php echo $_SESSION['FotoDetetive'] ?>" width="100px" alt="">
                        <p>Agora eu irei interrogar <span class="nome-dialogo"> <?php echo $linhaP['Nomeperso']; ?></span></p>
                        <h3><?php echo $_SESSION['NomeDetetive'] ?></h3>
                    </div>
                </div>
                <!-- fim dos dialogos -->
    <?php


                if ($IdC == 14) {

                    header('location:' . "question.php");
                }
            }

            // if($IdC =10){
            //     echo"ssss";
            // }
        }
    }

    continuar();
    ?>


</section>
<section class="sct_palpite">
    <div class="suspeitos">
        <div class="div_personagem">
            <img src="img/Ana.svg" alt="">
            <h4></h4>
        </div>
        <div class="div_personagem">
            <img src="img/Fred.svg" alt="">
            <h4></h4>
        </div>
        <div class="div_personagem">
            <img src="img/Joao.svg" alt="">
            <h4></h4>
        </div>
        <div class="div_personagem">
            <img src="img/Joseph.svg" alt="">
            <h4></h4>
        </div>
        <div class="div_personagem">
            <img src="img/Meredith.svg" alt="">
            <h4></h4>
        </div>

    </div>


    <div class="inocentes">
        <div class="div_personagem">
            <img src="img/Ana.svg" alt="">
            <h4></h4>
        </div>
        <div class="div_personagem">
            <img src="img/Fred.svg" alt="">
            <h4></h4>
        </div>
        <div class="div_personagem">
            <img src="img/Joao.svg" alt="">
            <h4></h4>
        </div>
        <div class="div_personagem">
            <img src="img/Joseph.svg" alt="">
            <h4></h4>
        </div>
        <div class="div_personagem">
            <img src="img/Meredith.svg" alt="">
            <h4></h4>
        </div>

    </div>
</section>
    </div>

    <script>
        // function ComecarJogo(){
        //     var btnComecar=document.getElementById("btnComecar");
        //     var DialogosJogo=document.getElementById("DialogosJogo");

        //     if (DialogosJogo.style.display === "none") {
        //         DialogosJogo.style.display ="block";
        //         btnComecar.style.display ="none";
        //     }else{
        //         DialogosJogo.style.display ="block";
        //         btnComecar.style.display ="none";
        //     }
        // }


        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
</body>
</html>