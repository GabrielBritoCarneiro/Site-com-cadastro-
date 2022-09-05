<?php
    if(isset($_POST["nome"]) && isset($_POST["telefone"]) && isset($_POST["sexo"]) && isset($_POST["email"])
    && strlen($_POST["nome"]) > 1 && strlen($_POST["nome"]) < 200 && strlen($_POST["telefone"]) > 1 && strlen($_POST["telefone"]) < 200
    && strlen($_POST["sexo"]) == 1 && strlen($_POST["email"]) > 1 && strlen($_POST["email"]) < 200 && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ){
        include_once "assets/include/php/Funcoes.php";
        $nome = filter_var($_POST["nome"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $telefone = $_POST["telefone"];
        $sexo = $_POST["sexo"];
        $email = $_POST["email"];
        $funcao = new Funcoes();
        if($funcao->cadastrar($nome, $telefone, $sexo, $email)){
            echo "<script>alert(\"Usuario {$nome} cadastrado com sucesso!\")</script>";
        }
        else{
            echo "<script>alert(\"Erro no cadastro!\")</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar clientes</title>
</head>
<body>
    <form method="POST" action="cadastrar.php">
        <input type="text" placeholder="NOME" name="nome" minlength="1" maxlength="200" required>
        <input type="text" placeholder="TELEFONE" name="telefone" minlength="1" maxlength="200" required>
        <input type="text" placeholder="SEXO" name="sexo" minlength="1" maxlength="1" required>
        <input type="text" placeholder="EMAIL" name="email" minlength="1" maxlength="200" required>
        <input type="submit" value="Enviar">
    </form>
    <button><a href="index.php">Voltar</a></button>
</body>
</html>