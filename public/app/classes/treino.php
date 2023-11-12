<?php
require_once("../models/banco_conexao.php");

class Treino
{
    private $nome;
    private $id;
    private $descricao;
    private $tipo;
    public function __construct($treino_nome, $treino_id, $treino_descricao, $treino_tipo, $conexao)
    {

        $this->set_nome($treino_nome);
        $this->set_id($treino_id);
        $this->set_descricao($treino_descricao);
        $this->set_tipo($treino_tipo);
    }
    public function get_nome()
    {
        return $this->nome;
    }
    public function set_nome($nome)
    {
        $this->nome = $nome;
    }
    public function get_id()
    {
        return $this->id;
    }
    public function set_id($id)
    {
        $this->id = $id;
    }
    public function get_descricao()
    {
        return $this->descricao;
    }
    public function set_descricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function get_tipo()
    {
        return $this->tipo;
    }
    public function set_tipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function treino_cadastrar($treino_nome, $treino_id, $treino_descricao, $treino_tipo, $conexao)
    {
        $cadastrar_personal = $conexao->query("INSERT INTO personal(treino_nome, treino_id, treino_tipo, treino_descricao) VALUES('$treino_nome', '$treino_id','$treino_tipo','$treino_descricao')");
        echo '<script  type="text/javascript">
                alert("A $treino_nome foi criada. Seja bem-vindo!");
                </script>';
        header('Location: ../views/gerenciar.html');
    }
    public function buscar_dados()
    {
    }
}
