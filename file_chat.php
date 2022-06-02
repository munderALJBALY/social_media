<?php

// header("Refresh: 6");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
  $Id_Chat = $_GET['id_ch'];
}

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Id_Chat = $_GET['id_ch'];
    $id_send = $id_US;
    $id_recive = $Id_Chat;
    $message = $_POST['message'];

    $stmt_01 = $con->prepare( "INSERT chat SET id_user_send = ? , id_user_recive = ?, Date_chat = now(), content_message = ? ");
    $stmt_01->execute(array($id_send , $id_recive , $message));

   }

  // $stmt = $con->prepare("select * from users where user_id = $id_US");
  // $stmt -> execute();
  // $infos = $stmt->fetchAll();
  // foreach( $infos as $info){ }

  // $stmt_00 = $con->prepare("SELECT * FROM `chat` WHERE id_user_send = $id_US OR id_user_recive = $id_US");


  // $stmt_00 -> execute();
  // $infos_00 = $stmt_00->fetchAll();
  // foreach( $infos_00 as $info_00){}

      ?>
