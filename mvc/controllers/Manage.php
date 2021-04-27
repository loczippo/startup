<?php
    class Manage extends Controller{
        function Index() {
            echo "hi";
        }
        function AddClass() {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                print_r($_POST);
            }
            else {
            $view = $this->view("Layout1",[
                "Page" => "addclass",
                "Username" => "Admin"
            ]);
            echo $view;
            }
        }
    }
?>