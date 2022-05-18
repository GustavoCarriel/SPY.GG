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
$conexao = mysqli_connect('localhost', 'root', '', 'projeto');

$_SESSION['contA'] =0;

for ($a = 1; $a <= 6; $a++) {


    for ($b = 0; $b <= 5; $b++) {
        # code...
    }


    $sqlP = "SELECT * FROM personagens WHERE idpersonagem =$a ";
    $resultP = mysqli_query($conexao, $sqlP);

    while ($linhaP = mysqli_fetch_array($resultP)) {


        if ($linhaP['Idpersonagem'] == 1) {
            $NomeP1 = $linhaP['Nomeperso'];
        }
        if ($linhaP['Idpersonagem'] == 2) {
            $NomeP2 = $linhaP['Nomeperso'];
        }
       
        if ($linhaP['Idpersonagem'] == 4) {
            $NomeP4 = $linhaP['Nomeperso'];
        }
        if ($linhaP['Idpersonagem'] == 5) {
            $NomeP5 = $linhaP['Nomeperso'];
        }
        if ($linhaP['Idpersonagem'] == 6) {
            $NomeP6 = $linhaP['Nomeperso'];
        }
    }
}


// Matriz com todos os participantes
$participantes = array($NomeP1, $NomeP2, $NomeP4, $NomeP5, $NomeP6);
// Definindo o número de participantes
$numParticipantes = sizeof($participantes);
// Informações adicionais
$chances = round((1 / $numParticipantes) * 100);

// Sorteando

# Primeiro ganhador
$sorteado[1] = $participantes[rand(0, $numParticipantes - 1)];
# Segundo ganhador
for ($i = 1; $i < 2; $i++) {
    $sorteado[2] = $participantes[rand(0, $numParticipantes - 1)];
    // Caso o ganhador já tenha saido, sorteia novamente.
    if ($sorteado[2] == $sorteado[1]) {
        --$i;
    }
}
# Terceiro ganhador
for ($i = 1; $i < 2; $i++) {
    $sorteado[3] = $participantes[rand(0, $numParticipantes - 1)];
    // Caso o ganhador já tenha saido, sorteia novamente.
    if ($sorteado[3] == $sorteado[1] || $sorteado[3] == $sorteado[2]) {
        --$i;
    }
}

# quarto ganhador
for ($i = 1; $i < 2; $i++) {
    $sorteado[4] = $participantes[rand(0, $numParticipantes - 1)];
    // Caso o ganhador já tenha saido, sorteia novamente.
    if ($sorteado[4] == $sorteado[3] || $sorteado[4] == $sorteado[1] || $sorteado[4] == $sorteado[2]) {
        --$i;
    }
}
# quinto ganhador
for ($i = 1; $i < 2; $i++) {
    $sorteado[5] = $participantes[rand(0, $numParticipantes - 1)];
    // Caso o ganhador já tenha saido, sorteia novamente.
    if ($sorteado[5] == $sorteado[4] || $sorteado[5] == $sorteado[3] || $sorteado[5] == $sorteado[1] || $sorteado[5] == $sorteado[2]) {
        --$i;
    }
}






$sqlR = "SELECT * FROM personagens WHERE Nomeperso ='$sorteado[1]' ";

$resultR = mysqli_query($conexao, $sqlR);
while ($linhaR = mysqli_fetch_array($resultR)) {
    echo $linhaR['Nomeperso']."<br>";
    $Muda1 = $linhaR['Nomeperso'];
    $sqlM1 = "UPDATE personagens SET Testemunhas='Culpado', IdDial='1' WHERE Nomeperso='$Muda1'";
    $relultM1 = mysqli_query($conexao, $sqlM1);
}

#muda 2
$sqlR2 = "SELECT * FROM personagens WHERE Nomeperso ='$sorteado[2]' ";

$resultR2 = mysqli_query($conexao, $sqlR2);
while ($linhaR = mysqli_fetch_array($resultR2)) {
    echo $linhaR['Nomeperso']."<br>";
    $Muda2 = $linhaR['Nomeperso'];
    $sqlM2 = "UPDATE personagens SET Testemunhas='Inocente',IdDial='2' WHERE Nomeperso='$Muda2'";
    $relultM2 = mysqli_query($conexao, $sqlM2);
}

#muda 3
$sqlR3 = "SELECT * FROM personagens WHERE Nomeperso ='$sorteado[3]' ";
$resultR3 = mysqli_query($conexao, $sqlR3);
while ($linhaR = mysqli_fetch_array($resultR3)) {
    echo $linhaR['Nomeperso']."<br>";
    $Muda3 = $linhaR['Nomeperso'];
    $sqlM3 = "UPDATE personagens SET Testemunhas='Inocente' ,IdDial='4' WHERE Nomeperso='$Muda3'";
    $relultM3 = mysqli_query($conexao, $sqlM3);
}


#muda 4
$sqlR4 = "SELECT * FROM personagens WHERE Nomeperso ='$sorteado[4]' ";
$resultR4 = mysqli_query($conexao, $sqlR4);
while ($linhaR = mysqli_fetch_array($resultR4)) {
    echo $linhaR['Nomeperso']."<br>";
    $Muda4 = $linhaR['Nomeperso'];
    $sqlM4 = "UPDATE personagens SET Testemunhas='Inocente',IdDial='5' WHERE Nomeperso='$Muda4'";
    $relultM4 = mysqli_query($conexao, $sqlM4);
}


#muda 5
$sqlR5 = "SELECT * FROM personagens WHERE Nomeperso ='$sorteado[5]' ";
$resultR5 = mysqli_query($conexao, $sqlR5);
while ($linhaR = mysqli_fetch_array($resultR5)) {
    echo $linhaR['Nomeperso']."<br>";
    $Muda5 = $linhaR['Nomeperso'];
    $sqlM5 = "UPDATE personagens SET Testemunhas='Inocente',IdDial='6' WHERE Nomeperso='$Muda5'";
    $relultM5 = mysqli_query($conexao, $sqlM5);
}






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
                header("location: tela_jogo.php");
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