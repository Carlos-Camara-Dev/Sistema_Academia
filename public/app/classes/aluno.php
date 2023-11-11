<?php
class Aluno
{
    private $nome;
    private $id;
    private $senha;
    private $email;
    private Academia $academia;
    private Treino $treino;
    public function __construct($aluno_nome, $aluno_id, $aluno_senha, $alunol_email, $conexao)
    {

        $this->set_nome($aluno_nome);
        $this->set_id($aluno_id);
        $this->set_senha($aluno_senha);
        $this->set_email($alunol_email);
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

    public function aluno_cadastrar($aluno_nome, $aluno_id, $aluno_senha, $aluno_email, $conexao)
    {
        $cadastrar_personal = $conexao->query("INSERT INTO personal(personal_nome, personal_id, personal_email, personal_senha) VALUES('$aluno_nome', '$aluno_id','$aluno_email','$aluno_senha')");
        echo '<script  type="text/javascript">
                alert("A $aluno_nome foi criada. Seja bem-vindo!");
                </script>';
        header('Location: ../views/gerenciar.html');
    }
    public function buscar_dados()
    {
    }
}
