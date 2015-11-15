<?php
if (isset($_COOKIE['platform_id'])) {
    header("Location: http://localhost/ESETGuvenlikOyunu/oyun/index.php");
}
include 'views/layouts/header.php';
?>

    <div class="container" style="margin-top:200px;">

        <div class="main-mid">
            <div class="main-aunt-container">
                <img id="main-aunt" style="opacity:0;" src="assets/images/nebahatteyze.png" alt="">
            </div>
            <div class="social-media" style="opacity:0;">
                <a href="/ESETGuvenlikOyunu/facebook-login.php">
                    <div class="btn btn-primary btn-social btn-facebook">
                        <i class="fa fa-facebook-square fa-2x"></i>
                        <b>FACEBOOK İLE GİRİŞ YAP</b>
                    </div>
                </a>
                <a href="/ESETGuvenlikOyunu/twitter-login.php">
                    <div class="btn btn-primary btn-social btn-twitter">
                        <i class="fa fa-twitter fa-2x"></i>
                        <b>TWITTER İLE GİRİŞ YAP</b>
                    </div>
                </a>
            </div>
        </div>
    </div><!-- /.container -->

<?php include 'views/layouts/footer.php' ?>