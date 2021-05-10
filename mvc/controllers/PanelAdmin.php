<?php
    class PanelAdmin extends Controller{
        function Index() {
            if(!isset($_SESSION['role'])) die;
            if($_SESSION['role'] != "admin") die;
            $Account = $this->model("AccountModel");
            $data = mysqli_fetch_all($Account->GetNhanVien());
            $view = $this->view("Layout1", __CLASS__, [
                "Page" => "viewdata",
                "Nhanvien" => $data,
            ]);
            echo $view;
        }
        function InsertData() {
            if(!isset($_SESSION['role'])) die;
            if($_SESSION['role'] != "admin") die;
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
            if(!isset($_SESSION['role'])) die;
            if($_SESSION['role'] != "admin") die;
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['uid']) and isset($_POST['customerIds'])) {
                $Customer = $this->model("CustomerModel");
                $userid = $_POST['uid'];
                foreach($_POST['customerIds'] as $customerid) {
                    $Customer->UpdateUseridInCustomer($userid, $customerid);
                }
                echo "successfuly";
                die;
            }
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['trangthai'])) {
                $url = $_SERVER['REQUEST_URI'];
                $userid = substr(parse_url($url, PHP_URL_QUERY),7);
                $trangthai = $_POST['trangthai'];
                if($trangthai == "Tất cả") {
                    $Customer = $this->model("CustomerModel");
                    $data = mysqli_fetch_all($Customer->GetCustomer1($userid));
                    $Account = $this->model("AccountModel");
                    $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
                    $view = $this->view("Layout1",__CLASS__, [
                        "Page" => "staffdata",
                        "Customer" => $data,
                        "Nhanvien" => $data1
                    ]);
                    echo $view;
                    die;
                }
                $Customer = $this->model("CustomerModel");
                $data = mysqli_fetch_all($Customer->GetCustomer2($userid, $trangthai));
                $Account = $this->model("AccountModel");
                $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
                $view = $this->view("Layout1",__CLASS__, [
                    "Page" => "staffdata",
                    "Customer" => $data,
                    "Nhanvien" => $data1
                ]);
                echo $view;
            }
            $url = $_SERVER['REQUEST_URI'];
            $userid = substr(parse_url($url, PHP_URL_QUERY),7);
            $Customer = $this->model("CustomerModel");
                $data = mysqli_fetch_all($Customer->GetCustomer1($userid));
                $Account = $this->model("AccountModel");
                $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
                $view = $this->view("Layout1",__CLASS__, [
                    "Page" => "staffdata",
                    "Customer" => $data,
                    "Nhanvien" => $data1
                ]);
                echo $view;
        }
        function ManageUser($userid=null) {
            if(!isset($_SESSION['role'])) die;
            if($_SESSION['role'] != "admin") die;
            $Account = $this->model("AccountModel");
            $url = $_SERVER['REQUEST_URI'];
            $role = substr(parse_url($url, PHP_URL_QUERY),5);
            if($userid != null) {
                $Account->UpdateRole($userid, $role);
            }
            $data = mysqli_fetch_all($Account->GetAllAccount());
            $view = $this->view("Layout1",__CLASS__, [
                "Page" => "manageuser",
                "Account" => $data
            ]);
            echo $view;
        }
    }
?>