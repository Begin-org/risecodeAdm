<?php

session_start();

include_once "../model/Escola.php";
include_once "../model/Turma.php";
include_once "../dao/Turma.php";

$logado = unserialize($_SESSION['logado']); //pra pegar o id da escola logada e a escola so ver as turmas dela

if (isset($_POST["txtDescricao"])) { //se nao vier vazio eh pesquisa
    $txtDescricao = $_POST["txtDescricao"];
}else{
    $txtDescricao = ""; //se vier vazio eh carregamento de pagina
}

$resp = consultar($txtDescricao,$logado->getIdEscola());

print json_encode($resp);


?>