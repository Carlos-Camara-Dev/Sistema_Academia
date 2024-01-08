<?php
class Aluno
{
    private $nome;
    private $id;
    private $email;
    private $senha;
    private $pagamento_dia;
    private $academia;
    public function __construct($conexao)
    {

        // $this->set_nome($aluno_nome);
        // $this->set_id($aluno_id);
        // $this->set_senha($aluno_senha);
        // $this->set_email($alunol_email);
        // $this->set_pagamento_dia($aluno_pagamento_dia);
        // $this->set_academia($aluno_academia);
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

    public function aluno_cadastrar($aluno_nome, $aluno_id,  $aluno_email, $aluno_senha, $aluno_dia_pagamento, $aluno_academia, $conexao)
    {
        $cadastrar_personal = $conexao->query("INSERT INTO Aluno(aluno_nome, aluno_id,aluno_email,aluno_senha, aluno_dia_pagamento, aluno_academia) VALUES('$aluno_nome', '$aluno_id','$aluno_email','$aluno_senha', '$aluno_dia_pagamento','$aluno_academia')");
        echo '<script  type="text/javascript">' .
            "alert('O aluno $aluno_nome com o id $aluno_id foi criado.');" .
            'window.history.back();</script>';
    }
    public function buscar_dados($aluno_academia, $conexao)
    {
        $comando = $conexao->query("SELECT * FROM Aluno WHERE aluno_academia = '$aluno_academia' ORDER BY aluno_nome ASC");
        while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="informacao">' .
                '<table>' .
                '<tr>
                <th>Aluno ID</th>
                <th>Aluno Nome</th>
                <th>Aluno Email</th>
                <th>Aluno Pagamento</th>
                </tr>
                <tr>
                <td>' . $dados["aluno_id"] . "</td>
                <td>" . $dados["aluno_nome"] . "</td>
                <td>" . $dados["aluno_email"] . "</td>
                <td>" . $dados["aluno_dia_pagamento"] . "</td>               
                </tr>
                </table>
                </div>";
        }
    }
    function buscar_dado($dado_tipo, $aluno_id, $aluno_academia, $conexao)
    {
        $comando = $conexao->query("SELECT * FROM Aluno WHERE aluno_academia = '$aluno_academia' and aluno_id = '$aluno_id'");
        // Puxa o dado a parti do seu tipo e dar echo:
        while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {
            $informacao = $dados[$dado_tipo];
            echo $informacao;
        }
    }
    function buscar_treino_aluno($aluno_id, $treino_dia, $conexao)
    {
        $comando = $conexao->query("SELECT * FROM Aluno_Treino WHERE aluno_id = '$aluno_id' AND dia_treino = '$treino_dia'");
        // Verifica se o aluno tem treino:
        if ($comando->rowCount() > 0) {
            while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {
                // Verifica o id do treino na tabela Treino:
                $treino_id = $dados["treino_id"];

                $comando_treino = $conexao->query("SELECT * FROM Treino WHERE treino_id = '$treino_id'");
                // Puxa os dados do treino e dar um echo:

                $dados_treino = $comando_treino->fetch(PDO::FETCH_ASSOC);
                echo '<div class="informacao">' .
                    '<table>' .
                    '<tr>
                        <th>Treino</th>
                        <th>Tipo de Treino</th>
                        <th>Descricao</th>
                        <th>Dia do Treino</th>
                        </tr>
                        <tr>
                        <td>' . $dados_treino["treino_nome"] . "</td>
                        <td>" . $dados_treino["treino_tipo"] . "</td> 
                        <td>" . $dados_treino["treino_descricao"] . "</td>
                        <td>" . $treino_dia . "</td>
                        </tr>
                        </table>
                        </div>";
            }
        }
    }

    function buscar_alunos_treinos($aluno_academia, $conexao)
    {
        $comando = $conexao->query("SELECT * FROM Aluno WHERE aluno_academia = '$aluno_academia'");
        // Verifica se o aluno tem treino:
        if ($comando->rowCount() > 0) {
            while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {
                // Verifica o id do treino na tabela Treino:
                $aluno_id = $dados["aluno_id"];

                $aluno_treino = $conexao->query("SELECT * FROM Aluno_Treino WHERE aluno_id = '$aluno_id' ORDER BY dia_treino ASC");
                // Puxa os dados do treino e dar um echo:

                while ($dados_treino = $aluno_treino->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="informacao">' .
                        '<table>' .
                        '<tr>
                        <th>Aluno Id</th>
                        <th>Treino Id</th>
                        <th>Dia do Treino</th>
                        </tr>
                        <tr>
                        <td>' . $dados_treino["aluno_id"] . "</td>
                        <td>" . $dados_treino["treino_id"] . "</td> 
                        <td>" . $dados_treino["dia_treino"] . "</td>
                        </tr>
                        </table>
                        </div>";
                }
            }
        }
    }
    function treinos_quantidade($aluno_id, $conexao)
    {
        $comando = $conexao->query("SELECT * FROM Aluno_Treino WHERE aluno_id = '$aluno_id'");
        echo $comando->rowCount();
    }
}
