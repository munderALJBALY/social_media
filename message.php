<?php


session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] == '') {

  header('location:login.php');
}

$nosession = '';

include 'init.php';

$id_US = $_SESSION['id'];

$stmt = $con->prepare("select * from users WHERE not user_id = $id_US ");

$stmt->execute();
$infos = $stmt->fetchAll();
foreach ($infos as $info) {


  $stmt_00 = $con->prepare("SELECT * FROM `chat` WHERE id_user_send = $info[user_id] AND id_user_recive = $id_US OR id_user_send = $id_US AND id_user_recive = $info[user_id] ");
  $stmt_00->execute();
  $infos_00 = $stmt_00->fetchAll();
  foreach ($infos_00 as $info_00) {
  }


?>

  <a class="link_message" href="chat.php?id_ch=<?php echo $info['user_id'] ?>">
    <div class="container">
      <div class='row'>
        <div class='col-lg-1 col-md-1 col-sm-1'></div>
        <div class='col-lg-10 col-md-10 col-sm-10'>
          <div class="container_0">
            <img src="themes/img/<?php
                                  if (!file_exists('themes/img/' . $info['user_id'] . '.jpg')) {
                                    echo 'default.png';
                                  } else {
                                    echo $info['user_id'] . '.jpg';
                                  } ?>" alt="Avatar">
            <p class='show_message'><?php if ($info_00['id_user_send'] == $id_US && $info_00['id_user_recive'] == $info['user_id']) {
                                      echo ' you: ' . $info_00['content_message'];
                                    } elseif ($info_00['id_user_send'] == $info['user_id'] && $info_00['id_user_recive'] == $id_US) {
                                      echo ' From: ' . $info_00['content_message'];
                                    } ?></p>
            <span class="time-right"><?php if (($info_00['id_user_send'] == $id_US && $info_00['id_user_recive'] == $info['user_id']) || ($info_00['id_user_send'] == $info['user_id'] && $info_00['id_user_recive'] == $id_US)) {
                                        echo $info_00['Date_chat'];
                                      } ?></span>
          </div>
        </div>
        <div class='col-lg-1 col-md-1 col-sm-1'></div>
      </div>
    </div>
  </a>
<?php


}

?>


<!-- INSERT INTO `chat` (`message_id`, `id_user_send`, `id_user_recive`, `Date_chat`, `content_message`) VALUES ('1', '1', '2', '2020-12-08', 'hello men , I\'m going to house see you here'); -->

<?php

include $tmbl . 'footer.php';

?>