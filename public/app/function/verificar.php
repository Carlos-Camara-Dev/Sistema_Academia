<?php
require_once("../models/banco_conexao.php");
require_once("../classes/academia.php");
require_once("../classes/aluno.php");
require_once("../classes/personal.php");
require_once("../classes/treino.php");


session_start();
// Verifica permissao:
if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $usuario_acesso = $_SESSION['acesso_id'];
}
$operacao = $_GET['operacao'];

// $contador = 0;

// Dados da Academia:
if (isset($_POST['academia_nome'])) {
    $academia_nome = $_POST['academia_nome'];
    $academia_cnpj = $_POST['academia_cnpj'];
    $academia_senha = $_POST['academia_senha'];
    $academia_email = $_POST['academia_email'];
    $academia_status;
}
// Dados dos Alunos:
if (isset($_POST['aluno_nome'])) {
    $aluno_nome = $_POST['aluno_nome'];
    $aluno_id = $_POST['aluno_id'];
    $aluno_email = $_POST['aluno_email'];
    $aluno_senha = $_POST['aluno_senha'];
    // $aluno_pagar_dia = $_POST['aluno_pagar_dia'];
    // $aluno_treino = $_POST['aluno_treino'];
}
// Dados dos Personal:
if (isset($_POST['personal_nome'])) {
    $personal_nome = $_POST['personal_nome'];
    $personal_id = $_POST['personal_id'];
    $personal_senha = $_POST['personal_senha'];
    $personal_email = $_POST['personal_email'];
    $aluno_dia_pagamento = $_POST['aluno_dia_pagamento'];
}
// Dados dos Treino:
if (isset($_POST['treino_nome'])) {
    $treino_nome = $_POST['treino_nome'];
    $treino_id = $_POST['treino_id'];
    $treino_descricao = $_POST['treino_descricao'];
    $treino_tipo = $_POST['treino_tipo'];
}
// Dados para cadastrar aluno no treino:
if (isset($_POST['aluno_id']) && isset($_POST['treino_id'])) {
    $aluno_id = $_POST['aluno_id'];
    $treino_id = $_POST['treino_id'];
    $dia_treino = $_POST['dia_treino'];
}

switch ($operacao) {
        // Verificar Academia:
    case 'academia':

        $verificar_cnpj = $conexao->query("SELECT * FROM Academia WHERE academia_cnpj= '$academia_cnpj' AND academia_senha='$academia_senha'");
        $contador = $verificar_cnpj->rowCount();

        if ($contador > 0) {
            echo '<script  type="text/javascript">' .
                "alert('O $academia_cnpj já foi cadastrado!');" .
                'window.history.back();
        </script>';
        } else {
            $academia = new Academia($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao);
            $academia->academia_cadastrar($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao);
        }
        break;
        // Verificar Aluno:
    case 'aluno':

        $verificar_aluno_id = $conexao->query("SELECT * FROM Aluno WHERE aluno_id= '$aluno_id' AND aluno_academia='$usuario_acesso'");
        $contador = $verificar_aluno_id->rowCount();

        if ($contador > 0) {
            echo '<script  type="text/javascript">' .
                "alert('O $aluno_id já foi cadastrado!');" .
                'window.history.back();
                </script>';
        } else {
            $aluno = new Aluno($conexao);
            $aluno->aluno_cadastrar($aluno_nome, $aluno_id, $aluno_email, $aluno_senha, $aluno_dia_pagamento, $usuario_acesso, $conexao);
        }
        break;
        // Verificar Personal:
    case 'personal':
        $verificar_personal_id = $conexao->query("SELECT * FROM Personal WHERE personal_id='$personal_id'  AND personal_academia='$usuario_id' AND personal_nome='$personal_nome'");
        $contador = $verificar_personal_id->rowCount();

        if ($contador > 0) {
            echo '<script  type="text/javascript">' .
                "alert('O personal $personal_nome com o id $personal_id já foi cadastrado!');" .
                'window.history.back();
                </script>';
        } else {
            $personal = new Personal($conexao);
            $personal->personal_cadastrar($personal_nome, $personal_id, $personal_email, $personal_senha, $usuario_id, $conexao);
        }
        break;
    case 'treino':
        $verificar_treino_id = $conexao->query("SELECT * FROM treino WHERE treino_nome= '$treino_nome' AND treino_academia='$usuario_acesso' AND treino_id='$treino_id'");
        $contador = $verificar_treino_id->rowCount();

        if ($contador > 0) {
            echo '<script  type="text/javascript">' .
                "alert('O treino de $treino_nome com $treino_id já foi cadastrado!');" .
                'window.history.back();
                    </script>';
        } else {
            $treino = new Treino($conexao);
            $treino->treino_cadastrar($treino_nome, $treino_id, $treino_descricao, $treino_tipo, $usuario_acesso, $conexao);
        }
        break;
    case 'aluno_treino':
        $verificar_aluno_treino = $conexao->query("SELECT * FROM aluno_treino WHERE aluno_id= '$aluno_id' AND treino_id='$treino_id' AND academia_id='$usuario_acesso'");
        $contador = $verificar_aluno_treino->rowCount();

        if ($contador > 0) {
            echo '<script  type="text/javascript">' .
                "alert('O aluno $aluno_id já tem o seu treino cadastrado!');" .
                'window.history.back();
                        </script>';
        } else {
            $cadastrar_personal = $conexao->query("INSERT INTO Aluno_treino(aluno_id, treino_id, dia_treino, academia_id) VALUES('$aluno_id', '$treino_id','$dia_treino','$usuario_acesso')");
            echo '<script  type="text/javascript">' .
                "alert('O treino de $aluno_id foi criado.');" .  'window.history.back();</script>';
        }
        break;
    case 'aluno_dados':
        echo '<script  type="text/javascript">' .
            "alert('$aluno_nome, os seus dados foram atualizados.');" .  'window.history.back();</script>';
        break;
    case 'destroy':
        session_destroy();
        header('Location: ../views/home.html');
        break;
    default:
        break;
}
