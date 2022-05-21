<!DOCTYPE html>
<html lang="pt-br">
<!-- javascript -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>

<body>
    <main>
        <h1>Cadastro</h1>
        <div class="container">
            <div class="box">
                <form name="cad" action="" method="post">
                    <h4>Usuário</h4>

                    <input type="text" name="usuario" id="Usuario" autofocus title="Exemplo: Ana Silva Santos" pattern="([A-ZÀ-Ú]{3})*[a-zá-ú]{3,})[A-Z][a-z].* [A-Z][a-z].*" required>


                    <h4>Email</h4>
                    <input type="text" name="email" id="Email" required>


                    <h4>Senha</h4>
                    <div>
                        <input type="password" id="senha" name="senha" required>
                        <img src="olho-branco.svg" alt="" onclick="mostrar()" id="image" width="20px" required>
                    </div>
                    <h4>Confirmação de Senha</h4>
                    <div>
                        <input type="password" id="confirmar" name="confirmar">
                        <img src="olho-branco.svg" alt="" onclick="mostrarConfirme()" id="image" width="20px">
                    </div>
                    <button onclick="cadastrar()" name="cadastrar" id="cadastrar">Cadastrar</button>
                </form>



            </div>
        </div>
        <div class="cad-log">
            <div>
                <h3>Ja possui Cadastro?</h3>
                <a href="login.php">Login</a>
            </div>
        </div>
    </main>
</body>

</html>
<script src="mostrar-senha.js"></script>
<script src="verificar-senhas.js"></script>

<?php
include('conexao.php');
session_start();
if (isset($_POST["cadastrar"])) {
    // echo "<a href='avatar.php'>
    // <button> Continuar </button> </a>";

    $email = $_POST["email"];

    echo $email;

    $sqlA = " SELECT * FROM usuario WHERE email='$email'";

    $resultA = mysqli_query($conexao, $sqlA);
    $numrows = mysqli_num_rows($resultA);

    if ($numrows == 0) {


        $Usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $Senha = $_POST["senha"];
        $Confirma = $_POST["confirmar"];
        $_SESSION['nome'] = $Usuario;
        $sqlB = "INSERT INTO usuario (nome,email,senha)
                VALUES ('$Usuario','$email','$Senha')";

        $resultB = mysqli_query($conexao, $sqlB);
        echo "<script>alert('usuario cadastrado')</script>";
        header('location:'."avatar.php");
    } else {
        echo "<script>alert('Email não disponivel')</script>";
    }
    if (isset($_POST["logar"])) {
        $conexao = mysqli_connect('localhost', 'root', '', 'projeto');

        $email = $_POST["email"];
        $Senha = $_POST["senha"];

        $sqlC = " SELECT * FROM cadastro WHERE Email='$email'";

        $resultC = mysqli_query($conexao, $sqlC);
        $numlinha = mysqli_num_rows($resultC);

        if ($numlinha > 0) {
            while ($linha = mysqli_fetch_array($resultC)) {

                if ($email == $linha['Email']) {

                    if ($Senha == $linha['Senha']) {
                        echo "esta logado" . "<br>";
                        echo "<a href='avatar.php'>
                               <button> Continuar </button> </a>";
                    } else {
                        echo "<script>alert('senha incorreta')</script>";
                    }
                } else {
                    echo "<script>alert('não esta logado')</script>";
                  }
            }
        } else {
            echo "<script>alert('email não registrado')</script>";
        }
    }
}

?>