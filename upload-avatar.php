
<?php


session_start();

if(!isset($_SESSION['email']) || $_SESSION['email'] == ''){

    header('location:login.php');
}

$nosession = '';

include 'init.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_FILES['file_pic'])){
        $name = $_FILES['file_pic'];
    }else{
        $name = $_FILES['picture'];
    }

        $name_pic = $name['name'];
        $name_siz = $name['size'];
        $name_err = $name['error'];
        $name_typ = $name['type'];
        $name_tmp = $name['tmp_name'];
        $typefile = explode("/",$name_typ);
        if( $name_siz > 4000000){
           errorsize();
        }elseif($typefile[0] == 'image'){

            if(isset($_FILES['file_pic'])){
                move_uploaded_file( $name_tmp ,'themes/img/'.$_SESSION['id'].'.jpg' );
            }else{
                $num_img = random_int(1,1000);
                // echo $num_img;
                move_uploaded_file( $name_tmp ,'upload/avatar/'.$num_img.'.jpg' );

                $stmt_2 = $con -> prepare('INSERT picture SET num_pic = ? , date_pic =  now() , user_id = ?');

                $stmt_2 -> execute(Array($num_img,$_SESSION['id']));

            }

            done();
           }else{
              errorfile();
           }




    }

//     for($i = 0 ;$i<15; $i++){
//         echo file('themes/img/f.png')[$i] . "<br><br><br>";
// }

?>

<div class='container-fluid'>

   <div class='row'>
     <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
         <div class='row'>
         <div class=' col-sm-offset-3 col-sm-3'></div>
         <div class='col-sm-offset-6 col-sm-6'>
         <div class='panel panel-default'>
         <div class='panel-heading'>
         <p> تحميل صورة شخصية</i></p>
        </div>
         <img class='img-responsive img-thumbnail pic-load' src="themes/img/<?php if(!file_exists('themes/img/'.$info['user_id'].'.jpg')){echo 'default.png';}else{echo $info['user_id'].'.jpg';} ?>" alt="">
         <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST' enctype="multipart/form-data">
           <input type="file" name='file_pic' class='form-control'>
           <input type="submit" value='تحميل' class='login-btn btn-block upload'>
         </form>
         <?php
         function errorfile(){
           echo "<label class='login-btn btn-block erorrUP'>الملف غير مدعوم</label>";
         }
         function errorsize(){
            echo "<label class='login-btn btn-block erorrUP'>حجم الملف كبير</label>";
         }
         function done(){
            echo "<label class='login-btn btn-block done'>تم رفع الصورة بنجاح</label>";
         }
        ?>
        </div>
         </div>
         <div class=' col-sm-offset-3 col-sm-3'></div>
</div>
</div>
</div>


<div class='row'>
     <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
         <div class='row'>
         <div class=' col-sm-offset-3 col-sm-3'></div>
         <div class='col-sm-offset-6 col-sm-6'>
         <div class='panel panel-default'>
         <div class='panel-heading'>
         <p> تحميل صور للملف الشخصي</i></p>
        </div>

         <img class='img-responsive img-thumbnail pic-load' src="upload/avatar/<?php echo 'default.png'; ?>" alt="">
         <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST' enctype="multipart/form-data">
           <input type="file" name='picture' class='form-control'>
           <input type="submit" value='تحميل' class='login-btn btn-block upload'>
         </form>

        </div>
         </div>
         <div class=' col-sm-offset-3 col-sm-3'></div>
</div>

</div>
</div>


</div>
<?php

include $tmbl . 'footer.php';

?>