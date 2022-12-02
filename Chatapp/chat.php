<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include "header.php"; ?>
<style>
  .btn1 {
    padding: 5px 30px;
    border: 2px solid #16a085;
    border-radius: .5rem;
    color: #16a085 !important;
    margin-left: 80px;

  }

  .btn1:hover {

    background-color: #16a085;

    color: #ffffff !important;
  }

  .btn2 {
    /* padding: 5px 30px; */
    border: 2px solid #16a085 !important;
    border-radius: .5rem;
    color: #16a085 !important;
    background: none !important;
    text-align: center;


  }

  .btn2:hover {

    background-color: #16a085 !important;
    color: #ffffff !important;

  }
</style>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
        <a href="chat.php" name="delete" class="btn1" <?php $truncate = mysqli_query($conn, "TRUNCATE TABLE messages");
                                                      ?>>Delete</a>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button class="btn2"><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <?php
  include_once "php/config.php";


  ?>
  <script src="javascript/chat.js"></script>

</body>

</html>