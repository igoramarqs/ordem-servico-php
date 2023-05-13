<?php
   
    include "core.php";

    if(!isset($_SESSION)){
        session_start();
    }

    session_destroy();    
    header('Location: ' . $CONFIGURATION['site_url']);

?>