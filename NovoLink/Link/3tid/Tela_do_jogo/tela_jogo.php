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
                                <h3>misterio</h3>
                                <p>Ola é aqui onde você vai começar seu primeiro caso aperte o botão pra começar o jogo.</p>
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

                if ($IdC <= 13) {
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




                        </div>

                        <div class="dialogo-detetive">
                            <div class="part-detetive">
                                <img class="personagens-imagem" src="../Tela_do_jogo/detetives/<?php echo $_SESSION['FotoDetetive'] ?>" width="100px" alt="">
                                <p>Agora eu irei interrogar <span class="nome-dialogo"> <?php echo $linhaP['Nomeperso']; ?></span></p>
                                <h3><?php echo $_SESSION['NomeDetetive'] ?></h3>
                            </div>

                            <div class="dialogo-continuar">
                                <form action="tela_jogo.php" method="post">
                                    <input type="submit" class="botao" name="continuar" id="continuar" value="continuar">
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- fim dos dialogos -->
    <?php
                }

                if ($IdC == 14) {
                    header('location:' . "question.php");
                    echo "mudar pagina";
                }
            }

            // if($IdC =10){
            //     echo"ssss";
            // }
        }
  
    ?>


</section>
<?php
  if ($IdC == 13){
  ?>
<section class="sct_palpite">

    <article>


        <button class="button1" id="myBtn2">Instruções</button>

        <div id="myModal2" class="modal">
            <div class="modal-content">
                <span class="close2">&times;</span>
                <p>
                    - Selecione uma testemunha da esquerda para a direita e arraste para o campo verde ou vermelho.<br>
                    - O campo vermelho será usado para separar os suspeitos entre as testemunhas. <br>
                    - O campo verde sará usado para separar os inocentes entre as testemunhas.<br>
                    - Use esse recurso como seu diario de investigação.

                </p>
            </div>

        </div>
        <h3></h3>
    </article>

    <div class="caixa-43">

    
    <div id="div1" ondrop="soltar(event)" ondragover="permitirSoltar(event)">
        <img id="drag1" src="img/Meredith.svg" draggable="true" ondragstart="arrastar(event)" width="60px" height="60px">
        <img id="drag1" src="img/Fred.svg" draggable="true" ondragstart="arrastar(event)" width="60px" height="60px">
        <img id="drag1" src="img/Joseph.svg" draggable="true" ondragstart="arrastar(event)" width="60px" height="60px">
        <img id="drag1" src="img/Patricia.svg" draggable="true" ondragstart="arrastar(event)" width="60px" height="60px">
        <img id="drag1" src="img/Joao.svg" draggable="true" ondragstart="arrastar(event)" width="60px" height="60px">
        <img id="drag1" src="img/Ana.svg" draggable="true" ondragstart="arrastar(event)" width="60px" height="60px">
    </div>


    <div id="div2" ondrop="soltar(event)" ondragover="permitirSoltar(event)"></div>


    <div id="div3" ondrop="soltar(event)" ondragover="permitirSoltar(event)"> </div>

    </div>
</div>
    </section>


    </div>

    <?php
}else{
}
    ?>
<section class="sct_palpite">

<article>


    <button class="button1" id="myBtn2">Instruções</button>

    <div id="myModal2" class="modal">
        <div class="modal-content">
            <span class="close2">&times;</span>
            <p>
                - Selecione uma testemunha da esquerda para a direita e arraste para o campo verde ou vermelho.<br>
                - O campo vermelho será usado para separar os suspeitos entre as testemunhas. <br>
                - O campo verde sará usado para separar os inocentes entre as testemunhas.<br>
                - Use esse recurso como seu diario de investigação.<br>
                - ESSE RECURSO SÓ SERÁ DESBLOQUEADO NA ÚLTIMA PISTA.

            </p>
        </div>

    </div>
</article>
<div class="caixa-43"></div>

<?php
}
continuar();

?>
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



        function permitirSoltar(ev) {
            ev.preventDefault();
        }

        function arrastar(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function soltar(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>
</body>

</html>