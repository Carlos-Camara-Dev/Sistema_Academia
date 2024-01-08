<?php
session_start();
if ($_SESSION['permissao'] == "aluno") {
    if (!isset($_SESSION['usuario_id'])) {
        header('location: home.html');
    } else {
        $usuario_nome = $_SESSION['usuario_nome'];
        $usuario_id = $_SESSION['usuario_id'];
        $usuario_academia = $_SESSION['academia'];
        $usuario_permissao = $_SESSION['permissao'];
        // $acesso_id = $_SESSION['acesso_id'];
        // session_destroy();
        require_once("../models/banco_conexao.php");
        require_once("../classes/aluno.php");
        $aluno = new Aluno($conexao);
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
                <a href="painel_perfil.php">Perfil </a>
            </button>
            <button>
                <a href="../models/pdf.php?operacao=aluno_treino">PDF</a>
            </button>
            <button>
                <a href="../function/verificar.php?operacao=destroy">Sair</a>
            </button>

        </nav>
    </header>
    <section id="main_painel_treinos">
        <nav id="nav_bar_dias">
            <button onclick="abrir_segunda()"> Segunda</button>
            <button onclick="abrir_terca()"> Terça</button>
            <button onclick="abrir_quarta()"> Quarta</button>
            <button onclick="abrir_quinta()"> Quinta</button>
            <button onclick="abrir_sexta()"> Sexta</button>

        </nav>
        <main id="main_treinos">
            <section id="treino_segunda">
                <h2 class="nome_dia"> Segunda </h2>
                <?php
                $aluno = new Aluno($conexao);
                $aluno->buscar_treino_aluno($usuario_id, "segunda", $conexao);
                ?>
            </section>
            <section id="treino_terca">
                <h2 class="nome_dia"> Terça </h2>
                <?php
                $aluno = new Aluno($conexao);
                $aluno->buscar_treino_aluno($usuario_id, "terça", $conexao);
                ?>
            </section>
            <section id="treino_quarta">
                <h2 class="nome_dia"> Quarta </h2>
                <?php
                $aluno = new Aluno($conexao);
                $aluno->buscar_treino_aluno($usuario_id, "quarta", $conexao);
                ?>
            </section>
            <section id="treino_quinta">
                <h2 class="nome_dia"> Quinta </h2>
                <?php
                $aluno = new Aluno($conexao);
                $aluno->buscar_treino_aluno($usuario_id, "quinta", $conexao);
                ?>
            </section>
            <section id="treino_sexta">
                <h2 class="nome_dia"> Sexta </h2>
                <?php
                $aluno = new Aluno($conexao);
                $aluno->buscar_treino_aluno($usuario_id, "sexta", $conexao);
                ?>
            </section>
        </main>
    </section>
    <script src="../../assets/js/treinos_dia.js"></script>
</body>

</html>