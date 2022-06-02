<?php


session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] == '') {

  header('location:login.php');
}

$nosession = '';

include 'init.php';
$_SESSION['message'] = $_GET['id_ch'];
$id_US = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $Id_Chat = $_GET['id_ch'];
}

echo '
<div class="container">
<div class="messaging">
      <div class="inbox_msg" ">

      <div class="inbox_people x1">
      <div class="headind_srch">
      <div class="recent_heading">
        <h4>Friends</h4>
      </div>
      <div class="srch_bar">
        <div class="stylish-input-group">
          <input type="text" class="search-bar"  placeholder="Search" >
          <span class="input-group-addon">
          <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
          </span> </div>
      </div>
    </div>
    <div class="inbox_chat">
';


$stmtout = $con->prepare("select * from users WHERE not user_id = $id_US ");

$stmtout->execute();
$outfos = $stmtout->fetchAll();
foreach ($outfos as $outfo) {


  $stmtout_00 = $con->prepare("SELECT * FROM `chat` WHERE id_user_send = $outfo[user_id] AND id_user_recive = $id_US OR id_user_send = $id_US AND id_user_recive = $outfo[user_id] ");
  $stmtout_00->execute();
  $outfos_00 = $stmtout_00->fetchAll();
  foreach ($outfos_00 as $outfo_00) {
  }

?>

  <a href="chat.php?id_ch=<?php echo $outfo['user_id'] ?>">

    <div class="chat_list">
      <div class="chat_people">
        <div class="chat_img">
          <img class="circle_img" src="themes/img/<?php
                                                  if (!file_exists('themes/img/' . $outfo['user_id'] . '.jpg')) {
                                                    echo 'default.png';
                                                  } else {
                                                    echo $outfo['user_id'] . '.jpg';
                                                  } ?>" alt="Avatar">
        </div>
        <div class="chat_ib">
          <?php if (($outfo_00['id_user_send'] == $id_US && $outfo_00['id_user_recive'] == $outfo['user_id']) || ($outfo_00['id_user_send'] == $outfo['user_id'] && $outfo_00['id_user_recive'] == $id_US)) {
            echo '<h5><span class="chat_date">' . $outfo_00['Date_chat'] . '</span></h5>';
          } ?>
          <?php if ($outfo_00['id_user_send'] == $id_US && $outfo_00['id_user_recive'] == $outfo['user_id']) {
            echo "<p> you: " . $outfo_00['content_message'] . "</p>";
          } elseif ($outfo_00['id_user_send'] == $outfo['user_id'] && $outfo_00['id_user_recive'] == $id_US) {
            echo "<p> From: " . $outfo_00['content_message'] . "</p>";
          } ?>

        </div>
      </div>
    </div>
  </a>
<?php
}
echo "</div></div>";
?>

<?php

echo '
  <div class="mesgs" style="position:relative">
<div class="msg_history" >';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Id_Chat = $_GET['id_ch'];
  $id_send = $id_US;
  $id_recive = $Id_Chat;
  $message = $_POST['message'];

  $stmt_01 = $con->prepare("INSERT chat SET id_user_send = ? , id_user_recive = ?, Date_chat = now(), content_message = ? ");
  $stmt_01->execute(array($id_send, $id_recive, $message));
}

$stmt = $con->prepare("select * from users where user_id = $id_US");
$stmt->execute();
$infos = $stmt->fetchAll();
foreach ($infos as $info) {
}
?>

<div id="btn"></div>

<?php
echo "
       <form method='POST' action='chat.php?id_ch=$Id_Chat'>
       <div class='type_msg' style='position:absolute;top:85%;width:90%;background-color:white;border:1px solid gray;border-radius:10px;'>
       <div class='input_msg_write'>
         <input type='text' name='message' class='write_msg' placeholder='Type a message' />
         <button class='msg_send_btn' style='margin:0 6px 8px 0;' type='submit'><i class='fa fa-sms' aria-hidden='true'></i></button>
       </div>
       </form>
  ";
?>

</div>
</div>
</div>
</div>

<script>
  function loadData() {
    var http = new XMLHttpRequest();
    http.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var tx = http.responseText;
        document.getElementById("btn").innerHTML = tx;
      };
    };
    http.open('GET', 'chat-ajax.php', true);
    http.send();
  };
  setInterval(function() {
    loadData()
  }, 500);
</script>

<?php

include $tmbl . 'footer.php';

?>