<?php

session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] == '') {

  header('location:login.php');
}

$nosession = '';

include 'init.php';

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


          <div class='panel panel-default'>
            <div class='panel-heading'>
              <p>الاعضاء</p>
            </div>
            <div class='panel-body'>
              <?php

              $search_number = array();

              $fileList = glob('themes/img/*');

              for ($x = 0; $x < sizeof($fileList); $x++) {
                $reply = 0;
                for ($i = 0; $i < strlen($fileList[$x]); $i++) {
                  for ($num = 0; $num < 10; $num++) {
                    if ($fileList[$x][$i] == strval($num)) {
                      if ($reply == 0) {
                        $search_number[$x] = $fileList[$x][$i];
                      } else {
                        $search_number[$x] .= $fileList[$x][$i];
                      }
                      $reply++;
                    }
                  }
                }
              }

              $minAge = 17;
              $maxAge = 25;
              // $town = '%';
              // $status = '%';
              $search_name = "";
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $filter = $_POST['search-name'];
                for ($i = 0; $i < strlen($filter); $i++) {
                  if ($filter[$i] == "'") {
                    $search_name .= "";
                  } else {
                    $search_name .= $filter[$i];
                  }
                }
              }
              $stmt = $con->prepare("SELECT * FROM `users` WHERE f_name like '%$search_name%' ");
              $stmt->execute();
              $infos = $stmt->fetchAll();

              ?>
              <div class='row'>
                <?php foreach ($infos as $info) {  ?>
                  <div class='col-sm-4 col-md-4'>
                    <div class='thumbnail'>
                      <a href='profile.php?id=<?php echo $info["user_id"]; ?>'>
                        <img src="themes/img/<?php $range = 0;
                                              foreach ($search_number as $numbers) {
                                                if ($info["user_id"] == $numbers) {
                                                  echo $info["user_id"] . '.JPG';
                                                  $range++;
                                                }
                                              }
                                              if ($range == 0) {
                                                echo 'default.PNG';
                                              } ?>" alt='null' class='img-thumbnail image_view_users'>
                      </a>
                      <div class='caption'>
                        <h5 class='tex-center'><strong><?php echo $info['f_name'] . " " . $info['l_name'] ?></strong></h5>
                        <p class='tex-center'><span><?php echo $info['age'] ?></span> | <span><?php echo $info['town'] ?></span></p>
                        <p><a href="#" class="btn btn-info botton-users" role='button'><i class='fa fa-user-plus'></i></a>
                          <a href="#" style='border:1px solid #222' class="btn btn-default botton-users" role='Button'><i style='color:#222' class='fa fa-comment'></i></a>
                        </p>
                      </div>
                    </div>
                  </div>
                <?php  } ?>
              </div>
            </div>
          </div>


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