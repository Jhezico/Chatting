<?php
session_start();
if (!isset($_SESSION['id_unik'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <?php
        include_once("php/config.php");
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['id_unik']}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <div class="content">
          <img src="php/img/<?php echo $row['img'] ?>" alt="">
          <div class="detail">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p><?php echo $row['status'] ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="keluar">Keluar</a>
      </header>
      <div class="search">
        <span class="text">Pilih teman Chatting Mu</span>
        <input type="text" placeholder="Masukkan nama orang yang kamu cari..">
        <button class="btn-search"><i class="fas fa-search"></i></button>
      </div>
      <div class="user-list">

      </div>
    </section>
  </div>

  <script src="js/user.js"></script>

</body>

</html>