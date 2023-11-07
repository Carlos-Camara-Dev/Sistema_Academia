<?php
require_once("../models/banco_conexao.php");
$operacao = $_GET['operacao'];

// Dados da academia:
$academia_nome = $_POST['academia_nome'];
$academia_cnpj = $_POST['academia_cnpj'];
$academia_senha = $_POST['academia_senha'];
$academia_email = $_POST['academia_email'];
$academia_status = false;

// Dados dos Alunos:
$aluno_nome = $_POST['aluno_nome'];
$aluno_cnpj = $_POST['aluno_cnpj'];
$alunos_senha = $_POST['aluno_senha'];
$aluno_email = $_POST['aluno_email'];
$aluno_status = false;

// Verificar Academia:
if ($operacao == "academia") {
    verificar_academia($academia_cnpj, $academia_senha, $conexao);
    if ($academia_status == false) {
        $academia = new Academia($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao);
        $academia->academia_cadastrar($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao);
    }
}


function verificar_academia($academia_cnpj, $academia_senha, $conexao)
{
    $verificar_cnpj = $conexao->query("SELECT * FROM academia WHERE academia_cnpj= '$academia_cnpj' AND academia_senha='$academia_senha'");

    if ($verificar_cnpj->rowCount() > 0) {
        $academia_status = true;
        echo '<script  type="text/javascript">
            alert("O $academia_cnpj já foi cadastrado!");
            window.history.back();
            </script>';
    }
}
