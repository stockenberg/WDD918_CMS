<?php
require 'vendor/autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//define('UPLOAD_DIR', __DIR__ . '/assets/uploads/');


$app = new \app\App();
$app->init();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/foundation-sites/dist/css/foundation.min.css">
    <link rel="stylesheet" href="assets/scss/app.css">
    <title>Mini Facebook</title>
</head>
<body>
<div class="top-bar">
    <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text">Site Title</li>
            <li><a href="?page=home">Home</a></li>
            <li><a href="?page=about">About</a></li>
            <li><a href="?page=contact">Contact</a></li>
            <?php if(\app\core\Guard::isLoggedIn()) : ?>
             <li><a href="?action=logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            <li><input type="search" placeholder="Search"></li>
            <li><button type="button" class="button">Search</button></li>
        </ul>
    </div>
</div>
<h2><?= \app\core\Status::read('status') ?></h2>

<main class="grid-container">
    <?php include $app->getCurrentPageTemplate(); ?>
</main>
</body>
</html>
