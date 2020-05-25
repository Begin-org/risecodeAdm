<?php

include_once "../model/Aluno.php";
include_once "../dao/Aluno.php";

$idAluno = $_POST["idAluno"];

$resp = excluir($idAluno);

print $resp;


?>