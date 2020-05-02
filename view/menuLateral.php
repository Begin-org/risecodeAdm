<html>
    <body>
    <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="imgs/LOGO-RISECODE-branco.png" class="logo-menu"/>
                </div>
    
                <ul class="list-unstyled components">
                    
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == "/risecode/view/pag-home.php" ? "active" : "");?>">
                        <a href="pag-home.php">
                            <i class="fas fa-home icons-menu"></i>
                            <br>Home
                        </a>
                           
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == "/risecode/view/pag-escolas.php" ? "active" : "");?>">
                        <a href="pag-escolas.php">
                            <i class="fas fa-school icons-menu"></i>
                            <br>Escolas
                        </a>
                    </li>
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == "/risecode/view/pag-professores.php" ? "active" : "");?>">
                        <a href="pag-professores.php">
                                <i class="fas fa-chalkboard-teacher icons-menu"></i>
                                <br>Professores
                        </a>
                    </li>
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == "/risecode/view/pag-alunos.php" ? "active" : "");?>">
                        <a href="pag-alunos.php">
                            <i class="fas fa-user-graduate icons-menu" ></i>
                            <br>Alunos
                        </a>
                    </li>
                    <li class="<?php echo ($_SERVER['PHP_SELF'] == "/risecode/view/pag-turmas.php" ? "active" : "");?>">
                        <a href="pag-turmas.php">
                                <i class="fas fa-users icons-menu"></i>
                                <br>Turmas
                        </a>
                    </li>
                    <li>
                        <a href="#pageSubmenu">
                            <i class="fas fa-chart-pie icons-menu"></i>
                            <br>Relatórios
                        </a>
                    </li>
                </ul>
                
            </nav>