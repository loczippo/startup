<?php
    session_start();
    require_once("./mvc/Bridge.php");
    
    date_default_timezone_set('Asia/Saigon');
    // start app
    $app = new App();
?>