<?php
    class Home extends Controller{
        function Index($username = null, $password = null) {
            //$SinhVien = $this->model("SinhVienModel");
            //$data = $SinhVien->GetSV1($username);
            if(!isset($_SESSION['role'])) {
                header("Location: /Login");
            }
            if($_SESSION['role'] == "admin") {
                header("Location: /Customers");
            }
            if($_SESSION['role'] == "nhanvien") {
                header("Location: /Customers");
            }

            
            // if($username == null) {
            //     if(!isset($_SESSION['role'])) {
            //         header("Location: /Login");
            //     }
            //     if($_SESSION['role'] == "admin") {
            //         header("Location: /Customers");
            //     }
            //     if($_SESSION['role'] == "nhanvien") {
            //         header("Location: /Customers");
            //     }
            // }
            // $qr = "SELECT * FROM crm_accounts where username = '$username' and password = '$password'";
            // $Account = $this->model("AccountModel");
            // if($Account->Query($qr)-> num_rows > 0) {
            //     echo "Thành công";
            // }
            // else echo "Lỗi";


            // $view = $this->view("Layout1", __CLASS__, [
            //     "Page" => "home",
            // ]);
            // echo $view;
            // while($row = mysqli_fetch_array($data)) {
            //     echo $row["hoten"]."<br/>";
            // }

            // views
            
        }
    }
?>