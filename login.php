<?php

session_start();

$nonav = '';

$nosession = '';

include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $email = $_POST['email'];

  $pass = $_POST['pass'];

  $stmt = $con->prepare('SELECT user_id , email , pass ,f_name, l_name from users where email = ? and pass = ? ');
  $stmt->execute(array($email, $pass));
  $get = $stmt->fetch();
  $count = $stmt->rowCount();

  if ($count > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $get['user_id'];
    $_SESSION['f_name'] = $get['f_name'];
    $_SESSION['l_name'] = $get['l_name'];
    header('location:index.php');
  }
}

?>

<!doctype html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <link href="css/floating-labels.css" rel="stylesheet">
</head>

<body>

  <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="text-center mb-4">
      <div class="mb-4" width="72" height="72">
        <nav class=" navbar-expand-lg navbar-light ">
          <a class="navbar-brand" href="#" style='background-color:#f5f5f5'>
            <div class='center'>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
          </a>
      </div>

      <h1 class="h3 mb-3 font-weight-normal">موقع تواصل اجتماعي</h1>
      <p>تم بناء هدا الموقع لزيادة الخبرة العملية فقط وليس <code>:لأستخدام الجمهور</code>وهو يعمل على متصفحات فايرفوكس و قوقل................ <a href="createEmail.php"> أنشاء حساب جديد </a></p>
    </div>

    <div class="form-label-group">
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name='email' required autofocus>
      <label for="inputEmail">Email address</label>
    </div>

    <div class="form-label-group">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name='pass' required>
      <label for="inputPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
  </form>

</body>

</html>