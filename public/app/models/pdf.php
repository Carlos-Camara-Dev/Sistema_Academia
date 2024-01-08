

<?php

require_once '../../libraries/dompdf-2.0.4/dompdf/autoload.inc.php';
require_once("../classes/aluno.php");
require_once("../models/banco_conexao.php");

session_start();
$usuario_acesso = $_SESSION['acesso_id'];
$operacao = $_GET['operacao'];

if ($operacao == "aluno_treino") {
    gerar_pdf_aluno($usuario_acesso, $conexao);
} elseif ($operacao == "alunos_treinos") {
    gerar_pdf($usuario_acesso, $conexao);
}
function gerar_pdf($usuario_acesso, $conexao)
{
    $comando = $conexao->query("SELECT * FROM Aluno WHERE aluno_academia = '$usuario_acesso'");

    $dompdf = new Dompdf\Dompdf();

    if ($comando->rowCount() > 0) {
        while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {

            $aluno_id = $dados["aluno_id"];
            $aluno_peso = $dados["aluno_peso"];
            $aluno_altura = $dados["aluno_altura"];
            $aluno_condicao = $dados["aluno_condicao"];

            $aluno_treino = $conexao->query("SELECT * FROM Aluno_Treino WHERE aluno_id = '$aluno_id' ORDER BY dia_treino ASC");

            $html = '<div class="informacao"><h3>Lista de Alunos e Seus Treinos</h3>' .
                '<table>' .
                '<tr>
                <th>Aluno Id</th>
                <th>Treino Id</th>
                <th>Dia do Treino</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Condicao</th>
            </tr>';

            while ($dados_treino = $aluno_treino->fetch(PDO::FETCH_ASSOC)) {
                $html .= '<tr>
                <td>' . $dados_treino["aluno_id"] . '</td>
                <td>' . $dados_treino["treino_id"] . '</td> 
                <td>' . $dados_treino["dia_treino"] . '</td>
                <td>' . $aluno_peso . '</td>
                <td>' . $aluno_altura . '</td>
                <td>' . $aluno_condicao . '</td>
            </tr>';
            }

            $html .= '</table></div>';

            $dompdf->loadHtml($html);

            $dompdf->render();

            $dompdf->stream('lista_alunos_treino.pdf');
        }
    }
}

function gerar_pdf_aluno($usuario_acesso, $conexao)
{
    $comando = $conexao->query("SELECT * FROM Aluno_Treino WHERE aluno_id = '$usuario_acesso'");

    $dompdf = new Dompdf\Dompdf();

    if ($comando->rowCount() > 0) {

        $html = '<div class="informacao">
        <h3>Lista de Alunos e Seus Treinos</h3>' .
            '<table>' .
            '<tr>
                <th>Treino</th>
                <th>Tipo de Treino</th>
                <th>Descricao</th>
                <th>Dia do Treino</th>
            </tr>';

        while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {

            $treino_id = $dados["treino_id"];
            $dia_treino = $dados["dia_treino"];

            $comando_treino = $conexao->query("SELECT * FROM Treino WHERE treino_id = '$treino_id'");
            $dados_treino = $comando_treino->fetch(PDO::FETCH_ASSOC);

            $html .= '<tr>
                <td>' . $dados_treino["treino_nome"] . '</td>
                <td>' . $dados_treino["treino_tipo"] . '</td> 
                <td>' . $dados_treino["treino_descricao"] . '</td>
                <td>' . $dia_treino . '</td>
            </tr>';
        }

        $html .= '</table></div>';

        $dompdf->loadHtml($html);

        $dompdf->render();

        $dompdf->stream('lista_treinos.pdf');
    }
}
