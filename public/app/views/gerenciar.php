<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciar Academia</title>
    <link rel="stylesheet" href="../../assets/css/gerenciar_style.css">

</head>

<body>
    <header>
        <nav id="gerenciar_nav_bar">
            <div id="gerenciar_nav_bar_visualizar">
                <?php
                if ($usuario_permissao == "academia") {
                    echo '<button onclick="abrir_gerenciar_personais()"> Personais </button>';
                }
                ?>
                <button onclick="abrir_gerenciar_alunos()"> Aluno</button>
                <button onclick="abrir_gerenciar_treino()"> Treinos </button>
            </div>
            <div id="gerenciar_nav_bar_sair">
                <button>
                    <a href="../function/verificar.php?operacao=destroy">Sair</a>
                </button>
            </div>
        </nav>
    </header>
    <main id="gerenciar_main">
        <!-- Gerenciar Personais -->
        <section id="gerenciar_personais">
            <nav>
                <button onclick="abrir_cadastrar_personal()"> Cadastrar Personal </button>
                <button onclick="abrir_gerenciar_personais_lista()"> Gerenciar Personal</button>
            </nav>
            <!-- Lista de Personal -->
            <section id="gerenciar_personais_lista">
                <h2>Gerenciar Personal</h2>
                <?php
                $personal = new Personal($conexao);
                $personal->buscar_dados($usuario_acesso, $conexao);
                ?>
            </section>
            <!-- Cadastrar Personal -->
            <section id="cadastrar_personal" class="cadastrar">
                <form action="../function/verificar.php?operacao=personal" method="post">
                    <h2>CADASTRAR PERSONAL </h2>
                    <input type="text" name="personal_nome" placeholder="Digite o nome do personal" required>
                    <input type="text" name="personal_id" placeholder="Digite o id do personal" required>
                    <input type="email" name="personal_email" placeholder="Digite o email do personal" required>
                    <input type="text" name="personal_senha" placeholder="Digite a senha do personal" required>
                    <input type="submit" value="Cadastrar" id="button_enty">
                </form>
            </section>
        </section>

        <!-- Gerenciar Alunos -->
        <section id="gerenciar_alunos">
            <nav>
                <button onclick="abrir_cadastrar_aluno()"> Cadastrar Aluno </button>
                <button onclick="abrir_cadastrar_aluno_treino()">Aluno Treino </button>
                <button onclick="abrir_gerenciar_alunos_lista()"> Gerenciar Alunos </button>
            </nav>
            <!-- Lista de Alunos -->
            <section id="gerenciar_alunos_lista">
                <h2>Gerenciar Alunos</h2>
                <div class="informacao">
                    feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                    doming
                    id quod mazim placerat facer possim as
                </div>
                <div class="informacao">
                    feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                    doming
                    id quod mazim placerat facer possim as
                </div>
                <div class="informacao">
                    feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                    doming
                    id quod mazim placerat facer possim as
                </div>
                <div class="informacao">
                    feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                    doming
                    id quod mazim placerat facer possim as
                </div>
                <div class="informacao">
                    feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                    doming
                    id quod mazim placerat facer possim as
                </div>
            </section>
            <!-- Cadsatrar Alunos -->
            <section id="cadastrar_aluno" class="cadastrar">
                <form action="../function/verificar.php?operacao=aluno" method="post">
                    <h2>CADASTRAR ALUNO </h2>
                    <input type="text" name="aluno_nome" placeholder="Digite o nome do aluno" required>
                    <input type="text" name="aluno_id" placeholder="Digite o id do aluno" required>
                    <input type="email" name="aluno_email" placeholder="Digite o email do aluno" required>
                    <input type="password" name="aluno_senha" placeholder="Digite a senha do aluno" required>
                    <input type="submit" value="Cadastrar" id="button_enty">
                </form>
            </section>
            <!-- Cadsatrar Alunos nos treinos -->
            <section id="cadastrar_aluno_treino" class="cadastrar">
                <form action="../function/verificar.php?operacao=aluno_treino" method="post">
                    <h2>CADASTRAR ALUNO </h2>
                    <input type="text" name="aluno_id" placeholder="Digite o id do aluno" required>
                    <input type="text" name="treino_id" placeholder="Digite o id do treino" required>
                    <input type="submit" value="Cadastrar" id="button_enty">
                </form>
            </section>
        </section>
        <!-- Gerenciar Treinos -->
        <section id="gerenciar_treinos">
            <nav>
                <button onclick="abrir_cadastrar_treino()"> Cadastrar Treino </button><button
                    onclick="abrir_gerenciar_treinos_lista()"> Gerenciar Treinos </button>
            </nav>
            <!-- Lista de Treinos -->
            <section id="gerenciar_treinos_lista">
                <h2>Gerenciar Treinos</h2>
                <?php
                $treino = new Treino($conexao);
                $treino->buscar_dados($usuario_acesso, $conexao);
                ?>
            </section>
            <section id="cadastrar_treino" class="cadastrar">
                <form action="../function/verificar.php?operacao=treino" method="post">
                    <h2>CADASTRAR TREINO </h2>
                    <input type="text" name="treino_nome" placeholder="Digite o nome do treino" required>
                    <input type="text" name="treino_id" placeholder="Digite o id do treino" required>
                    <input type="text" name="treino_descricao" placeholder="Digite a descrição do treino" required>
                    <input type="text" name="treino_tipo" placeholder="Digite o tipo de treino" required>
                    <input type="submit" value="Cadastrar" id="button_enty">
                </form>
            </section>
        </section>
    </main>
    <script src="../../assets/js/gerenciar_js.js"></script>
</body>

</html>