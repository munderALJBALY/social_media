<?php



session_start();



if(!isset($_SESSION['email']) || $_SESSION['email'] == ''){

    header('location:login.php');
}

$nosession = '';

include 'init.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id_US = $_GET['id'];

  }



  $stmt = $con->prepare("select * from users where user_id = $id_US");

  $stmt -> execute();
  $infos = $stmt->fetchAll();
  foreach( $infos as $info){ }


?>

<div class='container-fluid'>
<div class='row'>
<div class='col-xs-12 col-sm-12 col-md-7 col-lg-8'>
<div class='panel panel-default'>
    <div class='panel-heading'>
        <p>المنشورات</p>
    </div>
    <div class='panel-body'>

    </div>
</div>
</div>

<div class='marginZero col-xs-12 col-sm-12 col-md-5 col-lg-4'>

<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
<div class='panel panel-default'>
    <div class='panel-heading'>
        <p>الصورة الشخصية</i></p>
    </div>
    <div class='panel-body'>
    <img class='img-responsive img-thumbnail' src="themes/img/<?php

    if(!file_exists('themes/img/'.$info['user_id'].'.jpg')){
        echo 'default.png';
    }else{
        echo $info['user_id'].'.jpg';
    };
     ?>" alt="">
    </div>
<?php
if($id_US == $_SESSION['id']){
   echo "<a href='upload-avatar.php' class='profile-p' ><p>تحميل صورة شخصية <i class='fa fa-upload'></i></p></a>";
};
?>
</div>
</div>
<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
<div class='panel panel-default'>
    <div class='panel-heading'>
        <p>معرض الصور  <?php
      if($id_US == $_SESSION['id']){
      echo "<a href='upload-avatar.php' class='profile-M' ><i class='fa fa-camera'></i></a>";
      };
    ?></p>

    </div>
    <div class='panel-body'>
        <div class='col-sm-12'>
        <div class='row'>
            <a href='view_pic.php?id=<?php echo  $id_US; ?>'>
        <?php
           $stmt_3 = $con->prepare("select * from picture where user_id = $id_US order by id_picture limit 4");
           $stmt_3 -> execute();
           $outpictures = $stmt_3 -> fetchAll();
           foreach( $outpictures as $outpicture){
             if($outpicture['user_id'] == $id_US){ echo "<img class='col-sm-6 pic' src='upload/avatar/".$outpicture['num_pic'].".jpg"."' alt='' />"; }else{ echo 'default.png'."' alt='' />"; };
        }
        ?>
            </a>
       </div>
       </div>
    </div>
</div>
</div>
<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
<div class='panel panel-default info'>
    <div class='panel-heading'>
        <p>المعلومات الشخصية</p>
    </div>
    <div class='panel-body'>
    <ul class='list-unstyled'>
        <li><b><?php echo $info['f_name']; ?></b><i class='fa fa-user'></i></li>
        <li><b><?php echo $info['age']; ?></b><span> | العمر</span></li>
        <li><b><?php echo $info['town']; ?></b><span> | المدينة</span></li>
        <li><b><?php echo $info['status']; ?></b><span> | الحالة الاجتماعية</span></li>
    </ul>
    </div>
</div>
</div>

</div>
</div>
</div>





<?php

include $tmbl . 'footer.php';

?>