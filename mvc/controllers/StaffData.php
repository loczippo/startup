<?php
    class StaffData extends Controller{
        function Index($page=1, $limit = 10) {
            //view
            $url = $_SERVER['REQUEST_URI'];
            $array = explode('/', $url);
            if(isset($array[2]) && is_numeric($array[2])) {
                $page = $array[2];
            }
            if(!isset($_SESSION['username'])) die;
            if(!isset($_SESSION['role'])) die;
            $Customer = $this->model("CustomerModel");
            $Account = $this->model("AccountModel");
            $user = $Account->GetUserID($_SESSION['username']);
            if($row = mysqli_fetch_array($user)) {
                $userid = $row["userid"];
            }
            $min = 0;
            $min=($page-1) * $limit;
            $data = mysqli_fetch_all($Customer->GetCustomer($userid, $min, $limit));
            $data2 = $Customer->GetCountCustomerTrangThaiNULL($userid);
            $rowsnum = 0;
            $rows = mysqli_fetch_array($data2);
            $rowsnum = $rows["count(customerid)"];
            if($_SESSION['role'] == "nhanvien")
                $view = $this->view("Layout1",__CLASS__, [
                    "Page" => "staffdata",
                    "Customer" => $data,
                    "Numrows" => $rowsnum,
                    "Pagenum" => $page
                ]);
            else {
                $view = $this->view("Layout1", __CLASS__, [
                    "Page" => "home",
                ]);
            }
            echo $view;
            
        }
        function DataEntry($customerid=null, $param=null) {
            if($customerid == null) die;
            if(!isset($_SESSION['username'])) die;
            if(!isset($_SESSION['role'])) die;
            if(is_numeric($customerid)) {
                $Account = $this->model("AccountModel");
                $Customer = $this->model("CustomerModel");
                $cus = $Customer->GetCustomerForCustomerID($customerid);
                if($row = mysqli_fetch_array($cus)) {
                    $userid_customer = $row["userid"];
                }
                $user = $Account->GetUserID($_SESSION['username']);
                if($row = mysqli_fetch_array($user)) {
                    $userid_account = $row["userid"];
                }
                if($userid_customer != $userid_account){
                    if($_SESSION['role'] == "admin") {
                        $data = mysqli_fetch_all($Customer->GetCustomerForCustomerID($customerid));
                        $view = $this->view("Layout1", __CLASS__, [
                            "Page" => "dataentry",
                            "Customer" => $data,
                        ]);
                        echo $view;
                    }
                    die;
                }
                if($param == "Update") $this->Update($customerid, $userid_customer);
                $data = mysqli_fetch_all($Customer->GetCustomerForCustomerID($customerid));
                $view = $this->view("Layout1", __CLASS__, [
                    "Page" => "dataentry",
                    "Customer" => $data,
                ]);
                echo $view;
            }
        }

        function InsertData() {
            if(!isset($_SESSION['role'])) die;
                $Account = $this->model("AccountModel");
                $data = mysqli_fetch_all($Account->GetInfoUser($_SESSION['username']));
            if($_SESSION['role'] == "nhanvien")
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
        function Update($customerid, $userid) {
            $Customer = $this->model("CustomerModel");
            if(isset($_POST['trangthai'])) {
                $hoten = $_POST['hoten'];
                $cmnd = $_POST['cmnd'];
                $sodt = $_POST['sodt'];
                $hanmuc = $_POST['hanmuc'];
                $trangthai = $_POST['trangthai'];
                $ghichu = $_POST['ghichu'];
                $sotien = $_POST['sotien'];
                $ngayhen = $_POST['ngayhen'];
                $ngaygoi = date("Y-m-d");
                if(strlen($sotien) !=0 && $trangthai=="Có nhu cầu") {
                    $Customer->UpdateCustomerCNC($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $sotien, $ngaygoi);
                }
                if($trangthai=="Không nhu cầu") {
                    $Customer->UpdateCustomerKNC($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $ngaygoi);
                }
                if($trangthai == 'Không bắt máy') {
                    $ngayhen1 = date("Y-m-d");
                    $tomorrow = date('Y-m-d', strtotime($ngayhen1 . "+3 days"));
                    $Customer->UpdateCustomerKBM($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $tomorrow, $ngaygoi);
                }
                if(strlen($ngayhen) !=0 && $trangthai== 'Hẹn gọi lại') {
                    $Customer->UpdateCustomerHGL($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $ngayhen, $ngaygoi);
                }
                else {
                    $Customer->UpdateCustomerTrangThai($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $ngaygoi);
                }
                
            }
            $data = mysqli_fetch_all($Customer->GetCustomerForCustomerID_LIMIT($userid));
            if($data == null) {
                header("Location: /StaffData");
            }
            foreach($data as $row) {

                if(isset($row[0])) {
                    header("Location: /StaffData/DataEntry/${row[0]}");
                }
            }
        }
    }
?>