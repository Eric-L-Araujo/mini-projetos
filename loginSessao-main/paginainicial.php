
<?php 
include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Você logou!</title>
</head>
<body>
  <h1>Você logou na página com sucesso! Seu id de usuário é: <?php echo $_SESSION['id']; ?></h1>
  <br>
  <a href="logout.php">Sair</a>
</body>
</html>