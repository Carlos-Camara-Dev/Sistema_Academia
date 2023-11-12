<?php
require_once('verificar.php');

function criacao_id($operacao, $contador)
{
    $id = "";
    switch ($operacao) {
        case 'academia':
            if (strlen($id) == 1) {
                $id = "E00" + $contador;
            } else if (strlen($id) == 2) {
                $id = "E0" + $contador;
            } else if (strlen($id) == 3) {
                $id = "E" + $contador;
            }
            return $id;
            break;
        case 'aluno':
            if (strlen($id) == 1) {
                $id = "A00" + $contador;
            } else if (strlen($id) == 2) {
                $id = "A0" + $contador;
            } else if (strlen($id) == 3) {
                $id = "A" + $contador;
            }
            return $id;
            break;
        case 'personal':
            if (strlen($id) == 1) {
                $id = "P00" + $contador;
            } else if (strlen($id) == 2) {
                $id = "P0" + $contador;
            } else if (strlen($id) == 3) {
                $id = "P" + $contador;
            }
            return $id;
            break;

        default:
            # code...
            break;
    }
    return $id;
}
