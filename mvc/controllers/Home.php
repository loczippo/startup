<?php
    class Home extends Controller{
        function Index() {
            //$SinhVien = $this->model("SinhVienModel");
            //$data = $SinhVien->GetSV1($username);
            if( !isset($_SESSION['username'])) {
                header("Location: /Login");
            }
            // if($_SESSION['username'] == "admin") {
            //     header("Location: /PanelAdmin/ViewData");
            // }
            if($_SESSION['role'] == "nhanvien") {
                header("Location: /StaffData");
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