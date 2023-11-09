<?php
require_once("../models/banco_conexao.php");
$operacao = $_GET['operacao'];

// Dados da Academia:
$academia_nome = $_POST['academia_nome'];
$academia_cnpj = $_POST['academia_cnpj'];
$academia_senha = $_POST['academia_senha'];
$academia_email = $_POST['academia_email'];
$academia_status = false;

// Dados dos Alunos:
$aluno_nome = $_POST['aluno_nome'];
$aluno_id = $_POST['aluno_cnpj'];
$alunos_senha = $_POST['aluno_senha'];
$aluno_email = $_POST['aluno_email'];
$aluno_status = false;

// Dados dos Personal:
$personal_nome = $_POST['personal_nome'];
$personal_id = $_POST['personal_cnpj'];
$personal_senha = $_POST['personal_senha'];
$personal_email = $_POST['personal_email'];
$personal_status = false;

// Verificar Academia:
switch ($operacao) {
    case 'academia':
        verificar_academia($academia_cnpj, $academia_senha, $conexao);
        if ($academia_status == false) {
            $academia = new Academia($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao);
            $academia->academia_cadastrar($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao);
        }
        break;
    case 'aluno':
        verificar_aluno($aluno_cnpj, $aluno_senha, $conexao);
        if ($aluno_status == false) {
            $aluno = new Academia($aluno_nome, $aluno_id, $aluno_senha, $aluno_email, $conexao);
            $aluno->aluno_cadastrar($aluno_nome, $aluno_id, $aluno_senha, $aluno_email, $conexao);
        }
        break;
    case 'personal':
        verificar_personal($adm_cnpj, $adm_senha, $conexao);
        if ($personal_status == false) {
            $personal = new Academia($personal_nome, $personal_id, $personal_senha, $personal_email, $conexao);
            $personal->personal_cadastrar($personal_nome, $personal_id, $personal_senha, $personal_email, $conexa);
        }
        break;
    default:
        # code...
        break;
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
function verificar_aluno($aluno_id, $aluno_senha, $conexao)
{
    $verificar_cnpj = $conexao->query("SELECT * FROM aluno WHERE aluno_id= '$aluno_id' AND aluno_senha='$aluno_senha'");

    if ($verificar_cnpj->rowCount() > 0) {
        $academia_status = true;
        echo '<script  type="text/javascript">
            alert("O $aluno_senha já foi cadastrado!");
            window.history.back();
            </script>';
    }
}
function verificar_personal($personal_id, $personal_senha, $conexao)
{
    $verificar_cnpj = $conexao->query("SELECT * FROM personal WHERE aluno_id= '$personal_id' AND personal_senha='$personal_senha'");

    if ($verificar_cnpj->rowCount() > 0) {
        $academia_status = true;
        echo '<script  type="text/javascript">
            alert("O $personal_id já foi cadastrado!");
            window.history.back();
            </script>';
    }
}
