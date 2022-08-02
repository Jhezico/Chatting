<?php
session_start();
if (!isset($_SESSION['id_unik'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>

  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        include_once("php/config.php");
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/img/<?php echo $row['img'] ?>" alt="">
        <div class="detail">
          <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
          <p><?php echo $row['status'] ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="area-ketikan" autocomplete="off">
        <input type="text" name="outgoing_id" value="<?php echo $_SESSION['id_unik']; ?>" hidden>
        <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="pesan" class="input-field" placeholder="Masukkan pesan disini Broo !">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="js/chat.js"></script>

</body>

</html>