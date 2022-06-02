<?php


session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] == '') {

  header('location:login.php');
}

$nosession = '';

include 'init.php';

$id_US = $_SESSION['id'];

?>

<div class='container-fluid'>
  <div class='row'>
    <div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
      <?php include $tmbl . 'ads.php'; ?>
    </div>
    <div class='col-xs-12 col-sm-12 col-md-9 col-lg-9'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
          <?php include $tmbl . 'search-control.php' ?>
        </div>
        <div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
          <?php include $tmbl . 'view-users.php' ?>
        </div>
        <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
          <?php include $tmbl . 'buttons.php' ?>
        </div>
      </div>

    </div>

  </div>
</div>

<?php

include $tmbl . 'footer.php';

?>