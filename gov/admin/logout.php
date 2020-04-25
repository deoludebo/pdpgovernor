<?php
  setcookie("u_id", "logout", time() - (60 * 60 * 24 * 7), "/");
  header("Location: ../index.php");
  exit();
?>
