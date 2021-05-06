<?php
    class PanelAdmin extends Controller{
        function Index() {
            
        }
        function InsertData() {
            if(!isset($_SESSION['role'])) die;
                $Account = $this->model("AccountModel");
                $data = mysqli_fetch_all($Account->GetNhanVien());
            if($_SESSION['role'] == "admin")
                $view = $this->view("Layout1",__CLASS__, [
                    "Page" => "adminpanel",
                    "Nhanvien" => $data,
                ]);
            else {
                $view = $this->view("Layout1", __CLASS__, [
                    "Page" => "home",
                ]);
            }
            echo $view;
        }

        function ViewData() {
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['username'])) {
                $userid = $_POST['username'];
                $Customer = $this->model("CustomerModel");
                $data = mysqli_fetch_all($Customer->GetCustomer($userid));
                $view = $this->view("Layout1",__CLASS__, [
                    "Page" => "staffdata",
                    "Customer" => $data,
                ]);
                echo $view;
                die;
            }
            if($_SESSION['role'] != "admin") die;
            $Account = $this->model("AccountModel");
            $data = mysqli_fetch_all($Account->GetNhanVien());
            $view = $this->view("Layout1", __CLASS__, [
                "Page" => "viewdata",
                "Nhanvien" => $data,
            ]);
            echo $view;
        }
    }
?>