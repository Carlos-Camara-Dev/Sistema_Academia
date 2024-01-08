

<?php

require_once '../../libraries/dompdf-2.0.4/dompdf/autoload.inc.php';
require_once("../classes/aluno.php");
require_once("../models/banco_conexao.php");

session_start();
$usuario_acesso = $_SESSION['acesso_id'];

function gerar_pdf($usuario_acesso, $conexao)
{
    $comando = $conexao->query("SELECT * FROM Aluno WHERE aluno_academia = '$usuario_acesso'");

    $dompdf = new Dompdf\Dompdf();

    if ($comando->rowCount() > 0) {
        while ($dados = $comando->fetch(PDO::FETCH_ASSOC)) {

            $aluno_id = $dados["aluno_id"];

            $aluno_treino = $conexao->query("SELECT * FROM Aluno_Treino WHERE aluno_id = '$aluno_id' ORDER BY dia_treino ASC");

            $htmlContent = '<div class="informacao"><h3>Lista de Alunos e Seus Treinos>' .
                '<table>' .
                '<tr>
                <th>Aluno Id</th>
                <th>Treino Id</th>
                <th>Dia do Treino</th>
            </tr>';

            while ($dados_treino = $aluno_treino->fetch(PDO::FETCH_ASSOC)) {
                $htmlContent .= '<tr>
                <td>' . $dados_treino["aluno_id"] . '</td>
                <td>' . $dados_treino["treino_id"] . '</td> 
                <td>' . $dados_treino["dia_treino"] . '</td>
            </tr>';
            }

            $htmlContent .= '</table></div>';

            $dompdf->loadHtml($htmlContent);

            $dompdf->render();

            $dompdf->stream('Lista_alunos_treino.pdf');
        }
    }
}
gerar_pdf($usuario_acesso, $conexao);
