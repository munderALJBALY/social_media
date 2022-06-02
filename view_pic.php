<?php


session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] == '') {

    header('location:login.php');
}

$nosession = '';

include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $id_user = $_GET['id'];

    $stmt_3 = $con->prepare("select * from picture where user_id = $id_user order by id_picture");
    $stmt_3->execute();
    $pictures = $stmt_3->fetchAll();
}


?>

<div class='container-fluid'>

    <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
            <div class='row'>
                <div class=' col-sm-offset-2 col-md-2 col-sm-2 col-xd-2'></div>

                <div class='col-sm-offset-8 col-md-8 col-sm-8 col-xd-8'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <p>الصور المحملة</i></p>
                        </div>


                        <?php
                        foreach ($pictures as $picture) {
                            if ($picture['user_id'] == $id_user) {
                                echo "<img class=' col-lg-3 col-md-4 col-sm-6 col-xd-6 view_picture' src='upload/avatar/" . $picture['num_pic'] . ".jpg" . "' alt='' />";
                            } else {
                                echo 'default.png' . "' alt='' />";
                            };
                        }
                        ?>


                    </div>
                </div>

                <div class=' col-sm-offset-2 col-md-2 col-sm-2 col-xd-2'></div>
            </div>
        </div>
    </div>
</div>

<?php

include $tmbl . 'footer.php';

?>