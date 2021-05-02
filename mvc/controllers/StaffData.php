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
        function DataEntry($customerid=null) {
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
                $data = mysqli_fetch_all($Customer->GetCustomerForCustomerID($customerid));
                $view = $this->view("Layout1", __CLASS__, [
                    "Page" => "dataentry",
                    "Customer" => $data
                ]);
                echo $view;
            }
            else if($customerid == "All") {
                echo "hi";
            }
        }
    }
?>