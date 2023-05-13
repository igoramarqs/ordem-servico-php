<?php
include_once "../backend/core.php";
if (!isset($_SESSION['id'])) {
    header('Location: ' . $CONFIGURATION['url'] . 'login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once('templates/includes/head.php'); ?>
</head>

<body id="page-top">    
    <div id="wrapper">        
        <?php include_once('templates/includes/sidebar.php'); ?>        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('templates/includes/topbar.php'); ?>                
                <div class="container-fluid">
                    <?php include_once('templates/index/body.php'); ?>
                </div>                
            </div>            
            <?php include_once('templates/includes/footer.php'); ?>
        </div>        
    </div>    
    
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <?php include_once('templates/includes/modals.php'); ?>

    <?php include_once('templates/includes/scripts.php'); ?>

</body>

</html>