<?php 
    session_start();
    $nomeusuario = $_SESSION['nomeusuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>MENU ADMINISTRATIVO</title>
</head>
<body>
<div>
        <ul class="menu">
          <li><a href="cadastrausuario.php">CADASTRA USUARIO</a></li>
          <li><a href="listausuario.php">LISTA USUARIO</a></li>   
          <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>   
          <li><a href="listaproduto.php">LISTA PRODUTO</a></li>   
          <li><a href="listacliente.php">LISTA CLIENTE</a></li>
          <li class="menuloja"><a href="logout.php">SAIR</a></li>

          <?php
            #ABERTO O PHP VALIDAR SE A SESSÃO DO USUÁROP ESTÁ ABERTA
            #SE SESSÇAO ABERTA, FECHA O PHP PARA USAR ELEMENTOS HTML
                if($nomeusuario != null){        
                    ?>
                    <!-- USO DO ELEMENTO HTML COM PHP INTERNO -->
                    <li class ="profile">OLÁ<?=strtoupper($nomeusuario)?</li>
                    <?php
                    #ABERTURA DE OUTRO PHP PARA CASE FALSE
                }
                else{
                    echo"<script>window.alert('USUÁRIO NÃO AUTENTICADO');
                    window.location.href='login.php';</script>";
                }
                ?>
                #FIM DO PHP PARA CONTINUAR O HTML.
          
        </ul>
    </div>





</body>
</html>
