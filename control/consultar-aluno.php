<?php

session_start();

include_once "../model/Escola.php";
include_once "../model/Aluno.php";
include_once "../dao/Aluno.php";

$logado = unserialize($_SESSION['logado']); //pra pegar o id da escola logada e a escola so ver os alunos dela

if (isset($_POST["txtNome"])) { //se nao vier vazio eh pesquisa
    $txtNome = $_POST["txtNome"];
}else{
    $txtNome = ""; //se vier vazio eh carregamento de pagina
}

$resp = consultar($txtNome,$logado->getIdEscola());

print json_encode($resp);


?>