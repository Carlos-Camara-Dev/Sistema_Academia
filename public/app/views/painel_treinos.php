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
    <link rel="stylesheet" href="../../assets/css/painel_style.css">
</head>

<body>
    <header>
        <nav id="gerenciar_nav_bar">
            <button>
                <a href="painel_treinos.php">Treinos</a>
            </button>
            <button>
                <a href="painel_perfil.php">Perfil </a> </button>
            <button>
                <a href="../function/verificar.php?operacao=destroy">Sair</a>
            </button>
        </nav>
    </header>
    <?php
    $aluno = new Aluno($conexao);
    $aluno->buscar_treinos_aluno($usuario_id, $conexao);
    ?>
</body>

</html>