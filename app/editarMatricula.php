<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';


try {

$idAluno = trata($_POST['raAluno']);

$idTurma = trata($_POST['idTurma']);

$idMatricula  = $_POST['id_editavel'];
$idMatricula = (int) $idMatricula;

// var_dump($idAluno,$idMatricula,$idTurma); exit;

$sql = "
	UPDATE Matricula
	SET 
		fk_turma = $idTurma,
	    aluno = $idAluno,
	    disciplina = (SELECT disciplina FROM Turma WHERE id = $idTurma),
	    ano = (SELECT ano FROM Turma WHERE id = $idTurma),
	    semestre = (SELECT semestre FROM Turma WHERE id = $idTurma)
	WHERE id = $idMatricula
";

$conn->exec($sql);

header("Location: matricula.php");

} catch (PDOException $e) {

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Dados Inválidos'); </script>";

	header("Location: matricula.php");
}