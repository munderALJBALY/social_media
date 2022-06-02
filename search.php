<?php

session_start();

if(!isset($_SESSION['email']) || $_SESSION['email'] == ''){

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

$minAge = 17;
$maxAge = 25;
$town ='%';
$status ='%';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $minAge = $_POST['minAge'];
    $maxAge = $_POST['maxAge'];
    $town = $_POST['town'];
    $status = $_POST['status'];

  }

  $stmt = $con->prepare("select * from users where age >= $minAge AND age <= $maxAge AND town like '$town' AND status like '$status' ");

  $stmt -> execute();
  $infos = $stmt->fetchAll();

?>
               <div class='row'>
<?php foreach($infos as $info){  ?>
                   <div class='col-sm-4 col-md-4'>
                       <div class='thumbnail'>
                       <a href='profile.php?id=<?php  echo $info["user_id"]; ?>'>
                          <img class="image_view_users" src="themes/img/<?php

if(!file_exists('themes/img/'.$info['user_id'].'.jpg')){
    echo 'default.png';
}else{
    echo $info['user_id'].'.jpg';
}
 ?>" alt='null' class='img-thumbnail'>
                       </a>
                          <div class='caption'>
                               <h5 class='tex-center'><strong><?php echo $info['f_name']." ".$info['l_name'] ?></strong></h5>
                               <p class='tex-center'><span><?php echo $info['age'] ?></span> | <span><?php echo $info['town'] ?></span></p>
                               <p><a href="#" class="btn btn-info botton-users" role='button'><i class='fa fa-user-plus'></i></a>
                               <a href="#" style='border:1px solid #222' class="btn btn-default botton-users" role='Button'><i style='color:#222' class='fa fa-comment'></i></a></p>
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