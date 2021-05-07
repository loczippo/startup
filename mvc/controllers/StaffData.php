<?php
    class StaffData extends Controller{
        function Index() {
            //view
            if(!isset($_SESSION['username'])) die;
            if(!isset($_SESSION['role'])) die;
            $Customer = $this->model("CustomerModel");
            $Account = $this->model("AccountModel");
            $user = $Account->GetUserID($_SESSION['username']);
            if($row = mysqli_fetch_array($user)) {
                $userid = $row["userid"];
            }
            $data = mysqli_fetch_all($Customer->GetCustomer($userid));
            if($_SESSION['role'] == "nhanvien")
                $view = $this->view("Layout1",__CLASS__, [
                    "Page" => "staffdata",
                    "Customer" => $data,
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
                if($userid_customer != $userid_account) die;
                if($param == "Update") $this->Update($customerid, $userid_customer);
                $data = mysqli_fetch_all($Customer->GetCustomerForCustomerID($customerid));
                $view = $this->view("Layout1", __CLASS__, [
                    "Page" => "dataentry",
                    "Customer" => $data,
                ]);
                echo $view;
            }
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