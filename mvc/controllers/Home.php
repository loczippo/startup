<?php
    class Home extends Controller{
        function Index() {
            // models
            $username = null;
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            }
            $SinhVien = $this->model("SinhVienModel");
            $data = $SinhVien->GetSV1($username);
            $view = $this->view("Layout1", [
                "SinhVien" => $data,
                "Page" => "home",
                "Username" => $username?$username:null
            ]);
            echo $view;
            // while($row = mysqli_fetch_array($data)) {
            //     echo $row["hoten"]."<br/>";
            // }

            // views
            
        }
        function Show() {
            $SinhVien = $this->model("SinhVienModel");
            $name = $SinhVien->GetSV();
            $view = $this->view("Layout1", [
                "SinhVien" => $name,
                "Page" => "news",
                ]);
            echo $view;
        }
    }
?>