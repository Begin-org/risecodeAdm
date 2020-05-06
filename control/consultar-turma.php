<?php

include_once "../model/Turma.php";
include_once "../dao/Turma.php";

if (isset($_POST["txtDescricao"])) {
    $txtDescricao = $_POST["txtDescricao"];
}else{
    $txtDescricao = "";
}

$resp = consultar($txtDescricao);

print json_encode($resp);


?>