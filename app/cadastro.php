<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';
	// +++++++++++++++++++++++++ CADASTRO DOCENTE +++++++++++++++++++++++++++++++++++++
	try {
		
		$nomeCompletoDocente = trata($_POST['nomeCompletoDocente']);
		$nomeCompletoDocente = isset($nomeCompletoDocente) ? $nomeCompletoDocente : false;

		if (!$nomeCompletoDocente) {
			
			$_SESSION['error'] = true;
			$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
			header("Location: docente.php");
			exit;
			
		}
		$sql = "
				INSERT INTO Docente(
					nomeCompleto
				) VALUES (
					:nomeCompletoDocente
				)
			";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':nomeCompletoDocente', $nomeCompletoDocente, PDO::PARAM_STR);
		$stmt->execute();
		header("Location: docente.php");
		

	} catch(PDOException $e) {

		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('Dados Invalidos!'); </script>";
		header("Location: docente.php");
	}


   