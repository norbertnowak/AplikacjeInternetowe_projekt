<?php
session_start();
$site_path = realpath(dirname(__FILE__));
$site_path = $site_path . "/html";
define('__SITE_PATH', $site_path);
define('APP_ROOT', '~AplikacjeInternetowe_projekt/Projekt');
require_once 'html\includes\init.php';
//utworzenie instancji routera i dodanie go do rejestru
$registry->router = new router($registry);

$registry->template = new Template($registry);

$registry->router->setPath(__SITE_PATH . '\controller');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Internetowy system ankietyzacji - Projekt - Aplikacje internetowe - Norbert Nowak</title>
        <link rel="stylesheet" href="/<?= APP_ROOT ?>/html/content/css/bootstrap.css" type="text/css" />     
        <script src="/<?= APP_ROOT ?>/html/content/scripts/jquery-1.11.2.min.js"></script> 
    </head>
    
    <body>
        
        <div class="row">
            <div class="col-md-12"> <?php include 'html\includes\menu.php'; ?> </div>
        </div>
        
        <div class="container">
        <div class="row">

                    <?php
                    $registry->router->loader();
                    ?>
   
        </div>
    </div>

        <script src="/<?= APP_ROOT ?>/html/content/scripts/bootstrap.min.js"></script> 
    </body>
    
    
    
</html>
