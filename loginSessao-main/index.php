<?php include('conexao.php');

if (isset($_POST['email']) and isset($_POST['pass'])) {
  if(strlen($_POST['email']) == 0) {
    echo 'Preencha seu e-mail';
  } else if (strlen($_POST['pass']) == 0){
    echo 'Preencha sua senha';
  } else {
    $email = $mysqli->real_escape_string($_POST['email']);
    $pass = $mysqli->real_escape_string($_POST['pass']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$pass'";
    $sql_query = $mysqli->query($sql_code) or die('Falha na execução do código SQL:' . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) {
      
      $usuario = $sql_query->fetch_assoc();
      // echo "Você foi logado!";

      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];
      header('Location: paginainicial.php');

    } else {
      echo "Email ou senha incorretos!";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faça login</title>
</head>
<body>
   <form action="#" method="POST" autocomplete="on">
      <h1>Acesse sua conta</h1>
      <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </p>
      <p>
        <label for="pass">Senha</label>
        <input type="password" name="pass" id="pass">
      </p>
      <p>
        <button type="submit">
          Enviar
        </button>
      </p>
   </form>
</body>
</html>