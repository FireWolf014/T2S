<?php
class ConteinerController
{
    function abrirCadastro()
    {
        include_once "view/CadastroConteiner.php";//exibir a tela de cadastro
    }

    function cadastrarConteiner()
    {
        include_once "model/Conteiner.php";
        $cli = new Conteiner(); //instanciando a classe Conteiner (Model)
        //enviando valores do form HTML para a objeto da classe Conteiner (Model)
        $cli->cliente   = $_POST["cliente"];
        $cli->numero   = $_POST["numero"];
        $cli->tipo  = $_POST["tipo"];
        $cli->statu  = $_POST["statu"];
        $cli->categoria  = $_POST["categoria"];
        $cli->cadastrar();//executando o método da classe Conteiner (model)
        //exibindo uma mensagem e voltando para a página de cadastro
        echo "<script>
                alert('Dados gravados com sucesso!');
                window.location='index.php?classe=ConteinerController&metodo=abrirCadastro';
              </script>"; 
    }

    function abrirConsulta()
    {
        
        include_once "model/Conteiner.php"; //incluir model
        $usu = new Conteiner();//intancia da model
        $dadosConteiner = $usu->consultar(); //executar consultar da model

        include_once "view/ConsultaConteiner.php"; //abrir tela de consulta
    }

    function excluirConteiner()
    {
        include_once "model/Conteiner.php";
        $usu = new Conteiner();
        $usu->codconteiner = $_GET["codconteiner"];
        $usu->excluir();
        //direcionar novamente para a página de consulta
        header("Location:index.php?classe=ConteinerController&metodo=abrirConsulta");
    }

    function editarConteiner()
    {
        include_once "model/Conteiner.php"; //incluir arquivo Conteiner.php (MODEL)
        $usu = new Conteiner(); //instanciar a classe Conteiner (Model)
        $usu->codconteiner = $_GET["codconteiner"]; //enviar o código através do link (URL)
        $dadosConteiner = $usu->retornar(); //executar o método na MODEL que retorna os dados de 1 usuário

        //direcionar para a tela de editar cadastro de usuário
        
        include_once "view/EditarConteiner.php";
    }

    function atualizarConteiner()
    {
        include_once "model/Conteiner.php";
        $usu = new Conteiner(); //instanciando a classe Conteiner (Model)
       
        //enviando valores do form HTML para a objeto da classe Conteiner (Model)
        $usu->cliente          = $_POST["cliente"];
        $usu->numero         = $_POST["numero"];
        $usu->tipo         = $_POST["tipo"];
        $usu->statu        = $_POST["statu"];
        $usu->categoria        = $_POST["categoria"];
        $usu->codconteiner    = $_POST["codconteiner"];

        $usu->atualizar();//executando o método da classe Conteiner (model)
        //exibindo uma mensagem e voltando para a página de cadastro
        echo "<script>
                alert('Dados atualizado com sucesso!');
                window.location='index.php?classe=ConteinerController&metodo=abrirConsulta';
              </script>"; 
    }

}
?>
