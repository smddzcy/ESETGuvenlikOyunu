<?php
if (isset($_COOKIE['platform_id'])) {
    require_once("../controller/Config.php");
    require_once(Config::HELPER_FILE_USERDB);
    $userDBHelper = new User_DB_Helper();
    $socialID = (int)$_COOKIE['platform_id'];
    $currentLevel = $userDBHelper->getLevel($socialID);
    $level = true;
} else {
    header("Location: http://localhost/ESETGuvenlikOyunu/");
}
?>
<?php include '../views/layouts/header.php' ?>
<?php include '../views/layouts/menu.php' ?>
    <div class="container">
        <div id="level-container">
            <?php
            if ($level)
                include "../views/levels/level-{$currentLevel}.html";
            ?>
        </div>
    </div>
<?php include '../views/layouts/footer.php' ?>