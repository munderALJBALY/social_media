
<?php

header("Refresh:1; url=info.php");


session_start();
$Id_Chat = $_SESSION['message'];
$nosession = '';

include 'connect.php';

$id_US = $_SESSION['id'];


$stmt_00 = $con->prepare("SELECT * FROM `chat` WHERE id_user_send = $id_US OR id_user_recive = $id_US");

$stmt_00->execute();
$infos_00 = $stmt_00->fetchAll();


foreach ($infos_00 as $info_00) {

  if (($info_00['id_user_send'] == $Id_Chat && $info_00['id_user_recive'] == $id_US)) {
    echo "
    <div class='incoming_msg'>
    <div class='incoming_msg_img'>
    <img src='themes/img/";

    if (!file_exists('themes/img/' . $info_00['id_user_send'] . '.jpg')) {
      echo 'default.png';
    } else {
      echo $info_00['id_user_send'] . ".jpg'";
      $id_rec = $info_00['id_user_send'];
    }
    echo " alt='Avatar' class='right' /> </div> <div class='received_msg'><div class='received_withd_msg'>
     <p>" . $info_00['content_message'] . "</p>
     <span class='time_date'> " . $info_00['Date_chat'] . "</span></div></div></div>";
  } elseif (($info_00['id_user_send'] == $id_US && $info_00['id_user_recive'] == $Id_Chat)) {
    echo '
  <div class="outgoing_msg">
  <div class="sent_msg">';

    echo "
    <p>" . $info_00['content_message'] . "</p>
    <span class='time_date'>" . $info_00['Date_chat'] . "</span>
  </div>
  </div>
  ";
  }
}
?>