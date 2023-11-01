<?php
$academia_nome = $_POST['academia_nome'];
$academia_cnpj = $_POST['academia_cnpj'];
$academia_senha = $_POST['academia_senha'];
$academia_email = $_POST['academia_email'];

class Academia
{
    private $nome;
    private $cnpj;
    private $senha;
    private $email;
    public $academia_status;
    public function __construct($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao)
    {

        $this->set_nome($academia_nome);
        $this->set_cnpj($academia_cnpj);
        $this->set_senha($academia_senha);
        $this->set_email($academia_email);
        $this->academia_verificar($this->get_cnpj(), $conexao);
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
    private function academia_verificar($academia_cnpj, $conexao)
    {
        $verificar_cnpj = $conexao->query("SELECT * FROM Academia WHERE academia_cnpj= $academia_cnpj");

        if ($verificar_cnpj->rowCount() > 0) {
            $academia_status = true;
            echo '<script  type="text/javascript">
                alert("O $academia_cnpj já foi cadastrado!");
                window.history.back();
                </script>';
        } else {
            // $this->academia_cadastrar($this->get_nome(), $this->get_cnpj(),    $this->get_senha(), $this->get_email(), $conexao);

        }
    }
    private function academia_cadastrar($academia_nome, $academia_cnpj, $academia_senha, $academia_email, $conexao)
    {
        $cadastrar_academia = $conexao->query("INSERT INTO Academia (academia_nome, academia_cnpj, academia_senha, academia_email) VALUES('$academia_nome', '$academia_cnpj','$academia_senha', '$academia_email')");
        echo '<script  type="text/javascript">
                alert("A $academia_nome foi craiada. Seja bem-vindo!");
                window.history.back();
                </script>';
        header('Location: ../views/gerenciar.html');
    }
}
