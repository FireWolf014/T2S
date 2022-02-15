<?php
if(!empty($_GET["classe"]) && !empty($_GET["metodo"]))
{
    $classe = $_GET["classe"]; //CategoriaController
    $metodo = $_GET["metodo"]; //abrirConsulta

    include_once "controller/$classe.php"; 
    $objeto = new $classe();
    $objeto->$metodo();
}
else
{
    //abrir tela inicial
    include_once "controller/HomeController.php";
    $home = new HomeController();
    $home->abrirHome();
}

?>