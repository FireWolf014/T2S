<?php
class ConteinerController
{
    function abrirCadastro()
    {
        include_once "view/CadastroConteiner.php";
    }

    function cadastrarConteiner()
    {
        include_once "model/Conteiner.php";
        $cli = new Conteiner();
        $cli->cliente = $_POST["cliente"];
        $cli->numero = $_POST["numero"];
        $cli->tipo = $_POST["tipo"];
        $cli->statu = $_POST["statu"];
        $cli->categoria = $_POST["categoria"];
        $cli->cadastrar();
        echo "<script>
        alert('Dados gravados com sucesso!');
        window.location='index.php?classe=ConteinerController&metodo=abrirCadastro';
      </script>";
    }

    function abrirConsulta()
    {
        include_once "model/Conteiner.php";
        $cli = new Conteiner();
        $dadosConteiner = $cli->consultar();

        include_once "view/ConsultaConteiner.php";
    }

    function ExcluirConteiner()
    {
        include_once "model/Conteiner.php";
        $usu = new Conteiner();
        $usu->codconteiner = $_GET["codconteiner"];
        $usu->excluir();
        header("Location:index.php?classe=ConteinerController&metodo=abrirConsulta");
    }

    function editarConteiner()
    {

    }

    function atualizarConteiner()
    {

    }
}
?>