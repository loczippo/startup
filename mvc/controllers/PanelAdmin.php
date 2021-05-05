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
    }
?>