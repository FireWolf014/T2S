<?php
if(!empty($_GET["classe"]) && !empty($_GET["metodo"]))
{
    $classe = $_GET["classe"]; 
    $metodo = $_GET["metodo"]; 

    include_once "controller/$classe.php"; 
    $objeto = new $classe();
    $objeto->$metodo();
}
else
{
    include_once "controller/HomeController.php";
    $home = new HomeController();
    $home->abrirHome();
}

?>