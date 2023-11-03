<?php
$banco = "sistema_academia";
$usuario = "root";
$servidor = "localhost";
$password = "";

try {
    $conexao = new PDO('mysql:host=localhost;dbname=sistema_academia', $usuario, $password);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Falha na ligação: " . $e->getMessage();
    die();
} catch (Exception $e) {
    echo "Falha no Exception: " . $e->getMessage();
    die();
}
