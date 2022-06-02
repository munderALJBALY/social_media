<?php

session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] == '') {

  header('location:login.php');
}

$nosession = '';

include('init.php');

$id = $_SESSION['id'];

// $stmt = $con->prepare("select * from users where user_id = $id");
// $stmt -> execute();
// $infos = $stmt->fetchAll();
// foreach($infos as $info){}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $f_name =  $_POST['f-name'];
  $l_name =  $_POST['l-name'];
  $email =  $_POST['email'];
  $town =  $_POST['town'];
  $age =  $_POST['age'];
  $pass =  $_POST['pass'];
  $status =  $_POST['status'];

  $stmt = $con->prepare('UPDATE users SET f_name = ? , l_name = ? , email = ? , pass = ? , town = ? , age = ? , status = ?  WHERE user_id = ?');

  $stmt->execute(array($f_name, $l_name, $email, $pass, $town, $age, $status, $id));
}

$stmt = $con->prepare("select * from users where user_id = $id");
$stmt->execute();
$infos = $stmt->fetchAll();
foreach ($infos as $info) {
};

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
          <form class='form-horizontal' action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>
            <div class='form-group margin-UD row'>
              <label class='col-sm-4'>الأسم الأول</label>
              <div class=' col-sm-8'><input class='form-control' name='f-name' value='<?php echo $info['f_name']; ?>' type="text" placeholder=''></div>
            </div>
            <div class='form-group margin-UD row'>
              <label class='col-sm-4'>الأسم التاني</label>
              <div class=' col-sm-8'><input class='form-control' name='l-name' value='<?php echo $info['l_name']; ?>' type="text" placeholder=''></div>
            </div>
            <div class='form-group margin-UD row'>
              <label class='col-sm-4'>البريد الاكتروني</label>
              <div class=' col-sm-8'><input class='form-control' name='email' value='<?php echo $info['email']; ?>' type="text" placeholder=''></div>
            </div>
            <div class='form-group margin-UD row'>
              <label class='col-sm-4'>كلمة المرور</label>
              <div class=' col-sm-8'><input class='form-control' name='pass' value='<?php echo $info['pass']; ?>' type="password" placeholder=''></div>
            </div>
            <div class='form-group margin-UD row'>
              <label class='col-sm-4'>المدينة</label>
              <div class=' col-sm-8'><select class='form-control' name='town'>

                  <?php
                  $townArr = array($info['town'], 'طرابلس', 'مصراته', 'الخمس', 'بنغازي', 'زليطن');
                  echo "<option value='$townArr[0]'>$townArr[0]</option>";
                  for ($i = 1; $i <= 5; $i++) {
                    if ($info['town'] != $townArr[$i]) {
                      echo " <option value='$townArr[$i]'>$townArr[$i]</option>";
                    }
                  }
                  ?>

                </select>
              </div>
            </div>

            <div class='form-group margin-UD row'>
              <label class='col-sm-4'>العمر</label>
              <div class=' col-sm-8'><input class='form-control' name='age' value='<?php echo $info['age']; ?>' type="text" placeholder=''></div>
            </div>

            <div class='form-group margin-UD row'>
              <label class='col-sm-4'>الحالة الاجتماعية</label>
              <div class=' col-sm-8'><select class='form-control' name='status'>
                  <?php
                  $statusArr = array($info['status'], 'اعزب', 'مخطوب', 'متزوج');
                  echo "<option value='$statusArr[0]'>$statusArr[0]</option>";
                  for ($i = 1; $i <= 3; $i++) {
                    if ($info['status'] != $statusArr[$i]) {
                      echo " <option value='$statusArr[$i]'>$statusArr[$i]</option>";
                    }
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
        </div>
      </div>
    </div>
  </div>
</div>

<?php

include $tmbl . 'footer.php';

?>