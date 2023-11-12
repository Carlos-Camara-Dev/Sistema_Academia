<?php
class Aluno
{
    private $nome;
    private $id;
    private $email;
    private $senha;
    private $pagamento_dia;
    private Academia $academia;
    private Treino $treino;
    public function __construct($aluno_nome, $aluno_id, $alunol_email, $aluno_senha, $aluno_pagamento_dia, $aluno_academia, $conexao)
    {

        $this->set_nome($aluno_nome);
        $this->set_id($aluno_id);
        $this->set_senha($aluno_senha);
        $this->set_email($alunol_email);
        $this->set_pagamento_dia($aluno_pagamento_dia);
        $this->set_academia($aluno_academia);
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
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function get_senha()
    {
        return $this->senha;
    }
    public function set_senha($senha)
    {
        $this->senha = $senha;
    }
    public function get_pagamento_dia()
    {
        return $this->pagamento_dia;
    }
    public function set_pagamento_dia($pagamento_dia)
    {
        $this->pagamento_dia = $pagamento_dia;
    }
    public function get_academia()
    {
        return $this->academia;
    }
    public function set_academia($academia)
    {
        $this->academia = $academia;
    }

    public function aluno_cadastrar($aluno_nome, $aluno_id,  $aluno_email, $aluno_senha, $aluno_pagamento_dia, $aluno_academia, $conexao)
    {
        $cadastrar_personal = $conexao->query("INSERT INTO Aluno(aluno_nome, aluno_id,aluno_email,aluno_senha,aluno_pagamento_dia, aluno_academia) VALUES('$aluno_nome', '$aluno_id','$aluno_email','$aluno_senha','$aluno_pagamento_dia', '$aluno_academia')");
        echo '<script  type="text/javascript">
                alert("O $aluno_nome foi criado.");
                </script>';
        header('Location: ../views/gerenciar.html');
    }
    public function buscar_dados()
    {
    }
}
