<?php
session_start();
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    header('Location: index.php');
    exit();
}

$error = '';
if (isset($_GET['error'])) {
    $error = 'Invalid credentials!';
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Encuadres</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Sistema de Encuadres</span></div>
        <form action="auth.php" method="post">
          <div class="row">
            <i class="bx bx-envelope"></i>
            <input type="text" name="Correo" placeholder="Correo" required>
          </div>
          <div class="row">
            <i class="bx bx-lock"></i>
            <input type="password" name="Password" placeholder="Password" required>
          </div>
          <div class="pass"><a href="#">&iquest;Olvido su contrase&ntilde;a?</a></div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <?php if ($error) { echo '<p style="color: red;">' . $error . '</p>'; } ?>
        </form>
      </div>
    </div>

  </body>
</html>