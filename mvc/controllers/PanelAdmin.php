<?php
    class PanelAdmin extends Controller{
        function Index() {
            header('Location: PanelAdmin/ViewData');
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
        
        function ViewData($page = 1, $limit = 10 ) {
            if(!isset($_SESSION['role'])) die;
            if($_SESSION['role'] != "admin") die;
            // POST
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                
                $Account = $this->model("AccountModel");
                $Customer = $this->model("CustomerModel");
                // nút lọc ấn
                if(isset($_POST['trangthai'])) {
                    $trangthai = $_POST['trangthai'];
                    $hoten = $_POST['hoten'];
                    $cmnd = $_POST['cmnd'];
                    $sodt = $_POST['sodt'];
                    // userid là nhân viên muốn xem
                    $userid = $_POST['userid'];
                    $ngaybd = $_POST['ngaybd'];
                    $ngaykt = $_POST['ngaykt'];

                    // error
                    $data = mysqli_fetch_all($Customer->SearchCustomer($trangthai, $hoten, $cmnd, $sodt, $userid, $ngaybd, $ngaykt));
                    $view = $this->view("Layout1",__CLASS__, [
                        "Page" => "staffdata",
                        "Customer" => $data,
                        ]);
                    echo $view;
                }
            }

            // GET
            $Customer = $this->model("CustomerModel");
            $min = 0;
            $min=($page-1) * $limit;
            $data = mysqli_fetch_all($Customer->GetAllCustomer($min, $limit));
            $Account = $this->model("AccountModel");
            $data1 = mysqli_fetch_all($Account->GetNhanVien());
            $data2 = $Customer->GetCountCustomer();
            $rowsnum = 0;
            $rows = mysqli_fetch_array($data2);
            $rowsnum = $rows["count(customerid)"];
            $view = $this->view("Layout1",__CLASS__, [
                "Page" => "staffdata",
                "Customer" => $data,
                "Nhanvien" => $data1,
                "Numrows" => $rowsnum,
                "Pagenum" => $page
                ]);
            echo $view;
            // END GET

        }
        // đoạn này cũ
        // function ViewData($page = 1, $limit = 10 ) {
        //     if(!isset($_SESSION['role'])) die;
        //     if($_SESSION['role'] != "admin") die;
        //     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['uid']) and isset($_POST['customerIds'])) {
        //         $Customer = $this->model("CustomerModel");
        //         $userid = $_POST['uid'];
        //         foreach($_POST['customerIds'] as $customerid) {
        //             $Customer->UpdateUseridInCustomer($userid, $customerid);
        //         }
        //         echo "successfuly";
        //         die;
        //     }
        //     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['trangthai'])) {
        //         $url = $_SERVER['REQUEST_URI'];
        //         $userid = substr(parse_url($url, PHP_URL_QUERY),7);
        //         $trangthai = $_POST['trangthai'];
        //         if($userid != null) {
        //             if($trangthai == "Tất cả") {
        //                 $Customer = $this->model("CustomerModel");
        //                 $data = mysqli_fetch_all($Customer->GetCustomer1($userid));
        //                 $Account = $this->model("AccountModel");
        //                 $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
        //                 $view = $this->view("Layout1",__CLASS__, [
        //                     "Page" => "staffdata",
        //                     "Customer" => $data,
        //                     "Nhanvien" => $data1
        //                 ]);
        //                 echo $view;
        //                 die;
        //             }
        //             $Customer = $this->model("CustomerModel");
        //             $data = mysqli_fetch_all($Customer->GetCustomer2($userid, $trangthai));
        //             $Account = $this->model("AccountModel");
        //             $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
        //             $view = $this->view("Layout1",__CLASS__, [
        //                 "Page" => "staffdata",
        //                 "Customer" => $data,
        //                 "Nhanvien" => $data1
        //             ]);
        //             echo $view;
        //         }
        //         else {
        //             if($trangthai == "Tất cả") {
        //                 $Customer = $this->model("CustomerModel");
        //                 $data = mysqli_fetch_all($Customer->GetAllCustomer($page, $limit));
        //                 $Account = $this->model("AccountModel");
        //                 $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
                        
        //                 $view = $this->view("Layout1",__CLASS__, [
        //                     "Page" => "staffdata",
        //                     "Customer" => $data,
        //                     "Nhanvien" => $data1,
        //                 ]);
        //                 echo $view;
        //                 die;
        //             }
        //             $Customer = $this->model("CustomerModel");
        //             $data = mysqli_fetch_all($Customer->GetCustomer4($trangthai));
        //             $Account = $this->model("AccountModel");
        //             $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
        //             $view = $this->view("Layout1",__CLASS__, [
        //                 "Page" => "staffdata",
        //                 "Customer" => $data,
        //                 "Nhanvien" => $data1
        //             ]);
        //             echo $view;
        //         }
        //     }
        //     // chọn nv xem
        //     $url = $_SERVER['REQUEST_URI'];
        //     $userid = substr(parse_url($url, PHP_URL_QUERY),7);
        //     if($userid == null) {
        //         $Customer = $this->model("CustomerModel");
        //         // page = 1 limit = 10
        //         $max = 0;
        //         $min = 0;
        //         $max+=$limit*$page; //first: 10, sec: 20
        //         $min+=($page * $limit)-9; //first: 0, sec: 10
        //         // echo "min: ". $min. " max: " . $max;die;
        //         $data = mysqli_fetch_all($Customer->GetAllCustomer($min, $max));
        //         $Account = $this->model("AccountModel");
        //         $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
        //         $data2 = $Customer->GetCountCustomer();
        //         $rows =0;
        //         while($row = mysqli_fetch_array($data2))
        //         {
        //             $rows = $row["count(customerid)"];
        //         }
        //         $view = $this->view("Layout1",__CLASS__, [
        //             "Page" => "staffdata",
        //             "Customer" => $data,
        //             "Nhanvien" => $data1,
        //             "Numrows" => $rows,
        //             "Pagenum" => $page
        //         ]);
        //         echo $view;
        //     }
        //     else {
        //         $Customer = $this->model("CustomerModel");
        //         $data = mysqli_fetch_all($Customer->GetCustomer1($userid));
        //         $Account = $this->model("AccountModel");
        //         $data1 = mysqli_fetch_all($Account->GetNhanVien1($userid));
        //         $view = $this->view("Layout1",__CLASS__, [
        //             "Page" => "staffdata",
        //             "Customer" => $data,
        //             "Nhanvien" => $data1,
        //         ]);
        //         echo $view;
        //     }
        // }
        function ChuyenData() {
            if(!isset($_SESSION['role'])) die;
            if($_SESSION['role'] != "admin") die;
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['uid']) and isset($_POST['customerIds'])) {
                $Customer = $this->model("CustomerModel");
                $userid = $_POST['uid'];
                foreach($_POST['customerIds'] as $customerid) {
                    $Customer->UpdateUseridInCustomer($userid, $customerid);
                }
                echo "successfuly";
            }
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