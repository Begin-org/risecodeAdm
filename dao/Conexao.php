<?php
    
    function abrirConexao(){
        
		try {
			$dbh = new PDO('mysql:host=localhost;dbname=bdrisecode', "root", "");
			$dbh->query("SET NAMES 'utf8'");
			$dbh->query("SET character_set_client=utf8");
			$dbh->query("SET character_set_results=utf8");
			return $dbh;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}

	}

	function fecharConexao($conn){
		$conn = null;
	}

?>