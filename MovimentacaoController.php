<?php
class MovimentacaoController
{
    function abrirCadastro()
    {
        include_once "model/Conteiner.php";
        $Con = new Conteiner();
        $dadosConteiner = $Con->consultar();

        include_once "view/CadastroMovimentacao.php";
    }

    function cadastrarMovimentacao()
    {
        include_once "model/Movimentacao.php";
        $mov = new Movimentacao();
        $mov->codconteiner = $_POST["codconteiner"];
        $mov->movimentacao = $_POST["movimentacao"];
        $mov->inicio = $_POST["inicio"];
        $mov->fim = $_POST["fim"];
        $mov->cadastrar();
        echo "<script>
        alert('Dados gravados com sucesso!');
        window.location='index.php?classe=MovimentacaoController&metodo=abrirCadastro';
      </script>";

    }

    function abrirConsulta()
    {
        include_once "model/Movimentacao.php";
        $mov = new Movimentacao();
        $dadosMovimentacao = $mov->consultar();

        include_once "view/ConsultaMovimentacao.php";

    }

    function ExcluirMovimentacao()
    {
        include_once "model/Movimentacao.php";
        $usu = new Movimentacao();
        $usu->codmovimentacao = $_GET["codmovimentacao"];
        $usu->excluir();
        header("Location:index.php?classe=MovimentacaoController&metodo=abrirConsulta");
    }

    function editarMovimentacao()
    {

    }

    function atualizarMovimentacao()
    {
        
    }
}
?>