<?php
session_start();
if (isset($_SESSION['id_unik'])) {
  include_once "config.php";
  $keluar_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
  if (isset($keluar_id)) {
    $status = "Lagi Offline";
    $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$keluar_id}");
    if ($sql) {
      session_unset();
      session_destroy();
      header("location: ../login.php");
    }
  } else {
    header("location: ../login.php");
  }
} else {
  header("location: ../login.php");
}
