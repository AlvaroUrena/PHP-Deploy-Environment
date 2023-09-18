<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/normalize.css" type="text/css">
  <link rel="stylesheet" href="css/global.css" type="text/css">
  <link rel="stylesheet" href="css/login.css" type="text/css">
</head>

<body>
  <?php
  include('components/header.php');
  ?>
  <main>
    <h1>Login</h1>
    <form method="post" action="includes/loginSystem.php">
      <label for="username">Usuario:</label>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required><br>
      <button type="submit">Iniciar sesión</button>
    </form>
    <?php if (isset($error)) {
      echo "<p>$error</p>";
    } ?>
  </main>
  <?php
  include('components/footer.php');
  ?>
</body>

</html>