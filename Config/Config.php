<?php
    namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    //Path to your project's root folder
    define("FRONT_ROOT", "/coldProduct/");
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
    define("IMG_PATH", FRONT_ROOT.VIEWS_PATH . "assets/img/");
    define("IMGCOOL_PATH", FRONT_ROOT.VIEWS_PATH . "assets/imagencool/");
    define("DB_HOST", "localhost");
    define("DB_NAME", "coldProduct");
    define("DB_USER", "root");
    define("DB_PASS", "");
?>
