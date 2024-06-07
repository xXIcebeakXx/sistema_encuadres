<?php
session_start();
include 'conectar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<div class="container">
      <div class="wrapper">
        <div class="title"><span>Sistema de Encuadres</span></div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="row">
            <i class="bx bx-envelope"></i>
            <input type="text" name = "usuario" placeholder="Correo" required>
          </div>
          <div class="row">
            <i class="bx bx-lock"></i>
            <input type="password" name = "password" placeholder="Password" required>
          </div>
          <div class="pass"><a href="#">&iquest;Olvido su contrase&ntilde;a?</a></div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
        </form>
      </div>
    </div>
</body>
</html>


<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['usuario'];	
        $password = $_POST['password'];

        $stmt = $conn->prepare('SELECT * FROM usuarios WHERE usuario=? AND password=? LIMIT 1');
        $stmt->execute(array($username, $password));
        $checkuser = $stmt->rowCount();
        $user = $stmt->fetch();
        if($checkuser >0){
            $_SESSION['user'] = $user['usuario'];
            $_SESSION['rol'] = $user['rol'];
            header('location: index.php');
        }
    }

?>