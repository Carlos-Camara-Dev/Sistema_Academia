<?php
require_once("../models/banco_conexao.php");
require_once("../classes/academia.php");
require_once("../classes/aluno.php");
require_once("../classes/personal.php");
require_once("../classes/treino.php");
$operacao = $_GET['operacao'];


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
    // $aluno_senha = $_POST['aluno_senha'];
    $aluno_email = $_POST['aluno_email'];
}
// Dados dos Personal:
if (isset($_POST['personal_nome'])) {
    $personal_nome = $_POST['personal_nome'];
    $personal_id = $_POST['personal_id'];
    $personal_senha = $_POST['personal_senha'];
    $personal_email = $_POST['personal_email'];
}
// Dados dos Treino:
if (isset($_POST['treino_nome'])) {
    $treino_nome = $_POST['treino_nome'];
    $treino_id = $_POST['treino_id'];
    $treino_descricao = $_POST['treino_descricao'];
    $treino_tipo = $_POST['treino_tipo'];
}
// Verificar Academia:

switch ($operacao) {
    case 'academia':

        $verificar_cnpj = $conexao->query("SELECT * FROM Academia WHERE academia_cnpj= '$academia_cnpj' AND academia_senha='$academia_senha'");

        if ($verificar_cnpj->rowCount() > 0) {
            echo '<script  type="text/javascript">' .
                "alert('O $academia_cnpj já foi cadastrado!');" .
                'window.history.back();
        </script>';
        } else {
            $academia = new Academia($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao);
            $academia->academia_cadastrar($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao);
        }
        break;
    case 'aluno':

        $verificar_aluno_id = $conexao->query("SELECT * FROM Aluno WHERE aluno_id= '$aluno_id' AND aluno_nome='$aluno_nome'");

        if ($verificar_aluno_id->rowCount() > 0) {
            echo '<script  type="text/javascript">' .
                "alert('O $aluno_id já foi cadastrado!');" .
                'window.history.back();
                </script>';
        } else {
            $aluno = new Aluno($aluno_nome, $aluno_id, $aluno_pagamento_dia, $aluno_email, $conexao);
            $aluno->aluno_cadastrar($aluno_nome, $aluno_id, $aluno_pagamento_dia, $aluno_email, $conexao);
        }
        break;
    case 'personal':
        $verificar_personal_id = $conexao->query("SELECT * FROM Personal WHERE personal_id= '$personal_id' AND personal_senha='$personal_senha'");

        if ($verificar_personal_id->rowCount() > 0) {

            echo '<script  type="text/javascript">' .
                "alert('O $personal_id já foi cadastrado!');" .
                'window.history.back();
                </script>';
        } else {
            $personal = new Personal($personal_nome, $personal_id, $personal_senha, $personal_email, $conexao);
            $personal->personal_cadastrar($personal_nome, $personal_id, $personal_senha, $personal_email, $conexa);
        }


        break;
    case 'treino':
        $verificar_treino_id = $conexao->query("SELECT * FROM treino WHERE treino_nome= '$treino_nome' AND treino_id='$treino_id'");

        if ($verificar_treino_id->rowCount() > 0) {

            echo '<script  type="text/javascript">' .
                "alert('O $treino_nome já foi cadastrado!');" .
                'window.history.back();
                    </script>';
        } else {
            $treino = new Treino($treino_nome, $treino_id, $treino_descricao, $treino_tipo, $conexao);
            $treino->treino_cadastrar($treino_nome, $treino_id, $treino_descricao, $treino_tipo, $conexa);
        }


        break;
    default:
        # code...
        break;
}
