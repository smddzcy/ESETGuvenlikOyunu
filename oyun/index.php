<?php include '../views/layouts/header.php' ?>
<?php include '../views/layouts/menu.php' ?>
    <div class="container">
        <div id="level-container">
            <?php
            if (isset($_COOKIE['platform_id'])) {
                require_once("../controller/Config.php");
                require_once(Config::HELPER_FILE_USERDB);
                $userDBHelper = new User_DB_Helper();
                $socialID = (int)$_COOKIE['platform_id'];
                $currentLevel = $userDBHelper->getLevel($socialID);
                include "../views/levels/level-{$currentLevel}.html";
            } else {
                header("Location: http://localhost/ESETGuvenlikOyunu/");
            }
            ?>
        </div>
    </div>
<?php include '../views/layouts/footer.php' ?>