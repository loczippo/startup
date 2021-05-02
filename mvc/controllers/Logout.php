<?php
    class Logout extends Controller{
        function Index() {
            $_SESSION['username'] = "";
            $_SESSION['role'] = "";
            session_destroy();
            header('Location: Home');
        }
    }
?>