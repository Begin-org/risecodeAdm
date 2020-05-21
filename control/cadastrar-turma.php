<?php

session_start(); //comeca a sessao porque precisa dela pra saber de qual escola tem que cadastrar a turma

include_once "../model/Escola.php";
include_once "../model/Turma.php";
include_once "../dao/Turma.php";

$descricao = $_POST["txtDescricao"];

$logado = unserialize($_SESSION['logado']); //pega a escola que ta logada na sessao e separa os dados dela pra virar objeto de novo

$t = new Turma();
$e = new Escola();

$e->setIdEscola($logado->getIdEscola()); //pega o id da escola que ta logada

$t->setDescricao($descricao);
$t->setEscola($e);

$resp = cadastrar($t);

echo $resp;



?>