<div class='panel-default'>
    <div class='panel-heading'>
        <p>الاعضاء</p>
    </div>
    <div class='panel-body'>
        <?php

        $stmt = $con->prepare("SELECT * FROM `users` WHERE NOT user_id = $id_US ");
        $stmt->execute();
        $infos = $stmt->fetchAll();

        ?>
        <div class='row'>
            <?php foreach ($infos as $info) {  ?>

                <div class='col-sm-4 col-md-4'>
                    <div class='thumbnail'>
                        <a href='profile.php?id=<?php echo $info["user_id"] . "&name=" . $info['f_name']; ?>'>
                            <img class="image_view_users" src="themes/img/<?php

                                                                            if (!file_exists('themes/img/' . $info['user_id'] . '.jpg')) {
                                                                                echo 'default.png';
                                                                            } else {
                                                                                echo $info['user_id'] . '.jpg';
                                                                            }
                                                                            ?>" alt="" class='img-thumbnail'>
                        </a>
                        <div>
                            <h5 class='title-name'><strong><?php echo $info['f_name'] . " " . $info['l_name'] ?></strong></h5>
                            <p class='info-about'><span><?php echo $info['age'] ?></span> | <span><?php echo $info['town'] ?></span></p>
                            <p><a href="#" class="btn btn-info botton-users" role='button'><i class='fa fa-user-plus'></i></a>
                                <a href="<?php echo 'chat.php?id_ch=' . $info['user_id'];  ?>" style='border:1px solid #222' class="botton-users btn btn-default" role='Button'><i style='color:#222' class='fa fa-comment'></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</div>