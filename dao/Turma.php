<?php

    include_once 'Conexao.php';
    include_once '../model/Turma.php';

    function cadastrar($turma){

        if($turma->getDescricao() != ""){
            try{

                $conn = abrirConexao();

                $escola = $turma->getEscola();

                $stmt = $conn->prepare("CALL cadastrarTurma(?,?);");
                $stmt->bindValue(1, $turma->getDescricao(), PDO::PARAM_STR);
                $stmt->bindValue(2, $escola->getIdEscola(), PDO::PARAM_STR);
                $stmt->execute();

                $array = $stmt->fetchAll();
                $lastElement = end($array);

                return $lastElement[0];
 
            }catch(Exception $e){

                return "Erro ao cadastrar! Descrição do erro: " . $e;

            }finally{

                fecharConexao($conn);

            }

        }else{
            return "Descrição vazia!";
        }
    }

    function consultar($descricao){

        try{

            $conn = abrirConexao();

            $stmt = $conn->prepare("CALL consultarTurmas(?);");
            $stmt->bindValue(1, $descricao, PDO::PARAM_STR);
            $stmt->execute();

            $array = $stmt->fetchAll();
            $arrayTurmas = array();

            for($i=0;$i<count($array);$i++){
                $row = $array[$i];

                $linha = "<tr class='sweep-to-right' id=".$row["idTurma"]."><td scope='row'>".$row["descricao"]."</td><td></td><td><i class='fas fa-pen icons-table'></i></td><td><i class='fas fa-trash icons-table'></i></td></tr>";

                array_push($arrayTurmas, $linha);
            }

            return $arrayTurmas;

        }catch(Exception $e){

            return "Erro ao consultar! Descrição do erro: " . $e;

        }finally{

            fecharConexao($conn);

        }

    }

    function excluir($idTurma){

        try{

            $conn = abrirConexao();

            $stmt = $conn->prepare("CALL excluirTurma(?);");
            $stmt->bindValue(1, $idTurma, PDO::PARAM_INT);
            $stmt->execute();

            $array = $stmt->fetchAll();
            $lastElement = end($array);

            return $lastElement[0];

        }catch(Exception $e){

            return "Erro ao excluir! Descrição do erro: " . $e;

        }finally{

            fecharConexao($conn);

        }

    }

?>