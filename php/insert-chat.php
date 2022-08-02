<?php
session_start();
if (isset($_SESSION['id_unik'])) {
  include_once "config.php";
  $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
  $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
  $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

  echo $pesan;

  if (!empty($pesan)) {
    $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ({$incoming_id}, '{$outgoing_id}', '{$pesan}')") or die();
  }
} else {
  header("location: ../login.php");
}
