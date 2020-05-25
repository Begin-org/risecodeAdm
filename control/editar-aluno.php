<?php
include_once 'upload-foto.php';
include_once "../model/Aluno.php";
include_once "../model/Turma.php";
include_once "../model/Usuario.php";
include_once "../dao/Aluno.php";

$t = new Turma();
$a = new Aluno();
$u = new Usuario();

$a->setNome($_POST['txtNome']);
$a->setRa($_POST['txtRa']);
$t->setIdTurma($_POST['turmas']);
$a->setTurma($t);
$u->setLogin($_POST['txtUsuario']);
$u->setSenha($_POST['txtSenha']);
$u->setIdUsuario($_POST['idUsuario']);
$a->setUsuario($u);
$a->setFoto($_POST['fotoAnterior']); //se a foto nao for mudada na edicao, entao no cadastro vai continuar com a foto atual
$a->setIdAluno($_POST['idAluno']);

if($a->getTurma()->getIdTurma()!=0){

    if($_FILES["fotoUpload"]["name"] != null && $_FILES["fotoUpload"]["name"] != ""){ //mudou a foto na edicao
        $resp = uploadFoto($_FILES["fotoUpload"]["name"], $_FILES["fotoUpload"]["tmp_name"]);
        if($resp == "O arquivo não é uma imagem!"){
            $a->setFoto("erro");
            echo $resp;
        }else{
            $a->setFoto($resp);
        }
    }

    if($a->getFoto()!="erro"){
        echo alterar($a);
    }else{
        //destruindo os objetos e voltando pra tela de cadastro porque o usuario upou coisa errada
        $t = null; 
        $a = null; 
        $u = null; 
    }

}else{
    echo "Selecione uma turma!";
}


?>