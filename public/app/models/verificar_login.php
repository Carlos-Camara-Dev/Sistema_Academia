<?php

require_once("../models/banco_conexao.php");
require_once("../classes/academia.php");
require_once("../classes/aluno.php");
require_once("../classes/personal.php");
require_once("../classes/treino.php");

if (isset($_POST['usuario_id'])) {
    session_start();

    $usuario_id = $_POST['usuario_id'];

    $_SESSION['usuario_nome'] = $_POST['usuario_nome'];
    $_SESSION['usuario_id'] = $_POST['usuario_id'];

    $id = str_split($_POST['usuario_id']);

    if (count($id) == 9) {

        $verificar_cnpj = $conexao->query("SELECT * FROM Academia WHERE academia_cnpj='$usuario_id'");

        $contador = $verificar_cnpj->rowCount();

        if ($contador = 1) {
            $_SESSION['permissao'] = "academia";
            $_SESSION['acesso_id'] = $_POST['usuario_id'];
            header('Location: ../views/gerenciar.php');
        } else {
            echo '<script  type="text/javascript">' .
                "alert('O usuario não possui um cadastro!');" .
                'window.history.back();
                </script>';
        }
    } else {
        switch ($id[0]) {
            case 'A':
                $verificar = $conexao->query("SELECT * FROM Aluno WHERE aluno_id='$usuario_id'");

                $contador = $verificar->rowCount();

                if ($contador = 1) {
                    $dados = $verificar->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['permissao'] = "aluno";
                    $_SESSION['academia'] = $dados["aluno_academia"];
                    // $_SESSION['acesso_id'] = $_POST['usuario_id'];
                    header('Location: ../views/painel_perfil.php');
                } else {
                    echo '<script  type="text/javascript">' .
                        "alert('O usuario não possui um cadastro!');" .
                        'window.history.back();
                        </script>';
                }
                break;
            case 'P':

                $verificar = $conexao->query("SELECT * FROM Personal WHERE personal_id='$usuario_id'");

                $contador = $verificar->rowCount();

                if ($contador = 1) {
                    $dados = $verificar->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['permissao'] = "personal";
                    $_SESSION['acesso_id'] = $dados["personal_academia"];
                    header('Location: ../views/gerenciar.php');
                } else {
                    echo '<script  type="text/javascript">' .
                        "alert('O usuario não possui um cadastro!');" .
                        'window.history.back();
                        </script>';
                }
                break;
            default:
                $_SESSION['permissao'] = "visitante";
                header('Location: ../views/gerenciar.php');
                break;
        }
    }
}
