<?php
class Aluno
{
    private $nome;
    private $id;
    private $pagamento_dia;
    private $email;
    private Academia $academia;
    private Treino $treino;
    public function __construct($aluno_nome, $aluno_id, $aluno_pagamento_dia, $alunol_email, $conexao)
    {

        $this->set_nome($aluno_nome);
        $this->set_id($aluno_id);
        $this->set_pagamento_dia($aluno_pagamento_dia);
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
    public function get_pagamento_dia()
    {
        return $this->pagamento_dia;
    }
    public function set_pagamento_dia($pagamento_dia)
    {
        $this->pagamento_dia = $pagamento_dia;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }

    public function aluno_cadastrar($aluno_nome, $aluno_id, $aluno_pagamento_dia, $aluno_email, $conexao)
    {
        $cadastrar_personal = $conexao->query("INSERT INTO Aluno(aluno_nome, aluno_id,aluno_email,aluno_pagamento_dia) VALUES('$aluno_nome', '$aluno_id','$aluno_email','$aluno_pagamento_dia')");
        echo '<script  type="text/javascript">
                alert("A $aluno_nome foi criada. Seja bem-vindo!");
                </script>';
        header('Location: ../views/gerenciar.html');
    }
    public function buscar_dados()
    {
    }
}
