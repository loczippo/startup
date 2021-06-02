<?php
    class Logout extends Controller{
        function Index() {
            session_destroy();
            header('Location: Login');
        }
    }
?>