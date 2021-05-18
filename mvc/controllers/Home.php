<?php
    class Home extends Controller{
        function Index() {
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
            $view = $this->view("Layout1", __CLASS__, [
                "Page" => "home",
            ]);
            echo $view;
            // while($row = mysqli_fetch_array($data)) {
            //     echo $row["hoten"]."<br/>";
            // }

            // views
            
        }
    }
?>