<?php

$view_num = 0;

$id = $_SESSION['id'];
$stmt = $con->prepare("select * from users where user_id = $id");
$stmt -> execute();
$infos = $stmt->fetchAll();
foreach($infos as $info){}


$stmt_00 = $con->prepare("SELECT * FROM `chat` WHERE id_user_recive = $id AND view = 0 ");
$stmt_00 -> execute();
$infos_00 = $stmt_00->fetchAll();
foreach( $infos_00 as $info_00){ if($info_00['view'] == 0 ){ $view_num = $view_num + 1; } }


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
   <div class='center'>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   </div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active borderX size">
        <a class="nav-link" href="index.php"><i class='fa fa-home nav-home'></i>
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="message.php">
          <i class='fa fa-sms nav-sms'></i>
          <span class="num_view_mess" id="num_view_mess"><?php echo $view_num; ?></span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <img src="themes/img/<?php
if(!file_exists('themes/img/'.$info['user_id'].'.jpg')){
    echo 'default.png';
}else{
    echo $info['user_id'].'.jpg';
}?>" class='nav-img'>
        <a class="nav-link dropdown-toggle nav-name" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="size"><b><?php echo $info['l_name'];?></b></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="edit.php"><i class='fa fa-edit'></i><span style='padding:0 26px'>تعديل الحساب</span></a>
          <a class="dropdown-item" href="profile.php?id=<?php  echo $id; ?>"><i class='fa fa-user'></i><span style='padding:0 20px'>الصفحة الشخصية</span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><i class='fa fa-user'></i><span style='padding:0 30px'>تسجيل الخروج</span></a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search-name.php" method="POST">
      <input class="form-control mr-sm-2" placeholder="البحت" aria-label="Search" name='search-name'>
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
</nav>
</nav>

