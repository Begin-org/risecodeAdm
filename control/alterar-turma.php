<?php

include_once "../model/Escola.php";
include_once "../model/Turma.php";
include_once "../dao/Turma.php";

$descricao = $_POST["descricao"];
$idTurma = $_POST["idTurma"];

$t = new Turma();

$t->setDescricao($descricao);
$t->setIdTurma($idTurma);

$resp = alterar($t);

echo $resp;



?>