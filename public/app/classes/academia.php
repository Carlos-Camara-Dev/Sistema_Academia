<?php
require_once("../models/banco_conexao.php");

class Academia
{
    private $nome;
    private $cnpj;
    private $senha;
    private $email;
    public function __construct($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao)
    {

        $this->set_nome($academia_nome);
        $this->set_cnpj($academia_cnpj);
        $this->set_senha($academia_senha);
        $this->set_email($academia_email);
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

    public function academia_cadastrar($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao)
    {
        $cadastrar_academia = $conexao->query("INSERT INTO academia(academia_nome, academia_cnpj, academia_email, academia_senha) VALUES('$academia_nome', '$academia_cnpj','$academia_email','$academia_senha')");
        echo '<script  type="text/javascript">' .
            "alert('A $academia_nome foi criada. Seja bem-vindo!');" .
            '</script>';
        header('Location: ../views/gerenciar.html');
    }
    public function buscar_dados()
    {
    }
}
