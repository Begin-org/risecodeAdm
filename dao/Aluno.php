<?php

    include_once 'Conexao.php';
    include_once '../model/Aluno.php';

    function cadastrar($aluno){

        if($aluno->getNome() != "" && $aluno->getUsuario()->getLogin() != "" && $aluno->getUsuario()->getSenha() != ""
        && $aluno->getRa() != "" && $aluno->getTurma() != null){
            try{

                $conn = abrirConexao();

                $stmt = $conn->prepare("CALL cadastrarAluno(?,?,?,?,?,?);");
                $stmt->bindValue(1, $aluno->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(2, $aluno->getRa(), PDO::PARAM_STR);
                $stmt->bindValue(3, $aluno->getFoto(), PDO::PARAM_STR);
                $stmt->bindValue(4, $aluno->getUsuario()->getLogin(), PDO::PARAM_STR);
                $stmt->bindValue(5, $aluno->getUsuario()->getSenha(), PDO::PARAM_STR);
                $stmt->bindValue(6, $aluno->getTurma()->getIdTurma(), PDO::PARAM_INT);
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
            return "Existem campos obrigatórios que não foram preenchidos!";
        }
    }

    function consultar($nome,$idEscola){

        try{

            $conn = abrirConexao();

            $stmt = $conn->prepare("CALL consultarAlunos(?,?);");
            $stmt->bindValue(1, $nome, PDO::PARAM_STR);
            $stmt->bindValue(2, $idEscola, PDO::PARAM_INT);
            $stmt->execute();

            $array = $stmt->fetchAll(); //transforma o retorno do stmt em array
            $arrayAlunos = array();

            if(count($array)<=0){
                $card = "<h2> Nenhum resultado encontrado </h2>";
                array_push($arrayAlunos, $card);
            }else{

                for($i=0;$i<count($array);$i++){
                    $row = $array[$i];

                    //forma o card que vai aparecer na div. o id do card vai ser o id do aluno em questao, para facilitar a excluir e a editar
                    //note que deixei row[1] no nome do aluno por causa da ambiguidade do campo nome aluno e nome escola, se colocar so nome vem o nome da escola ao inves do nome do aluno
                    $card = "<div class='card card-estilizado d-inline-block center-block'  id='".$row["idAluno"]."'>
                    <div class='card-header header-card-estilizado'><img src='uploads/".$row["foto"]."'
                            class='mx-auto d-block img-card'></div>
                    <div class='card-body'>
                        <h5 class='card-title text-center title-card-estilizado'>".$row[1]."</h5>
                        <div class='mx-auto d-block label-aluno'>
                            <img src='imgs/users.png' /> ".$row["descricao"]."
                        </div>
                        <div class='mx-auto d-block' style='margin-top:20px;'>
                            <button type='button' class='btn botao-card editar'>
                                <p>Editar</p>
                            </button>
                            <button type='button' class='btn botao-card excluir'>
                                <p>Excluir</p>
                            </button>
                        </div>
                    </div>
                    <div class='card-footer footer-card-estilizado verPerfil'>Ver perfil</div>
                </div>";

                    array_push($arrayAlunos, $card);
                }
            }

            return $arrayAlunos;

        }catch(Exception $e){

            return "Erro ao consultar! Descrição do erro: " . $e;

        }finally{

            fecharConexao($conn);

        }

    }

    function consultarEspecifico($idAluno){
        try{

            $conn = abrirConexao();

            $stmt = $conn->prepare("CALL consultarAlunoEspecifico(?);");
            $stmt->bindValue(1, $idAluno, PDO::PARAM_INT);
            $stmt->execute();

            $array = $stmt->fetchAll(); //transforma o retorno do stmt em array
            $arrayAlunos = array();

            for($i=0;$i<count($array);$i++){
                 $row = $array[$i];

                 $aluno = new \stdClass(); //criei um objeto padrao porque se usar o objeto aluno, nao vai ter como acessar os metodos no javascript, muito menos os atributos que estarao privados

                 $aluno->idAluno = $row["idAluno"];
                 $aluno->nome = $row["nome"];
                 $aluno->foto = $row["foto"];
                 $aluno->turma = $row["descricao"];
                 $aluno->idTurma = $row["idTurma"];
                 $aluno->ra = $row["ra"];
                 $aluno->usuario = $row["login"];
                 $aluno->senha = $row["senha"];
                 $aluno->idUsuario = $row["idUsuario"];

                array_push($arrayAlunos, $aluno);
            }


            return $arrayAlunos;

        }catch(Exception $e){

            return "Erro ao consultar! Descrição do erro: " . $e;

        }finally{

            fecharConexao($conn);

        }
    }

    function excluir($idAluno){

        try{

            $conn = abrirConexao();

            $stmt = $conn->prepare("CALL excluirAluno(?);");
            $stmt->bindValue(1, $idAluno, PDO::PARAM_INT);
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

    function alterar($aluno){

        if($aluno->getNome() != "" && $aluno->getUsuario()->getLogin() != "" && $aluno->getUsuario()->getSenha() != ""
        && $aluno->getRa() != "" && $aluno->getTurma() != null){
            try{

                $conn = abrirConexao();

                $stmt = $conn->prepare("CALL editarAluno(?,?,?,?,?,?,?,?);");
                $stmt->bindValue(1, $aluno->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(2, $aluno->getTurma()->getIdTurma(), PDO::PARAM_INT);
                $stmt->bindValue(3, $aluno->getRa(), PDO::PARAM_STR);
                $stmt->bindValue(4, $aluno->getIdAluno(), PDO::PARAM_INT);
                $stmt->bindValue(5, $aluno->getFoto(), PDO::PARAM_STR);
                $stmt->bindValue(6, $aluno->getUsuario()->getLogin(), PDO::PARAM_STR);
                $stmt->bindValue(7, $aluno->getUsuario()->getSenha(), PDO::PARAM_STR);
                $stmt->bindValue(8, $aluno->getUsuario()->getIdUsuario(), PDO::PARAM_INT);
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
            return "Existem campos obrigatórios que não foram preenchidos!";
        }
    }

?>