<?php
    class ThongTinSV extends Controller{
        function ApiCustomer() {
            $NhaMang = $_GET['nhamang'];
            $NgayThem = $_GET['ngaythem'];
            $qr = "SELECT * FROM CRM_customers WHERE NgayThem='${NgayThem}' and(";
            $Customer = $this->model("CustomerModel");
             $GetDayDauSo = $Customer ->Query("SELECT * FROM networks WHERE Ten = '${NhaMang}'");
             while($row = mysqli_fetch_array($GetDayDauSo)) {
                
                 $DayDauSo = explode(",", $row["DayDauSo"]);
                 for($i = 0; $i< count($DayDauSo); $i++) {
                     $qr.= " Sodt like '{$DayDauSo[$i]}%'";
                     if($i < count($DayDauSo)-1) $qr.=" or ";
                 }
             }
            $page = isset($_GET['numpage'])?$_GET['numpage']:1;
            $limit = isset($_GET['limit'])?$_GET['limit']:10;
            $min = ($page-1)*$limit;
            
            $qr .= ") LIMIT $min,$limit";
            $getInfo = $Customer->Query($qr);
            $mang=[];
            while($row = mysqli_fetch_array($getInfo)) {
                array_push($mang, new Customer($row["customerid"],$row["hoten"],$row["cmnd"],$row["sodt"], $row["hanmuc"])); 
            }
            $json = json_encode($mang, JSON_UNESCAPED_UNICODE);
            echo $json;
        }
    //     function ApiNetwork() {
    //         $Customer = $this->model("CustomerModel");
    //         $qr = "SELECT * FROM Networks";
    //         $getInfo = $Customer->Query($qr);
    //         $mang=[];
    //         while($row = mysqli_fetch_array($getInfo)) {
    //             array_push($mang, new Network($row["Id"], $row["Ten"],$row["DayDauSo"])); 
    //         }
    //         $json = json_encode($mang, JSON_UNESCAPED_UNICODE);
    //         echo $json;
    //     }
    // }   
    // class Network {
    //     public $Id;
    //     public $Ten;
    //     public function __construct($id, $ten, $dauso) {
    //         $this->Id = $id;
    //         $this->Ten = $ten;
    //         $this->Dauso = $dauso;
    //     }
    }

    class Customer {
        public $Id;
        public $Hoten;
        public $Cmnd;
        public $Diachi;
        public $Sodt;
        public $Hanmuc;
        public function __construct($id, $hoten, $cmnd, $sodt, $hanmuc) {
            $this->Id = $id;
            $this->Hoten = $hoten;
            $this->Cmnd = $cmnd;
            $this->Sodt = $sodt;
            $this->Hanmuc = $hanmuc;
        }
    }
?>