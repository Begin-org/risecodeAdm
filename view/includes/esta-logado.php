<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/risecode/model/Administrador.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/risecode/model/Usuario.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/risecode/model/Escola.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/risecode/model/Professor.php');
    if (empty($_SESSION['logado']))//se nao tiver ninguem logado
    {
        header("Location:index1.php");//redireciona para o index
    }else{
        $logado = unserialize($_SESSION['logado']); //transforma a sessao em objeto como era antes de dar serialize
        $idTipo = $logado->getUsuario()->getIdTipoUsuario(); //pega o tipo de usuario de quem esta logado
        $nomeArq = basename($_SERVER['PHP_SELF'],'.php'); //pega o nome do arquivo atual em que se encontra

        //nao deixa quem nao tem permissao entrar em paginas que nao se deve entrar
        if(($nomeArq == "pag-escolas" && $idTipo != 1) || ($nomeArq == "pag-alunos" && $idTipo != 2) || ($nomeArq == "pag-escolas" && $idTipo != 2)
        || ($nomeArq == "pag-turmas" && $idTipo != 2 && $idTipo != 3)){
            header("Location:pag-home.php");
        }
    }
?>