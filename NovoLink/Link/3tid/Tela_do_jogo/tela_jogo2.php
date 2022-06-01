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
    <title>Mr's murder</title>
</head>

<body>
    <div class="container_all">
        <header>
            <h1><img src="logodetetive2.png"> Mr's murder</h1>


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
                    <p> Era quinta-feira pouco mais das 22:40, o tempo estava frio e com uma neblina que cobria o formato exato da clínica psiquiátrica de “Care of Crazy”, a cidade por sua vez estava tranquila, pela janela a Enfermeira Ana observava o movimento.
                    </p><br>
                    <p> Patricia a recepcionista, aguardava o seu plantão encerrar, conversando com a médica Meredith que havia colocado o paciente Joseph em uma das alas, após o passeio noturno no Jardim. Na cozinha, o guarda João se preparava para retomar seu posto no hospital, após uma pausa para o lanche. No andar de cima, o médico Fred analisava seus prontuários.
                    </p>
                    <p> <br>
                        Tudo estava calmo e estranho, na televisão um temporal anunciava chegar entre 00:00 e 01:00, todos os funcionários foram de preparo fechar todas as portas, janelas, seria uma noite daquelas na clínica, entretanto algo saiu fora do esperado, alguém acionou o botão de incêndio de emergência, este que abria as alas de todos os pacientes , todos os funcionários foram de imediato fechar as portas das alas, antes que a clínica virasse uma loucura, todos se dividiram, pois haviam portas no andar de cima e no andar de baixo. Após o ocorrido, a recepcionista Patricia perguntou aos outros se haviam visto Fred, pois ele estava com a ficha de todos os pacientes de cada dia.
                    </p>
                    <p> <br>
                        Um silêncio ecoou entre entre o andar principal da clínica, até que Meredith veio de encontro ofegante, dizer que Joseph não estava, em sua ala, todos correram para encontrá-lo procurando pela clínica, as câmeras estavam em manutenção, o que dificultava achá-lo.
                    </p>
                    <p> <br>
                        Joseph possuía um quarto separado, pois seu estado era perigoso, nele foi encontrado o corpo de Fred. A enfermeira Ana, e o Guarda João encontraram Joseph desmaiado no Jardim, ele havia tentado fugir, mas não conseguiu, quando acordou disse que a única coisa que se lembrava era de alguém entrando no seu quarto, antes dele mesmo sair.
                    </p>
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






    <button class="button2" id="myBtn2">Instruções</button>

    <div id="myModal2" class="modal">
        <div class="modal-content">
            <span class="close2">&times;</span>
            <p>
            <h3>Olá, é aqui onde você vai começar seu segundo caso, descubra qual foi a causa ou a arma usada no crime pelo(a) Assasino(a).</h3><br>
            - Com o cursor do mouse, passe-o sobre as imagens. <br>
            - As imagens indicarão qual é a arma ou a causa e farão uma descrição de como uma pessoa pode morrer por causa delas.<br>
            - Com essas descrições, descubra qual foi a arma usada ou a causa da morte da vitíma.
            </p>
        </div>
    </div>
    </article>

    <!-- começo dos dialogos -->


    <ul id="album-fotos">
        <li id="foto01"><span> João:<br> Guarda</span></li>
        <li id="foto02"><span>Meredith:<br> Medica</span></li>
        <li id="foto03"><span>Patricia:<br> Secretaria</span></li>
        <li id="foto04"><span>Ana:<br> Enfermeira </span></li>
        <li id="foto05"><span>Joseph:<br>Paciente</span></li>
    </ul>

    <div class="lista_mapa">
        <div class="fundo-lista">   
            <img src="caderno.jpg">
         <div class="lista2">
                <h2>Depoimento dos supeitos:</h2>
                <hr class="hr">
                <li>João</li>
                <hr class="hr">
                <li>Meredith</li>
                <hr class="hr">
                <li>Patricia</li>
                <hr class="hr">
                <li>Joseph</li>
            </div>
        </div>
        
        <script>
            function imageZoom(imgID, resultID) {
                var img, lens, result, cx, cy;
                img = document.getElementById(imgID);
                result = document.getElementById(resultID);
                /*create lens:*/
                lens = document.createElement("DIV");
                lens.setAttribute("class", "img-zoom-lens");
                /*insert lens:*/
                img.parentElement.insertBefore(lens, img);
                /*calculate the ratio between result DIV and lens:*/
                cx = result.offsetWidth / lens.offsetWidth;
                cy = result.offsetHeight / lens.offsetHeight;
                /*set background properties for the result DIV:*/
                result.style.backgroundImage = "url('" + img.src + "')";
                result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
                /*execute a function when someone moves the cursor over the image, or the lens:*/
                lens.addEventListener("mousemove", moveLens);
                img.addEventListener("mousemove", moveLens);
                /*and also for touch screens:*/
                lens.addEventListener("touchmove", moveLens);
                img.addEventListener("touchmove", moveLens);

                function moveLens(e) {
                    var pos, x, y;
                    /*prevent any other actions that may occur when moving over the image:*/
                    e.preventDefault();
                    /*get the cursor's x and y positions:*/
                    pos = getCursorPos(e);
                    /*calculate the position of the lens:*/
                    x = pos.x - (lens.offsetWidth / 2);
                    y = pos.y - (lens.offsetHeight / 2);
                    /*prevent the lens from being positioned outside the image:*/
                    if (x > img.width - lens.offsetWidth) {
                        x = img.width - lens.offsetWidth;
                    }
                    if (x < 0) {
                        x = 0;
                    }
                    if (y > img.height - lens.offsetHeight) {
                        y = img.height - lens.offsetHeight;
                    }
                    if (y < 0) {
                        y = 0;
                    }
                    /*set the position of the lens:*/
                    lens.style.left = x + "px";
                    lens.style.top = y + "px";
                    /*display what the lens "sees":*/
                    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
                }

                function getCursorPos(e) {
                    var a, x = 0,
                        y = 0;
                    e = e || window.event;
                    /*get the x and y positions of the image:*/
                    a = img.getBoundingClientRect();
                    /*calculate the cursor's x and y coordinates, relative to the image:*/
                    x = e.pageX - a.left;
                    y = e.pageY - a.top;
                    /*consider any page scrolling:*/
                    x = x - window.pageXOffset;
                    y = y - window.pageYOffset;
                    return {
                        x: x,
                        y: y
                    };
                }
            }
        </script>


        <div class="img-zoom-container">
            <img id="myimage" src="caderno.jpg" width="300" height="150">
            <div id="myresult" class="img-zoom-result"></div>
        </div>


        <script>
            // Initiate zoom effect:
            imageZoom("myimage", "myresult");
        </script>


</div>

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
                <a href="lost2.php"><button class="arma" id="myBtn3">Envenenamento</button></a>
                <a href="lost2.php"><button class="arma" id="myBtn3">Enforcamento</button></a>
                <a href="lost2.php"><button class="arma" id="myBtn3">Fratura no Cerebelo</button></a>
            </div>

        </article>
    </section>







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