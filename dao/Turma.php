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

                $array = $stmt->fetchAll(); //transforma o retorno do stmt em array
                $lastElement = end($array); //pega o ultimo elemento (por seguranca)

                return $lastElement[0]; //retorna o texto da procedure, que vem na primeira e unica posicao do retorno do stmt nesse caso

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

            $array = $stmt->fetchAll(); //transforma o retorno do stmt em array
            $arrayTurmas = array();

            if(count($array)<=0){
                $linha = "<tr class='sweep-to-right' id=0><td scope='row'>Nenhum resultado encontrado</td><td></td><td></td><td></td></tr>";
                array_push($arrayTurmas, $linha);
            }else{

                for($i=0;$i<count($array);$i++){
                    $row = $array[$i];

                    //forma a linha que vai aparecer na tabela. o id da linha vai ser o id da turma em questao, para facilitar a excluir e a editar
                    $linha = "<tr class='sweep-to-right' id=".$row["idTurma"]."><td scope='row'>".$row["descricao"]."</td><td></td><td><i class='fas fa-pen icons-table'></i></td><td><i class='fas fa-trash icons-table'></i></td></tr>";

                    array_push($arrayTurmas, $linha);
                }
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

            $array = $stmt->fetchAll(); //transforma o retorno do stmt em array
            $lastElement = end($array); //pega o ultimo elemento (por seguranca)

            return $lastElement[0]; //retorna o texto da procedure, que vem na primeira e unica posicao do retorno do stmt nesse caso

        }catch(Exception $e){

            return "Erro ao excluir! Descrição do erro: " . $e;

        }finally{

            fecharConexao($conn);

        }

    }

    function alterar($turma){

        if($turma->getDescricao() != ""){
            try{

                $conn = abrirConexao();

                $stmt = $conn->prepare("CALL editarTurma(?,?);");
                $stmt->bindValue(1, $turma->getDescricao(), PDO::PARAM_STR);
                $stmt->bindValue(2, $turma->getIdTurma(), PDO::PARAM_STR);
                $stmt->execute();

                $array = $stmt->fetchAll(); //transforma o retorno do stmt em array
                $lastElement = end($array); //pega o ultimo elemento (por seguranca)

                return $lastElement[0]; //retorna o texto da procedure, que vem na primeira e unica posicao do retorno do stmt nesse caso
 
            }catch(Exception $e){

                return "Erro ao alterar! Descrição do erro: " . $e;

            }finally{

                fecharConexao($conn);

            }

        }else{
            return "Descrição vazia!";
        }
    }

?>