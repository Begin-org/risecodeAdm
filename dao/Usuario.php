<?php

    include_once 'Conexao.php';
    include_once '../model/Administrador.php';
    include_once '../model/Professor.php';
    include_once '../model/Escola.php';
    include_once '../model/Aluno.php';
    include_once '../model/Turma.php';
    include_once '../model/Escola.php';

    function realizarLogin($usuario){

        if($usuario->getIdTipoUsuario() != 0){

            try{

                $conn = abrirConexao();

                $stmt = $conn->prepare("CALL efetuarLogin(?,?,?);");
                $stmt->bindValue(1, $usuario->getLogin(), PDO::PARAM_STR);
                $stmt->bindValue(2, $usuario->getSenha(), PDO::PARAM_STR);
                $stmt->bindValue(3, $usuario->getIdTipoUsuario(), PDO::PARAM_STR);
                $stmt->execute();

                $telefones = array();
                $turmas = array();

                $array = $stmt->fetchAll(); //transforma o retorno do stmt em array
                $lastElement = end($array);

                if($lastElement[0]!=0){ //se vier 0 eh porque ta errado
                
                    if (count($array) >= 0) { //se tiver dados pra percorrer
                        for($i=0;$i<count($array);$i++){

                            $row = $array[$i];
                            
                            $usuario->setIdUsuario($row["idUsuario"]);
                                
                            if($usuario->getIdTipoUsuario() == 1){
                                $adm = new Administrador();
                                    
                                $adm->setIdAdministrador($row["idAdministrador"]);
                                $adm->setUsuario($usuario);
                                $adm->setNome($row["nome"]);
                                $adm->setFoto($row["foto"]);
                                    
                                return $adm;
                            }elseif($usuario->getIdTipoUsuario() == 2){
                                array_push($telefones,$row["descricao"]);
                                    
                                if($row == $lastElement){
                                    $school = new Escola();
                                    $school->setUsuario($usuario);
                                    $school->setIdEscola($row["idEscola"]);
                                    $school->setBairro($row["bairro"]);
                                    $school->setCep($row["cep"]);
                                    $school->setCidade($row["cidade"]);
                                    $school->setEstado($row["estado"]);
                                    $school->setLogradouro($row["logradouro"]);
                                    $school->setNumero($row["numero"]);
                                    $school->setTelefones($telefones);
                                        
                                    return $school;
                                }
                                    
                            }elseif($usuario->getIdTipoUsuario() == 3){
                                $class = new Turma();
                                $school = new Escola();
                                    
                                $class->setIdTurma($row["tbTurma.idTurma"]);
                                $class->setDescricao($row["tbTurma.descricao"]);

                                $school->setIdEscola($row["tbEscola.idEscola"]);
                                $school->setBairro($row["tbEscola.bairro"]);
                                $school->setCep($row["tbEscola.cep"]);
                                $school->setCidade($row["tbEscola.cidade"]);
                                $school->setEstado($row["tbEscola.idEstado"]);
                                $school->setLogradouro($row["tbEscola.logradouro"]);
                                $school->setNumero($row["tbEscola.idNumero"]);

                                $class->setEscola($school);
                                    
                                array_push($turmas,$class);

                                if($row == $lastElement){       
                                    $teacher = new Professor();                 
                                    $teacher->setIdProfessor($row["tbProfessor.idProfessor"]);
                                    $teacher->setUsuario($usuario);
                                    $teacher->setNome($row["tbProfessor.nome"]);
                                    $teacher->setRg($row["tbProfessor.rg"]);
                                    $teacher->setTurmas($class);
                                }
                                    
                                return $teacher;

                            }else{
                                $student = new Aluno();
                                $class = new Turma();
                                $school = new Escola();

                                $class->setIdTurma($row["tbTurma.idTurma"]);
                                $class->setDescricao($row["tbTurma.descricao"]);

                                $school->setIdEscola($row["tbEscola.idEscola"]);
                                $school->setBairro($row["tbEscola.bairro"]);
                                $school->setCep($row["tbEscola.cep"]);
                                $school->setCidade($row["tbEscola.cidade"]);
                                $school->setEstado($row["tbEscola.idEstado"]);
                                $school->setLogradouro($row["tbEscola.logradouro"]);
                                $school->setNumero($row["tbEscola.idNumero"]);

                                $class->setEscola($school);
                                    
                                $student->setIdAluno($row["tbAluno.idAluno"]);
                                $student->setUsuario($usuario);
                                $student->setNome($row["tbAluno.nome"]);
                                $student->setRa($row["tbAluno.ra"]);
                                $student->setTurma($class);

                                return $student;

                            }
                        }

                    } else {
                        return "Usuário ou senha incorretos!";
                    }

                }else {
                    return "Usuário ou senha incorretos!";
                }
                
            }catch(Exception $e){

                return "Erro ao efetuar login! Descrição do erro: " . $e;

            }finally{

                fecharConexao($conn);

            }

        }else{
            return "Selecione um tipo de usuário!";
        }
    }


?>