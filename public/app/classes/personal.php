<?php
require_once("../models/banco_conexao.php");

class Academia
{
    private $nome;
    private $cnpj;
    private $senha;
    private $email;
    public function __construct($personal_nome, $personal_id, $personal_senha, $personal_email, $conexao)
    {

        $this->set_nome($personal_nome);
        $this->set_cnpj($personal_id);
        $this->set_senha($personal_senha);
        $this->set_email($personal_email);
    }
    public function get_nome()
    {
        return $this->nome;
    }
    public function set_nome($nome)
    {
        $this->nome = $nome;
    }
    public function get_cnpj()
    {
        return $this->cnpj;
    }
    public function set_cnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function get_senha()
    {
        return $this->senha;
    }
    public function set_senha($senha)
    {
        $this->senha = $senha;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }

    public function personal_cadastrar($personal_nome, $personal_id, $personal_senha, $personal_email, $conexao)
    {
        $cadastrar_personal = $conexao->query("INSERT INTO personal(personal_nome, personal_id, personal_email, personal_senha) VALUES('$personal_nome', '$personal_id','$personal_email','$personal_senha')");
        echo '<script  type="text/javascript">
                alert("A $personal_nome foi criada. Seja bem-vindo!");
                </script>';
        header('Location: ../views/gerenciar.html');
    }
    public function buscar_dados()
    {
    }
}
