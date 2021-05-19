<?php
    class Recovery extends Controller{
        function Index(){
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                
                $Account = $this->model("AccountModel");
                $username = $_POST['username'];
                $password = $_POST['password'];
                $qr = "UPDATE CRM_accounts SET password = '${password}' WHERE username='${username}'";
                $data = $Account -> Query($qr);
                header("Location: PanelAdmin/ManageUser");
                die;
            }
            $view = $this->view("Layout2", __CLASS__, [
                "Page" => "recovery",
            ]);
            echo $view;
        }
    }
?>