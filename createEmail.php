<?php

session_start();

$nonav = '';

$nosession = '';

include('init.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){


$f_name =  $_POST['f-name'];
$l_name =  $_POST['l-name'];
$email =  $_POST['email'];
$town =  $_POST['town'];
$age =  $_POST['age'];
$pass =  $_POST['pass'];
$status =  $_POST['status'];

$stmt = $con->prepare("select * from users");
$stmt -> execute();
$infos = $stmt->fetchAll();

foreach($_POST as $pos){
    if($pos == ''){
      $NotNull = true;
      ////ادا كان هناك واحد من الدخلات غير معبأ ينبه المستخدم لكي يملأه
     }
}

foreach($infos as $info){

if( $info['email'] == $email || $info['f_name'] == $f_name ){$run = true;// ادا كان الايميل او لاسم موجود ينبه المستخدم
}
}

if(!isset($NotNull)){
if(!isset($run)){
$stmt_0 = $con -> prepare('INSERT users SET f_name = ? , l_name = ? , email = ? , pass = ? , town = ? , age = ? , status = ? , Date_Join = now()' );

$stmt_0 -> execute(Array($f_name,$l_name,$email,$pass,$town,$age,$status));

$stmt_1 = $con->prepare("select * from users");
$stmt_1 -> execute();
$infos_1 = $stmt_1 -> fetchAll();

foreach($infos_1 as $info_1){};

if(count($infos_1) > 0){
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $info_1['user_id'];
    $_SESSION['f_name'] = $f_name;
    $_SESSION['l_name'] = $l_name;
    header('location:index.php');
};

}else{
  echo '<script> alert("اسم المستخدم أو الايميل موجود في قاعدة البيانات") </script>';
}
}else{
  echo '<script> alert("ارجوا ملئ جميع الفراغات") </script>';
}

}

?>
<div class='container-fluid'>
    <div class='row'>
    <div class='col-md-2'></div>
        <div class='col-sm-12 col-md-8'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                  <p>تعديل البيانات الشخصية</p>
            </div>
            <div class='panel-body'>
              <form class='form-horizontal' action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
                  <div class='form-group margin-UD row'>
                  <label class='col-sm-4'>الأسم الأول</label>
                  <div class=' col-sm-8'><input class='form-control' name='f-name' value='' type="text" placeholder=''></div>
                </div>
                <div class='form-group margin-UD row'>
                  <label class='col-sm-4'>الأسم التاني</label>
                  <div class=' col-sm-8'><input class='form-control' name='l-name' value='' type="text" placeholder=''></div>
                </div>
                <div class='form-group margin-UD row'>
                  <label class='col-sm-4'>البريد الاكتروني</label>
                  <div class=' col-sm-8'><input class='form-control' name='email' value='' type="text" placeholder=''></div>
                </div>
                <div class='form-group margin-UD row'>
                  <label class='col-sm-4'>كلمة المرور</label>
                  <div class=' col-sm-8'><input class='form-control' name='pass' value='' type="text" placeholder=''></div>
                </div>
                <div class='form-group margin-UD row'>
                  <label class='col-sm-4'>المدينة</label>
                  <div class=' col-sm-8'><select class='form-control' name='town' >

                    <?php
                    $townArr = Array('طرابلس','مصراته','الخمس','بنغازي','زليطن');
                     echo "<option value='$townArr[0]'>$townArr[0]</option>";
                      for($i = 0;$i <= count($townArr) ;$i++){

                          echo " <option value='$townArr[$i]'>$townArr[$i]</option>";

                           }
                    ?>

                  </select>
                </div>
                </div>

                 <div class='form-group margin-UD row'>
                  <label class='col-sm-4'>العمر</label>
                  <div class=' col-sm-8'><input class='form-control' name='age' value='' type="text" placeholder=''></div>
                </div>

                <div class='form-group margin-UD row'>
                  <label class='col-sm-4'>الحالة الاجتماعية</label>
                  <div class=' col-sm-8'><select class='form-control' name='status' >
                  <?php
                    $statusArr = Array('اعزب','مخطوب','متزوج');
                     echo "<option value='$statusArr[0]'>$statusArr[0]</option>";
                      for($i = 0;$i <= count($statusArr);$i++){

                          echo " <option value='$statusArr[$i]'>$statusArr[$i]</option>";

                           }
                    ?>
                  </select>
                </div>
                </div>
                <div class='form-group margin-UD row'>
                    <div class=' col-sm-4'></div>
                  <div class='col-sm-8'><button class='form-control btn btn-primary' type='submit'>حفظ</button></div>
                </div>
              </form>
              <a href='login.php' class='createEmail'><p>الانتقال الى صفحة تسجيل الدخول</p></a>

            </div>
        </div>
        </div>
    </div>
</div>

<?php

include $tmbl . 'footer.php';

?>