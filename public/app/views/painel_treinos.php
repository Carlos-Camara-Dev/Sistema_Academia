<?php
session_start();
if ((isset($_SESSION['usuario_id']) == true)) {
    if ((!isset($_SESSION['permissao']) == "aluno") || (!isset($_SESSION['permissao']) == "academia")) {
        header('location: home.html');
    } else {
        $usuario_nome = $_SESSION['usuario_nome'];
        $usuario_id = $_SESSION['usuario_id'];
        $usuario_academia = $_SESSION['academia'];
        $usuario_permissao = $_SESSION['permissao'];
        // session_destroy();
        require_once("../models/banco_conexao.php");
        require_once("../classes/aluno.php");
        $aluno = new Aluno($conexao);
        $aluno->buscar_treinos_aluno($usuario_id, $conexao);
    }
} else {
    header('location: home.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Treinos</title>
</head>

<body>

</body>

</html>