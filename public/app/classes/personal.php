<?php
require_once("../models/banco_conexao.php");

class Personal
{
    private $nome;
    private $id;
    private $email;
    private $senha;
    private Academia $academia;

    public function __construct($conexao)
    {
        // $this->set_nome($personal_nome);
        // $this->set_id($personal_id);
        // $this->set_email($personal_email);
        // $this->set_senha($personal_senha);
        // $this->set_academia($personal_academia);
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
    public function get_academia()
    {
        return $this->academia;
    }
    public function set_academia($academia)
    {
        $this->academia = $academia;
    }

    public function personal_cadastrar($personal_nome, $personal_id, $personal_email, $personal_senha, $personal_academia, $conexao)
    {
        $cadastrar_personal = $conexao->query("INSERT INTO Personal(personal_nome, personal_id, personal_email, personal_senha, personal_academia) VALUES('$personal_nome', '$personal_id','$personal_email', '$personal_senha', $personal_academia')");
        echo '<script  type="text/javascript">' .
            "alert('A conta do $personal_nome com o id $personal_id foi criada.');" . '</script>';
        header('Location: ../views/gerenciar.html');
    }
    public function buscar_dados($personal_academia, $conexao)
    {
        $comando = $conexao->query("SELECT * FROM Personal WHERE personal_academia = '$personal_academia' ORDER BY personal_nome DESC");
        while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="informacao">' .
                '<table>' .
                '<tr>
                <th>Personal ID</th>
                <th>Personal Nome</th>
                <th>Personal Email</th>
                <th>Personal Senha</th>
                </tr>
                <tr>
                <td>' . $dados["personal_id"] . "</td>
                <td>" . $dados["personal_nome"] . "</td>
                <td>" . $dados["personal_email"] . "</td>
                <td>" . $dados["personal_senha"] . "</td>
                </tr>
                </table>
                </div>";
        }
    }
}
