<?php
include("conectadb.php");
// cli_id 
// cli_cpf 
// cli_nome 
// cli_senha 
// cli_datanasc 
// cli_telefone 
// cli_logradouro
// cli_numero
// cli_cidade
// cli_ativo

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $cpf = $_POST['CPF']
    $datanasc = $_POST['data nascimento'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];



    #VALIDAÇÃO DE CLIENTES. VERIFICA SE USUARIO JÁ EXISTE
    $sql ="SELECT COUNT(cli_id) FROM clientes WHERE cli_nome ='$nome' 
    AND cli_cpf = '$cpf' AND cli_senha = '$senha'";
    $retorno = mysqli_query($link, $sql);

    while($tbl = mysqli_fetch_array($retorno)){
        $cont = $tbl[0];
    }
    #VALIDAÇÃO DE TRUE E FALSE
    if($cont == 1){
        echo"<script>window.alert('CLIENTE JÁ EXISTE');</script>";
    }
    else{
        $sql = "INSERT INTO clientes (cli_nome, cli_cpf, cli_senha, cli_ativo) 
        VALUES('$nome','$cpf','$senha','n')";
        mysqli_query($link, $sql);
        #CADASTROU CLIENTES E JOGA MENSAGEM NA TELA E DIRECIONA PARA LISTA USUARIO
        echo"<script>window.alert('CLIENTE CADASTRADO');</script>";
        echo"<script>window.location.href='listausuario.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>CADASTRO DE CLIENTES</title>
</head>
<body>
    <div>
        <ul class="menu">
        <li><a href="cadastrausuario.php">CADASTRA USUARIO</a></li>
            <li><a href="listausuario.php">LISTA USUARIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="./areacliente/loja.php">LOJA</a></li>
        </ul>
    </div>

    <div>
        <form action="cadastracliente.php" method="post">
            <input type="text" name="nome" id="nome" placeholder="NOME CLIENTE">
            <br>
            <input type="date" name="CPF" id="cpf" placeholder="DATA DE NASCIMENTO">
            <br>
            <input type="text" name="nome" id="nome" placeholder="NOME CLIENTE">
            <br>
            <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
            <br>
            <input type="password" name="senha" id="senha"placeholder="SENHA">
            <br>
        </form>
    </div>

    
</body>
</html>