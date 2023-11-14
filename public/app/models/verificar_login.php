<?php

if (isset($_POST['usuario_nome'])) {

    session_start();

    $_SESSION['usuario_nome'] = $_POST['usuario_nome'];
    $_SESSION['usuario_id'] = $_POST['usuario_id'];

    $id = str_split($usuario_id, 1);

    if ($id[0] == "P") {
        $_SESSION['permicao'] = "personal";
        header('Location: ../views/gerenciar.php');
    } else if ($id[0] == "A") {
        $_SESSION['permicao'] = "aluno";
        header('Location: ../views/gerenciar_aluno.php');
    } else if ($id[0] == "U") {
        $_SESSION['permicao'] = "academia";
        header('Location: ../views/gerenciar.php');
    } else {
        $_SESSION['permicao'] = "visitante";
        header('Location: ../views/gerenciar.php');
    }
}
