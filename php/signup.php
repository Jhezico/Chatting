<?php
session_start();
include_once "config.php";
$namaDepan = mysqli_real_escape_string($conn, $_POST['namaDepan']);
$namaBelakang = mysqli_real_escape_string($conn, $_POST['namaBelakang']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($namaDepan) && !empty($namaBelakang) && !empty($email) && !empty($password)) {
  // Check Email User 
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Jika email Benar
    $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}' ");
    if (mysqli_num_rows($sql) > 0) {
      // Email sudah pernah digunakan
      echo "$email - email tersebut sudah digunakan !";
    } else {
      if (isset($_FILES['gambar'])) {
        $nama_gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        $img_explode = explode('.', $nama_gambar);
        $img_ext = end($img_explode);

        $extensions = ['png', 'jpeg', 'jpg'];
        if (in_array($img_ext, $extensions) === true) {
          $time = time(); //Membuat nama unik pada nama gambar dengan waktu
          $nama_baru_gambar = $time . $nama_gambar;

          // Jika user berhasil upload foto
          if (move_uploaded_file($tmp_name, "img/" . $nama_baru_gambar)) {
            $status = "Lagi Online"; //Status user
            $random_id = rand(time(), 10000000); //Random Id untuk user

            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                VALUES ({$random_id}, '{$namaDepan}', '{$namaBelakang}', '{$email}', '{$password}', '{$nama_baru_gambar}', '{$status}')");
            if ($sql2) {
              $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
              if (mysqli_num_rows($sql3) > 0) {
                $row = mysqli_fetch_assoc($sql3);
                $_SESSION['id_unik'] = $row['unique_id'];
                echo "sukses";
              }
            } else {
              echo "Ada yang salah Broo !";
            }
          }
        } else {
          echo "Silahkan pilih gambar bertipe - jpeg, jpg, png !";
        }
      } else {
        echo "Silahkan pilih gambar untuk foto profil !";
      }
    }
  } else {
    // Jika email Salah
    echo "$email - Email tersebut salah !";
  }
} else {
  echo "Ada Data yang kosong Broo !";
}
