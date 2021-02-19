<?php 
@ob_start();
session_start();
include 'conexao.php';
include 'tratamentoSQLinjection.php';

try {

	$login = trata($_POST['login']);
	$senha = md5(trata($_POST['senha']));


	$sql = "
        SELECT
            *
        FROM
            LOGIN
        WHERE
            NOME    =   '$login'
        AND SENHA   =   '$senha'
    ";
    // 21232f297a57a5a743894a0e4a801fc3

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowCount() > 0) {

        header("Location: aluno.php");
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        // var_dump($login);
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header("Location: index.php");  
    }

} catch (PDOException $e) {
	
	echo $e->getMessage();

	// header("Location: aluno.php");
}