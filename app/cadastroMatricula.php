<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';
try {

	$idAluno = (int)trata($_POST['idAluno']);
	$idAluno = isset($idAluno) ? $idAluno : false;

	$idTurma = (int)trata($_POST['idTurma']);
	$idTurma = isset($idTurma) ? $idTurma : false;


	if (!$idTurma || !$idAluno) {

		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
		header("Location: matricula.php");
		exit;
	}

	// $sql = "
	// 	INSERT INTO Matricula(
	// 		aluno, 
	// 		fk_turma
	// 	) VALUES (
	// 	$idAluno, $idTurma);
	// ";

	$sql = "
		INSERT INTO Matricula (
			fk_turma,
			aluno,
		    disciplina,
		    ano,
		    semestre
 		) VALUES (
			$idTurma,
		    $idAluno,
		    (SELECT disciplina FROM Turma WHERE id = $idTurma),
		    (SELECT ano FROM Turma WHERE id = $idTurma),
		    (SELECT semestre FROM Turma WHERE id = $idTurma)
	 	)
 	";

	$conn->exec($sql);

	header("Location: matricula.php");
} catch (PDOException $e) {

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Aluno ou Turma Não Existe!'); </script>";

	header("Location: matricula.php");
}