<?php
  if (isset($_POST["username"]) && isset($_POST["password"])) {
    include '../php/config.php';
    ini_set('display_errors', 1);
    $conn = new mysqli($servername, $username, $password, $db_name);

    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $login_username, $login_password);
    $stmt->execute();
    if ($stmt -> get_result() -> num_rows > 0)
    {
      $id = uniqid();

      $stmt = $conn->prepare("DELETE FROM login_session WHERE username = ?");
      $stmt->bind_param("s", $login_username);
      $stmt->execute();

      $stmt = $conn->prepare("INSERT INTO login_session (login_id, username) VALUES (?, ?)");
      $stmt->bind_param("is", $id, $login_username);
      $stmt->execute();

      setcookie("u_id", $id, time() + (60 * 60 * 24), "/");
      echo "<script>window.location='index.php';</script>";
      exit;
    }
    $conn->close();
  }

  if (isset($_COOKIE["u_id"])) {
    echo "<script>window.location='index.php';</script>";
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
  <div class="bg-primary">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12">
          <div class="d-flex align-items-center min-vh-100">
            <div class="w-100 d-block bg-white shadow-lg rounded my-5">
              <div class="p-5">
                <div class="text-center">
                  <a href="../" class="d-block mb-5">
                    <img style="max-width: 100%" src="../assets/img/pdp.png" alt="logo" />
                  </a>
                </div>
                <h1 class="h5 mb-1">Welcome Back!</h1>
                <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                <form class="user" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                  </div>
                  <button type="submit" class="btn btn-success btn-block waves-effect waves-light"> Log In </button>
                </form>
                <!-- end row -->
              </div> <!-- end .padding-5 -->
            </div> <!-- end .w-100 -->
          </div> <!-- end .d-flex -->
        </div> <!-- end col-->
      </div> <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end page -->

  <!-- jQuery  -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/metismenu.min.js"></script>
  <script src="assets/js/simplebar.min.js"></script>

  <!-- App js -->
  <script src="assets/js/theme.js"></script>

</body>
</html>
