<?php

session_start();

include_once "../model/Escola.php";
include_once "../model/Turma.php";
include_once "../dao/Turma.php";

$descricao = $_POST["txtDescricao"];

$logado = unserialize($_SESSION['logado']);

$t = new Turma();
$e = new Escola();

$e->setIdEscola($logado->getIdEscola());

$t->setDescricao($descricao);
$t->setEscola($e);

$resp = cadastrar($t);

echo $resp;



?>