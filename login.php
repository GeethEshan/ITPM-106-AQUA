<?php
session_start();

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  require_once "database.php";
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($user) {
    if (password_verify($password, $user["password"])) {
      session_start();
      $_SESSION["user"] = "yes";
      header("Location: index.php");
      die();
    } else {
      echo "<div class='alert alert-danger'>Password does not match</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Email does not match</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <img src="images/login.jpg" alt="Login Image" class="img-fluid mx-auto d-block" style="width:100%">
          </div>
          <div class="col-md-6">
            <h1 class="text-center text-md-right">Login</h1>
            <form action="login.php" method="post">
              <div class="form-group mt-4">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control form-control-lg">
              </div>
              <div class="form-group mt-4">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control form-control-lg">
              </div>
              <div class="form-btn mt-4 text-center text-md-right">
                <input type="submit" value="Login" name="login" class="btn btn-primary btn-lg btn-block">
              </div>
            </form>
            <div class="text-center">
              <a href="registration.php">Not registered yet? Register here</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>