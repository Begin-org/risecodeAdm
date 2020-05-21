<?php

include_once "../model/Turma.php";
include_once "../dao/Turma.php";

if (isset($_POST["txtDescricao"])) { //se nao vier vazio eh pesquisa
    $txtDescricao = $_POST["txtDescricao"];
}else{
    $txtDescricao = ""; //se vier vazio eh carregamento de pagina
}

$resp = consultar($txtDescricao);

print json_encode($resp);


?>