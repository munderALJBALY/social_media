<?php

if(!isset($nosession)){

    session_start();

    if(!isset($_SESSION['email'])){

        header('location:login.php');
    }
}

$tmbl = 'inc/tmbl/';

include 'connect.php';

include $tmbl . 'header.php';

    if(!isset($nonav)){
        include $tmbl . 'nav.php';
        }

    if(!isset($nosession)){
        echo $_SESSION['email'];

        include $tmbl . 'footer.php';
        }


// include  تستعمل لاستدعاء الكود فقط وليس المكتبات معها ولهدا يجب تغيير مسارات المكتبات
