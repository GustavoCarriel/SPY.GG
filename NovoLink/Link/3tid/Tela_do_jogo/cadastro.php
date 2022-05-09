<!DOCTYPE html>
<html lang="pt-br">

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
$conexao = mysqli_connect('localhost', 'root', '', 'projeto');
session_start();
$_SESSION['contA'] =0;
if (isset($_POST["cadastrar"])) {

    $nome = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confsenha = $_POST['confirmar'];
$_SESSION['nome'] =$nome;
    if ($senha == $confsenha) {

        $conexao = mysqli_connect("localhost", "root", "", "projeto");


        $sql = "INSERT INTO usuario(nome, senha, email)VALUES ('$nome', '$senha', '$email')";
        $result = mysqli_query($conexao, $sql);

        header("location: login.php");
    } else {
        if ($senha != 'senha'){
            echo "<script>alert('senha errada')</script>";
            return false;
        }
       
    }


  
}





?>