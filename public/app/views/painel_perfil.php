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
    <title>Painel Aluno</title>
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
    <main id="main">
        <section id="perfil">
            <section id="perfil_img">
                <label for="input_foto_perfil" id="label_foto_perfil"> Adiocione uma foto</label>
                <input type="file" name="foto_perfil" id="input_foto_perfil">
            </section>
            <section id="perfil_dados">
                <div class="puxar_informacoes">
                    <h3> Usuario</h3>
                    <p> <?php
                        echo $usuario_nome;
                        ?>
                    </p>
                    <h3> Id do Usuario</h3>
                    <p>
                        <?php
                        echo $usuario_id;
                        ?>
                    </p>
                </div>
                <div class="puxar_informacoes">
                    <h3> Treino</h3>
                    <p>
                        <?php
                        $aluno->treinos_quantidade($usuario_id, $conexao);
                        ?>
                    </p>
                    <h3> Data de Pagamento </h3>
                    <p>
                        <?php
                        $usuario_data_pagamento
                        ?>
                    </p>

                </div>
            </section>
        </section>
        <section id="perfil_informacao">
            <div class="puxar_informacoes">
                <h3> Peso</h3>
                <p>
                    <?php
                    $aluno->buscar_dado("aluno_peso", $usuario_academia, $conexao);
                    ?>
                </p>
                <h3> Altura</h3>
                <p>
                    <?php
                    $aluno->buscar_dado("aluno_altura", $usuario_academia, $conexao);
                    ?>
                </p>
                <h3> Condição</h3>
                <p>
                    <?php
                    $aluno->buscar_dado("aluno_condicao", $usuario_academia, $conexao);
                    ?>
                </p>
            </div>
            <form action="../function/verificar.php?operacao=aluno_dados" method="post">
                <h2>Atualizar Dados</h2>
                <input type="text" name="aluno_altura" placeholder="Digite a sua altura" required>
                <input type="text" name="aluno_peso" placeholder="Digite o seu peso" required>
                <input type="text" name="aluno_condicao" placeholder="Digite a sua condiçao" required>
                <input type="submit" value="Cadastrar" id="button_enty">
            </form>
        </section>
    </main>
</body>

</html>