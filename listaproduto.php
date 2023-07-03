<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>Document</title>
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
            #ABERTO O PHP PARA VALIDAR SE A SESSÃO DO USUARIO ESTÁ ABERTA
            #SE SESSÃO ABERTA, FECHA O PHP PARA USAR ELEMENTOS HTML
            if ($nomeusuario != null) {
            ?>
                <!-- USO DO ELEMENTO HTML COM PHP INTERNO -->
                
                <li class="profile">OLÁ <?= strtoupper($nomeusuario) ?></li>
            <?php
                #ABERTURA DE OUTRO PHP PARA CASO FALSE
            } else {
                echo "<script>window.alert('USUARIO NÃO AUTENTICADO');
                        window.location.href='login.php';</script>";
            }
            #FIM DO PHP PARA CONTINUAR MEU HTML
            ?>
        </ul>
    </div>
    
    <div>
        <form action="listaproduto.php" method="post">
                <input type="radio" name="ativo" class="radio" value="s" required 
                onclick="submit()" <?=$ativo =='s'?"checked":""?>>ATIVOS

                <input type="radio" name="ativo" class="radio" value="n" required 
                onclick="submit()" <?=$ativo =='n'?"checked":""?>>INATIVOS
        </form>
        <div class="container">
            <table border="1">
                <tr>
                    <th>ID PRODUTO</th>
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>QUANTIDADE ESTOQUE</th>
                    <th>CUSTO</th>
                    <th>PREÇO</th>
                    <th>IMAGEM</th>
                    <th>ALTERAR</th>
                    <th>ATIVO?</th>
                </tr>
                <?php
                    while($tbl=mysqli_fetch_array($retorno)){
                        ?>
                    
                    <tr>
                    <td><?=$tbl[0]?></td>
                    <td><?=$tbl[1]?></td>
                    <td><?=$tbl[2]?></td>
                    <td><?=$tbl[3]?></td>
                    <td>R$ <?=number_format($tbl[4],2,','',','.')?></td>
                    <td>R$ <?=number_format($tbl[5],2,','',','.')?></td>
                    <td><?=$tbl[6]?></td>
                    <td><img src="data:image/jpeg;base64,"<?=$tbl[6]?>"width="100" height"100"</td>
                    <td><a href="alteraproduto.php?id<?=$tbl[0]?>">
                    <inut type="button" value="ALTERAR">
                    </td>
                    <td><?=$tbl[8]?></td>
                    <td><?=$tbl[9]?></td>
                    </tr>
                    <?php
                    }
                    ?>

            </table>
        </div>
    </div>

</body>
</html>