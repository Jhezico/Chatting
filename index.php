<?php
session_start();
if (isset($_SESSION['id_unik'])) {
  header("location: user.php");
}
?>
<?php include_once "header.php"; ?>

<body>

  <div class="wrapper">
    <section class="form signup">
      <header>App Chatting 2022</header>
      <form action="#" enctype="multipart/form-data">
        <div class="error-txt">Pesan Anda error Broo !</div>
        <div class="name-details">
          <div class="field input">
            <label>Nama Depan</label>
            <input type="text" name="namaDepan" placeholder="Nama Depan" required>
          </div>
          <div class="field input">
            <label>Nama Belakang</label>
            <input type="text" name="namaBelakang" placeholder="Nama Belakang" required>
          </div>
        </div>
        <div class="field input">
          <label>Alamat Email</label>
          <input type="text" name="email" placeholder="Masukkan Email Anda" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Buat password baru" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Buat Foto Profil</label>
          <input type="file" name="gambar" required>
        </div>
        <div class="field button">
          <input type="submit" value="Mulai Chatting">
        </div>
        <div class="link">Sudah punya akun? <a href="login.php">Login Sekarang</a></div>
      </form>
    </section>
  </div>

  <script src="js/hide-show-password.js"></script>
  <script src="js/signup.js"></script>

</body>

</html>