<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="question.css">
    <title>SPY.GG - Fim de um misterio?</title>
</head>

<body id="fundo">

    <div class="box">
        <h1 class="h1">QUEM MATOU O MÉDICO?</h1>
        <?php
        session_start();
        $_SESSION['contA'] =0;
        // $nome = $_SESSION['nome'];
        // echo $nome;
        ?>


        <form action="" method="post">

            <div class="itens">

                <div class="pers">
                    <button name="pers1" class="button" id="pers1">
                        <img src="img/ana.svg" alt="">
                    </button>
                </div>

                <div class="pers">
                    <button name="pers2" class="button" id="pers2">
                        <img src="img/fred.svg" alt=""><br>
                    </button>
                </div>

                <div class="pers">
                    <button name="pers3" class="button" id="pers3">
                        <img src="img/joao.svg" alt=""><br>
                    </button>
                </div>

                <div class="pers">
                    <button name="pers4" class="button" id="pers4">
                        <img src="img/joseph.svg" alt=""><br>
                    </button>
                </div>

                <div class="pers">
                    <button name="pers5" class="button" id="pers5">
                        <img src="img/Meredith.svg" alt=""><br>
                    </button>
                </div>

                <div class="pers">
                    <button name="pers6" class="button" id="pers6">
                        <img src="img/Patricia.svg" alt=""><br>
                    </button>
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['pers1'])) {
            echo "inocente 1";
            header('location:' . "winner.php");
        }

        if (isset($_POST['pers2'])) {
            echo "inocente 2";
            header('location:' . "lost.php");
        }




        if (isset($_POST['pers3'])) {
            echo "inocente 3";
            header('location:' . "lost.php");
        }


        if (isset($_POST['pers4'])) {
            echo "culpado";
            header('location:' . "lost.php");
        }


        if (isset($_POST['pers5'])) {
            echo "inocente 5";
            header('location:' . "lost.php");
        }


        if (isset($_POST['pers6'])) {
            echo "inocente 6";
            header('location:' . "lost.php");
        }


        ?>

    </div>

</body>

</html>