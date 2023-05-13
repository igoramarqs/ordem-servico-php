<?php
  include_once "backend/login.php";
  include_once "backend/core.php";
  if (isset($_SESSION['id'])) {
    header('Location: ' . $CONFIGURATION['url'] . 'panel/index');
    exit;
  }  
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once('templates/head.php');?>
    </head>

    <body class="bg-gradient-dark">
        <?php include_once('templates/login/body.php'); ?>
    </body>

    <?php include_once('templates/scripts.php'); ?>
</html>