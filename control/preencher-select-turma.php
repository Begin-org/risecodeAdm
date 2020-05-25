<?php

session_start();

include_once "../model/Escola.php";
include_once "../model/Turma.php";
include_once "../dao/Turma.php";

$logado = unserialize($_SESSION['logado']); //pra pegar o id da escola logada e a escola so ver as turmas dela

$resp = preencherSelect($logado->getIdEscola());

echo json_encode($resp);

?>