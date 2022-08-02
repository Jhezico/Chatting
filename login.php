<?php
session_start();
if (isset($_SESSION['id_unik'])) {
  header("location: user.php");
}
?>
<?php include_once "header.php"; ?>

<body>

  <div class="wrapper">
    <section class="form login">
      <header>App Chatting 2022</header>
      <form action="#">
        <div class="error-txt"></div>
        <div class="field input">
          <label>Alamat Email</label>
          <input type="text" name="email" placeholder="Masukkan Email Anda">
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Masukkan Password Anda">
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" value="Mulai Chatting">
        </div>
        <div class="link">Belum punya akun? <a href="index.php">Buat Sekarang</a></div>
      </form>
    </section>
  </div>

  <script src="js/hide-show-password.js"></script>
  <script src="js/login.js"></script>

</body>

</html>