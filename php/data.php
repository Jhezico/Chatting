<?php
while ($row = mysqli_fetch_assoc($sql)) {
  $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} 
  OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
  OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
  $query2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($query2);
  if (mysqli_num_rows($query2) > 0) {
    $result = $row2['msg'];
  } else {
    $result = "Tidak ada pesan masuk";
  }

  // Pemangkasan teks pada chat
  (strlen($result) > 22) ? $msg = substr($result, 0, 22) . '...' : $msg = $result;
  // Menambah pemberitahuan "Anda:" pada akun yang login
  if (isset($row2['outgoing_msg_id'])) {
    ($outgoing_id == $row2['outgoing_msg_id']) ? $anda = "Anda: " : $anda = "";
  } else {
    $anda = "";
  }
  ($row['status'] == "Lagi Offline") ? $offline = "offline" : $offline = "";

  $output .= '
  <a href="chat.php?user_id=' . $row['unique_id'] . '">
  <div class="content">
    <img src="php/img/' . $row['img'] . '" alt="">
    <div class="detail">
      <span>' . $row['fname'] . " " . $row['lname'] . '</span>
      <p>' . $anda . $msg . '</p>
    </div>
  </div>
  <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
</a>';
}
