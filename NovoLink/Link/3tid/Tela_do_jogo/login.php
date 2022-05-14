<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <main>
        <h1>Login</h1>
        <div class="container">
            <div class="box">
            <form name="login" action="" method="post" required>
                    <h4>Email</h4>
                    <input type="email" id="email" name="email" required>
                    <h4>Senha</h4>
                    <div>
                        <input type="password" id="senha" name="senha">
                        <img src="olho-branco.svg" alt="" onclick="mostrar()" id="image" width="20px">
                    </div>
                    <button onclick="cadastrar()" name="logar" id="logar">Logar</button>
                </form>
            </div>
        </div>
        <div class="cad-log">
            <div>
                <h3>Não possui Cadastro?</h3>
                <a href="cadastro.php">Cadastrar</a>
            </div>
        </div>
    </main>
</body>
</html>
<script src="mostrar-senha.js"></script>
<script src="verificar-senhas.js"></script>

<?php
session_start();
$_SESSION['contA'] =0;
if (isset($_POST["logar"])) {
    $conexao = mysqli_connect('localhost', 'root', '', 'projeto');

    $Email = $_POST["email"];
    $Senha = $_POST["senha"];

    $sql = " SELECT * FROM usuario WHERE email='$Email'";
    
    $result = mysqli_query($conexao, $sql);
    $numlinha = mysqli_num_rows($result);

    if ($numlinha > 0) {
        while ($linha = mysqli_fetch_array($result)) {

            if ($Email == $linha['email'] ){

                $_SESSION['ID']= $linha['id'];
                $_SESSION['NOME']= $linha['nome'];
                $_SESSION['EMAIL']= $linha['email'];
                $_SESSION['SENHA']= $linha['senha'];
                $_SESSION['DETETIVE']= $linha['detetive'];

            if ($Senha == $linha['senha']){
                $_SESSION['nome'] = $linha['nome'];
                $_SESSION['IdUsuario']= $linha['id'];
                header("location: avatar.php");
            }else{
                echo "<script>alert('senha incorreta')</script>";
            }

        }else{
            echo "<script>alert('não esta logado')</script>";
        }
    }
    }else{
        echo "<script>alert('email não registrado')</script>";
    }
}
 ?>