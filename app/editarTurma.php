<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';

try {
	
	$turma = trata($_POST['turma_']);
	$turma = isset($turma) ? $turma : false;
	
	$ano = is_int((int)$_POST['ano_']) ? trataNum($_POST['ano_']) : false;
	
	$semestre = is_int((int)$_POST['semestre_']) ? trataNum($_POST['semestre_']) :false;

	$curso = trata($_POST['curso_']);
	$curso = isset($curso) ? $curso : false;

	$disciplina = trata($_POST['disciplina_']);
	$disciplina = isset($disciplina) ? $disciplina : false;

	$docente = is_int((int)$_POST['matriculaDocente_']) ? trataNum($_POST['matriculaDocente_']) : false;

	$id = $_POST['id_editavel'];

	// var_dump($turma,$ano,$semestre,$curso,$disciplina,$docente,$id); exit;

	if (!$ano || !$turma || !$semestre || !$curso || !$disciplina || !$docente) {
		
		$_SESSION['error'] = true;
		$_SESSION['message'] = " <script> alert('Dados Invalidos'); </script>";
		header("Location: turma.php");
		exit;
	}

	
	$sql = "
	UPDATE Turma
	SET 
		turma='$turma', 
		ano=$ano, 
		semestre=$semestre, 
		curso='$curso', 
		disciplina='$disciplina',
		matriculaDocente=$docente
	WHERE id = $id
	";
	
	$conn->exec($sql);

	try {
		$sql2 = "
			UPDATE Matricula
			SET
				disciplina = (SELECT disciplina FROM Turma WHERE id = 11),
				ano = (SELECT ano FROM Turma WHERE id = 11),
				semestre = (SELECT semestre FROM Turma WHERE id = 11)
			WHERE fk_turma = $id;
		";

		$conn->exec($sql2);
	} finally {

		header("Location: turma.php");
	}

} catch (PDOException $e) {

	$_SESSION['error'] = true;
	$_SESSION['message'] = " <script> alert('Dados inválidos!'); </script>";
	header("Location: turma.php");
}