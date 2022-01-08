<?php
class ConsultaController
{
    function abrirConsulta()
    {
        session_start();
        include_once "model/Consulta.php";
        $cat = new Consulta();
        $dadosConsulta = $cat->relatorio();

        include_once "view/Consulta.php";
    }
}
?>