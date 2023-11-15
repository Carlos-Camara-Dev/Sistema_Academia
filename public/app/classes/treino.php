<?php
require_once("../models/banco_conexao.php");

class Treino
{
    private $nome;
    private $id;
    private $descricao;
    private $tipo;
    private $academia;
    public function __construct($conexao)
    {
        // $this->set_nome($treino_nome);
        // $this->set_id($treino_id);
        // $this->set_descricao($treino_descricao);
        // $this->set_tipo($treino_tipo);
        // $this->set_academia($treino_academia);
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
    public function get_academia()
    {
        return $this->academia;
    }
    public function set_academia($academia)
    {
        $this->academia = $academia;
    }

    public function treino_cadastrar($treino_nome, $treino_id, $treino_descricao, $treino_tipo, $treino_academia, $conexao)
    {
        $cadastrar_personal = $conexao->query("INSERT INTO Treino(treino_nome, treino_id, treino_tipo, treino_descricao, treino_academia) VALUES('$treino_nome', '$treino_id','$treino_tipo','$treino_descricao', '$treino_academia')");
        echo '<script  type="text/javascript">' .
            "alert('O treino de $treino_nome com $treino_id foi criado. ');
                window.history.back();" . '
                </script>';
    }
    public function buscar_dados($treino_academia, $conexao)
    {
        $comando = $conexao->query("SELECT * FROM Treino WHERE treino_academia = '$treino_academia' ORDER BY treino_nome DESC");
        echo 'AII';
        while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="treino_informacao">' .
                '<table>' .
                '<tr>
                <th>Treino ID</th>
                <th>Treino Nome</th>
                <th>Treino Descricao</th>
                <th>Treino Tipo</th>
                </tr>
                <tr>
                <td>' . $dados["treino_id"] . "</td>
                <td>" . $dados["treino_nome"] . "</td>
                <td>" . $dados["treino_descricao"] . "</td>
                <td>" . $dados["treino_tipo"] . "</td>
                </tr>
                </table>
                </div>";
        }
    }
}
