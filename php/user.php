<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['id_unik'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
$output = "";
if (mysqli_num_rows($sql) == 1) {
  $output .= "Kosong? Belum ada teman?";
} else if (mysqli_num_rows($sql) > 0) {
  include "data.php";
}
echo $output;
