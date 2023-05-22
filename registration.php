<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                header("Location: login.php");
            }else{
                die("Something went wrong");
            }
           }
        }
        ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="images/login.jpg" alt="Registration Image" class="img-fluid mx-auto d-block" style="width:100%">
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-center text-md-left">Register</h1>
                        <form action="registration.php" method="post">
                            <div class="form-group mt-4">
                                <input type="text
" placeholder="Full Name:" name="fullname" class="form-control form-control-lg">
                            </div>
                            <div class="form-group mt-4">
                                <input type="email" placeholder="Email:" name="email" class="form-control form-control-lg">
                            </div>
                            <div class="form-group mt-4">
                                <input type="password" placeholder="Password:" name="password" class="form-control form-control-lg">
                            </div>
                            <div class="form-group mt-4">
                                <input type="password" placeholder="Repeat Password:" name="repeat_password" class="form-control form-control-lg">
                            </div>
                            <div class="form-btn mt-4 text-center text-md-left">
                                <input type="submit" value="Register" name="submit" class="btn btn-primary btn-lg btn-block">
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="login.php">Already Registered? Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>