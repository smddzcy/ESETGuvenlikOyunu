<nav class="navbar navbar-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="dropdown-toggle" aria-expanded="false" aria-haspopup="true" role="button"
                       data-toggle="dropdown">
                        <b class="username">
                            <?php
                            require_once("../controller/Config.php");
                            require_once(Config::HELPER_FILE_USERDB);
                            $userDBHelper = new User_DB_Helper();
                            $socialID = (int)$_COOKIE['platform_id'];
                            echo $userDBHelper->getUser($socialID)->fetch_assoc()['name'];
                            ?></b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="http://localhost/ESETGuvenlikOyunu/logout.php">Çıkış Yap</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>