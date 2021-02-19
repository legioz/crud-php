<?php 
include 'conexao.php';
session_start();
unset($_SESSION['login']);
unset($_SESSION['senha']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/main.css">
    <title>CRUD</title>

<script type="text/javascript">

    function dialog() {
        $("#modal").find("button.close").prop("disabled",true)
        $("#modal").find("button.close").toggle()
        $("#modal").modal({backdrop: 'static', keyboard: false})
        $("#modal").modal() 
    }
    window.onload = dialog;

</script>

</head>
<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container col-lg-4 ">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href=""></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br>
<br>

<div id="modal" class="modal fade"  >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
            </div>
            <div class="modal-body">
                <form class="was-validated" method="POST" action="ope.php" id="formlogin" name="formlogin" >
                   <div class="form-group">
                    <label>Usuário</label>
                    <input class="form-control" type="text" name="login" id="login" placeholder="Digite o Usuário" required>
                    <div class="invalid-feedback text-right">Informe um usuário válido!</div>
              </div>
              <div class="form-group">
                <label>Senha</label>
                <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required>
                <div class="invalid-feedback text-right">Informe a senha!</div>
                <div class="valid-feedback text-right ">Ok!</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-mg">Entrar</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript" src="funcoes/funcoes.js"></script>

<?php 
if($_SESSION['error'] == true){
  echo $_SESSION['message'];
}
$_SESSION['error'] = false;
?>

</body>
</html>
