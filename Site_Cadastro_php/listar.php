<?php
    include_once "assets/include/php/Funcoes.php";
    $funcao_listar = new Funcoes();
    $array_clientes = $funcao_listar->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <table>
        <tr>
            <td>CODIGO</td>
            <td>NOME</td>
            <td>TELEFONE</td>
            <td>SEXO</td>
            <td>EMAIL</td>
        </tr>
        <?php
            foreach($array_clientes as $clientes){
                echo "<tr>
                    <td>{$clientes[0]}</td>
                    <td>{$clientes[1]}</td>
                    <td>{$clientes[2]}</td>
                    <td>{$clientes[3]}</td>
                    <td>{$clientes[4]}</td>
                </tr>
                ";
            }
        ?>
    </table>
    <button><a href="index.php">Voltar</a></button>
</body>
</html>