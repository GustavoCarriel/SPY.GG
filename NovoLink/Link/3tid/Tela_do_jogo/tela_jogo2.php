<!DOCTYPE html>
<html lang="pt-br">

<!-- 

    numero inicial =1 => continuar
    maior que 1 = 2++ => parar

 -->



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_tela_jogo2.css">
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

                include('conexao.php');
                // $conexao = mysqli_connect("localhost", "u413309708_mrmurder", "Mrsmuder2022", "vu413309708_projeto");

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
                            <div class="loader">
                                <a href="#" class="detetive">
                                    <img src="../Tela_do_jogo/detetives/<?php echo $_SESSION['FotoDetetive'] ?>" alt="">
                                </a>
                            </div>
                        </button>




            </div>
        </header>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Detetive: <?php echo $linhaDT['NomeDetetive']; ?></h2>

                </div>
                <div class="modal-body">
                    <p>Nesse caso o detetive <?php echo $linhaDT['NomeDetetive']; ?> vai ter que descobrir que matou o medico Fred</p>
                    <!-- teste -->
                    <br>
                    <p><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem error nesciunt dicta. Pariatur ut assumenda porro dignissimos, voluptatem soluta? Voluptates atque ut officia incidunt odio perspiciatis reprehenderit expedita, sed itaque!</span><br><span>Officia omnis iusto beatae dolorum? Corrupti voluptatum ullam dicta aliquam dolore, et fuga adipisci itaque velit vero blanditiis officia, mollitia voluptatem consectetur ipsum eius? Neque in pariatur similique placeat atque!</span><br><span>Voluptatum cumque a, suscipit fugit inventore ut eaque hic corporis nostrum vel repellat minima, eligendi explicabo tenetur et perspiciatis! Perspiciatis et facere cum doloribus commodi. Dolorem hic labore nesciunt itaque.</span><br></p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae iure maiores doloremque recusandae? Corporis, numquam dolor. A nesciunt officia harum, iste expedita non consequuntur excepturi animi repudiandae aut odio laboriosam.
                    <!-- teste -->
                </div>
                <div class="modal-footer">
                    <h2>Jogador: <?php echo $linha['nome']; ?></h2>
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
include('conexao.php');

        
                // $conexao = mysqli_connect("localhost", "u413309708_mrmurder", "Mrsmuder2022", "vu413309708_projeto");

        $sqlD = "SELECT * FROM dialogos WHERE IdDialogo = $IdNovo";
        $relustD = mysqli_query($conexao, $sqlD);
        $pers = 4;
        $sqlP = "SELECT * FROM personagens WHERE Idpersonagem =$pers ";
        $resultP = mysqli_query($conexao, $sqlP);
        while ($linhaJogo = mysqli_fetch_array($relustD)) {

            while ($linhaP = mysqli_fetch_array($resultP)) {

                $_SESSION['idDialogo'] = $linhaJogo['IdDialogo'];


    ?>

                <?php
                $contA = $_SESSION['contA'];
                // $contA = 0;
                if ($contA == 0) {
                    $contA++;
                    $_SESSION['contA'] = $contA;


                ?>


                    <div class=" container">
                        <form action='' method='post'>
                            <img class="personagens-imagem" src="../Tela_do_jogo/detetives/Narrador.svg" width="100px" style="overflow: hidden;" alt="">

                            <div class="personagens-texto">
                                <h3>Misterio</h3>
                                <p>Ola é aqui onde você vai começar seu segundo caso, descubra qual foi a causa ou a arma usada no crime por Assasino.</p>
                            </div>

                            <input type='submit' class="botao" name='comecar' id='comecar' value='comecar'>
                        </form>
                    </div>
                <?php
                }
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
        include('conexao.php');
                // $conexao = mysqli_connect("localhost", "u413309708_mrmurder", "Mrsmuder2022", "vu413309708_projeto");

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

                if ($IdC <= 2) {
                ?>


                    <button class="button2" id="myBtn2">Instruções</button>

                    <div id="myModal2" class="modal">
                        <div class="modal-content">
                            <span class="close2">&times;</span>
                            <p>
                                - Com o cursor do mouse, arraste-o sobre os quadrados. <br>
                                - Os quadrados indicarão qual é a arma ou a causa e farão uma descrição de como uma pessoa pode morrer por causa delas.<br>
                                - Com essas descrições, descruba qual foi a arma usada ou a causa da morte da vitíma.
                            </p>
                        </div>
                    </div>
                    </article>

                    <!-- começo dos dialogos -->
                    <div id="DialogosJogo" class="dialogo-total">

                        <!-- 
                        <div class="contador">
                            <h4><?php echo $IdC; ?> /13</h4>
                        </div> -->




                        


                    </div>

                    <ul id="album-fotos">
                        <li id="foto01"><span> Injeção de Ar?<br> Ao encher uma seringa com ar e injetar em uma artéria, isso causará um coágulo, interrompendo a circulação sanguínea deixando o tecido sem oxigênio. </span></li>
                        <li id="foto02"><span> Lençol?<br> Ao cobrir as passagens de ar com um pano, o sufocamento ocorrerá em poucos minutos, isso deixará o individúo inconciente.</span></li>
                        <li id="foto03"><span> Overdose? <br> Ao usar um alta dosagem de alguma substância, lícita ou ilícita, isso causará o sobrecarregamento do corpo, podendo ocasionar na morte.</span></li>
                        <li id="foto04"><span> Pneumotórax? <br> O pneumotórax é provocado pela ruptura causada por uma bolha de ar em uma pequena área debilitada do pulmão</span></li>
                        <li id="foto05"><span> Enforcamento? <br>Ao interromper a circulação e ar pela traqueia, isso deixará o invidúo inconciente e em pouco minutos isso ocasionará na morte do mesmo.</span></li>
                        <li id="foto06"><span> Fratura no Cerebelo?<br> Dependendo da intensidade da lesão no cerebelo, seu resultado pode causar um sequela permanete ou até ocasionar em morte.</span></li>
                    </ul>
                    <!-- fim dos dialogos -->

                    <section class="sct_palpite1">

                        <article>

                            <button class="button3" id="myBtn3">Resposta</button>

                            <div id="myModal3" class="modal2"><span class="close3">&times;</span>

                                <div class="modal-content2">

                                    <p>
                                        - Selecione um botão e descubra qual foi a arma usada ou causa da morte da vitíma.<br>
                                    </p>
                                </div>
                            </div>

                            <div class="armas">
                                <a href="lost2.php"><button class="arma" id="myBtn3">Lençol</button></a>
                                <a href="lost2.php"><button class="arma" id="myBtn3">Overdose</button></a>
                                <a href="winner.html"><button class="arma" id="myBtn3">Injeção de Ar</button></a>
                                <a href="lost2.php"><button class="arma" id="myBtn3">Pneumotórax</button></a>
                                <a href="lost2.php"><button class="arma" id="myBtn3">Enforcamento</button></a>
                                <a href="lost2.php"><button class="arma" id="myBtn3">Fratura no Cerebelo</button></a>
                            </div>

                        </article>
                    </section>



    <?php
                }
            }
        }
    }


    continuar();

    ?>



    <script>
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



        // modal 2


        var modal2 = document.getElementById("myModal2");

        var btn2 = document.getElementById("myBtn2");

        var span = document.getElementsByClassName("close2")[0];

        btn2.onclick = function() {
            modal2.style.display = "block";
        }

        span.onclick = function() {
            modal2.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }


        var modal3 = document.getElementById("myModal3");

        var btn3 = document.getElementById("myBtn3");

        var span3 = document.getElementsByClassName("close3")[0];

        btn3.onclick = function() {
            modal3.style.display = "block";
        }

        span3.onclick = function() {
            modal3.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal3) {
                modal3.style.display = "none";
            }
        }

        // modal 3


        var modal4 = document.getElementById("myModal4");

        var btn4 = document.getElementById("myBtn4");

        var span4 = document.getElementsByClassName("close4")[0];

        btn4.onclick = function() {
            modal4.style.display = "block";
        }

        span4.onclick = function() {
            modal4.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal4) {
                modal4.style.display = "none";
            }
        }
    </script>
</body>

</html>