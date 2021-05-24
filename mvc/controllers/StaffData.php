<?php
    class StaffData extends Controller{
        function Index($page=1, $limit = 10) {
            $Customer = $this->model("CustomerModel");
            $Account = $this->model("AccountModel");
            $trangthai = "";
            $hoten = "";
            $cmnd = "";
            $sodt = "";
            $userid = "";
            $ngaybd = "";
            $ngaykt = "";
            $qr="";
            $page1=1;
            $data = (explode('=',urldecode($_SERVER['REQUEST_URI'])));
            if(isset($data[1])) {
                $trangthai = substr($data[1],0,-6);
                if($trangthai=="all"){
                     $qr = "SELECT * FROM CRM_customers where 1=1";
                }
                else if($trangthai=='new'){
                    $qr = "SELECT * FROM CRM_customers where trangthai is null";
                }
                else{
                 $qr = "SELECT * FROM CRM_customers where trangthai ='$trangthai'";
                }
            }
            if(isset($data[2])) {
                $hoten = substr($data[2],0,-5);
                if($hoten != "") $qr.=" and hoten LIKE '%${hoten}%'";
            }
            if(isset($data[3])) {
                $cmnd = substr($data[3],0,-5);
                if($cmnd != "") $qr.=" and cmnd='${cmnd}'";
            }
            if(isset($data[4])) {
                $sodt = substr($data[4],0,-7);
                if($sodt != "") $qr.=" and sodt='${sodt}'";
            }
            if(isset($data[5])) {
                $ngaybd = substr($data[5],0,-7);
            }
            if(isset($data[6])) {
                $ngaykt = $data[6];
            }
            if(isset($data[7])) {
                $ngaykt = substr($ngaykt, 0, -5);
                $page1 = $data[7];
            }
            $today = date("Y-m-d");
            if($ngaybd == "") $qr.=" and ngaythem >= '${today}'";
            else $qr.=" and ngaythem >= '${ngaybd}'";
            if($ngaykt == "") $qr.=" and ngaythem <= '${today}'";
            else if($ngaykt != "") $qr.=" and ngaythem <= '${ngaykt}'";
            else if($ngaybd == "" && $ngaykt == "") $qr.=" and ngaythem ='${today}'";
            $min = 0;
            $min=($page1-1) * $limit;
            $user = $Account->GetUserID($_SESSION['username']);
            if($row = mysqli_fetch_array($user)) {
                $userid = $row["userid"];
            }
            $qr.= " and userid = ${userid}";
            $qr1 = $qr;
            $qr.=" LIMIT ${min}, ${limit}";
            if($trangthai != "") {
                $page1 = intval($page1);
                $array = explode('/', $_SERVER['REQUEST_URI']);
                if(isset($array[2])) {
                    $page = substr($array[2],0,-10);
                }
                if($page != 1) header("Location: /StaffData?trangthai=${trangthai}&cmnd=${cmnd}&sodt=${sodt}&ngaybd=${ngaybd}&ngaykt=${ngaykt}");
                $data = mysqli_fetch_all($Customer->Query($qr));
                $rows = mysqli_fetch_array($Customer->Query(str_replace('SELECT *','SELECT count(customerid)', $qr1)));
                $rowsnum = $rows["count(customerid)"];
                $view = $this->view("Layout1",__CLASS__, [
                    "Page" => "staffdata",
                    "Customer" => $data,
                    "Numrows" => $rowsnum,
                    "Pagenum" => $page1,
                    "Trangthai" => $trangthai,
                    "Hoten" => $hoten,
                    "Cmnd" => $cmnd,
                    "Sodt" => $sodt,
                    "Ngaybd" => $ngaybd,
                    "Ngaykt" => $ngaykt
                    ]);
                echo $view;
                die;
            }
            // Không Lọc
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
        function DataEntry($customerid=null, $param=null,$DauSo=null) {
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
                        $user = $Account->GetUserID($_SESSION['username']);
                        if($row = mysqli_fetch_array($user)) {
                            $userid_account = $row["userid"];
                        }
                        // $data = mysqli_fetch_all($Customer->GetCustomerForCustomerID($customerid));
                        // $view = $this->view("Layout1", __CLASS__, [
                        //     "Page" => "dataentry",
                        //     "Customer" => $data,
                        // ]);
                        // echo $view;
                    }
                    if($_SESSION['role'] != 'admin') die;
                }
                if($param == "Update") $this->Update($customerid, $userid_customer);
                
                    $data = mysqli_fetch_all($Customer->GetCustomerForCustomerID($customerid));
                
                $view = $this->view("Layout1", __CLASS__, [
                    "Page" => "dataentry",
                    "Customer" => $data,
                    "DauSo"=>isset($_POST["DauSo"])?$_POST["DauSo"]:"",
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
                $sotk = $_POST['sotaikhoan'];
                $diachi = $_POST['diachi'];
                $ngayhen =  date('Y-m-d H:i:s', strtotime($ngayhen));
                $ngaygoi = date("Y-m-d");
                $qr = "UPDATE CRM_customers";
                if($trangthai=="cnc") {
                    $qr.="  set trangthai='cnc'";
                    if(strlen($hanmuc) == 0) {
                        $qr.=", hanmuc=NULL";
                    }
                    else {
                        $qr.=", hanmuc='${hanmuc}'";
                    }
                    if(strlen($ngayhen) ==0) {
                        $qr.=", ngayhen=NULL";
                    }
                    else {
                        $qr.=", ngayhen='${ngayhen}'";
                    }
                    if(strlen($sotien) ==0) {
                        $qr.=", sotien=NULL";
                    }
                    else {
                        $qr.=", sotien='${sotien}'";
                    }
                    $qr.=" , hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', ghichu='${ghichu}', sotk='${sotk}', diachi='${diachi}', ngaygoi='${ngaygoi}'";
                    $qr.=" where customerid=${customerid}";
                    $Customer->Query($qr);
                    // $Customer->UpdateCustomerCNC($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $sotien, $sotk, $diachi, $ngaygoi);
                }
                if($trangthai=="knc") {
                    $qr.="  set trangthai='knc'";
                    if(strlen($hanmuc) == 0) {
                        $qr.=", hanmuc=NULL";
                    }
                    else {
                        $qr.=", hanmuc='${hanmuc}'";
                    }
                    if(strlen($ngayhen) ==0) {
                        $qr.=", ngayhen=NULL";
                    }
                    else {
                        $qr.=", ngayhen='${ngayhen}'";
                    }
                    if(strlen($sotien) ==0) {
                        $qr.=", sotien=NULL";
                    }
                    else {
                        $qr.=", sotien='${sotien}'";
                    }
                    $qr.=" , hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', ghichu='${ghichu}', sotk='${sotk}', diachi='${diachi}', ngaygoi='${ngaygoi}'";
                    $qr.=" where customerid=${customerid}";
                    $Customer->Query($qr);
                    //$Customer->UpdateCustomerKNC($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $sotk, $diachi, $ngaygoi);
                }
                if($trangthai == 'kbm') {
                    $qr.="  set trangthai='kbm'";
                    if(strlen($hanmuc) == 0) {
                        $qr.=", hanmuc=NULL";
                    }
                    else {
                        $qr.=", hanmuc='${hanmuc}'";
                    }
                    if(strlen($ngayhen) ==0) {
                        $qr.=", ngayhen=NULL";
                    }
                    else {
                        $ngayhen1 = date("Y-m-d");
                        $tomorrow = date('Y-m-d', strtotime($ngayhen1 . "+3 days"));
                        $qr.=", ngayhen='${tomorrow}'";
                    }
                    if(strlen($sotien) ==0) {
                        $qr.=", sotien=NULL";
                    }
                    else {
                        $qr.=", sotien='${sotien}'";
                    }
                    $qr.=" , hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', ghichu='${ghichu}', sotk='${sotk}', diachi='${diachi}', ngaygoi='${ngaygoi}'";
                    $qr.=" where customerid=${customerid}";
                    $Customer->Query($qr);
                    //$Customer->UpdateCustomerKBM($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $tomorrow, $sotk, $diachi, $ngaygoi);
                }
                if($trangthai== 'hgl') {
                    $qr.="  set trangthai='hgl'";
                    if(strlen($hanmuc) == 0) {
                        $qr.=", hanmuc=NULL";
                    }
                    else {
                        $qr.=", hanmuc='${hanmuc}'";
                    }
                    if(strlen($ngayhen) ==0) {
                        // $qr.=", ngayhen=NULL";
                    }
                    else {
                        $qr.=", ngayhen='${ngayhen}'";
                    }
                    if(strlen($sotien) ==0) {
                        $qr.=", sotien=NULL";
                    }
                    else {
                        $qr.=", sotien='${sotien}'";
                    }
                    $qr.=" , hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', ghichu='${ghichu}', sotk='${sotk}', diachi='${diachi}', ngaygoi='${ngaygoi}'";
                    $qr.=" where customerid=${customerid}";
                    $Customer->Query($qr);
                    //$Customer->UpdateCustomerHGL($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $ngayhen, $sotk, $diachi, $ngaygoi);
                }
                if($trangthai == "khac") {
                    $qr.="  set trangthai='khac'";
                    if(strlen($hanmuc) == 0) {
                        $qr.=", hanmuc=NULL";
                    }
                    else {
                        $qr.=", hanmuc='${hanmuc}'";
                    }
                    if(strlen($ngayhen) ==0) {
                        $qr.=", ngayhen=NULL";
                    }
                    else {
                        $qr.=", ngayhen='${ngayhen}'";
                    }
                    if(strlen($sotien) ==0) {
                        $qr.=", sotien=NULL";
                    }
                    else {
                        $qr.=", sotien='${sotien}'";
                    }
                    $qr.=" , hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', ghichu='${ghichu}', sotk='${sotk}', diachi='${diachi}', ngaygoi='${ngaygoi}'";
                    $qr.=" where customerid=${customerid}";
                    $Customer->Query($qr);
                }
                if($trangthai == "chui") {
                    $qr.="  set trangthai='chui'";
                    if(strlen($hanmuc) == 0) {
                        $qr.=", hanmuc=NULL";
                    }
                    else {
                        $qr.=", hanmuc='${hanmuc}'";
                    }
                    if(strlen($ngayhen) ==0) {
                        $qr.=", ngayhen=NULL";
                    }
                    else {
                        $qr.=", ngayhen='${ngayhen}'";
                    }
                    if(strlen($sotien) ==0) {
                        $qr.=", sotien=NULL";
                    }
                    else {
                        $qr.=", sotien='${sotien}'";
                    }
                    $qr.=" , hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', ghichu='${ghichu}', sotk='${sotk}', diachi='${diachi}', ngaygoi='${ngaygoi}'";
                    $qr.=" where customerid=${customerid}";
                    $Customer->Query($qr);
                }
                // else {
                //     $Customer->UpdateCustomerTrangThai($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $sotk, $diachi, $ngaygoi);
                // }
                
            }
           // if($_SESSION['role'] == "nhanvien") {
           
                $qr = "SELECT * FROM CRM_customers where userid = ${userid} and trangthai IN ('hgl', 'kbm')  and ngayhen < NOW()  ";
                
                $qr.=" order by customerid asc LIMIT 1";
                //echo $qr; die;
                $data = mysqli_fetch_all($Customer->Query($qr));

                if($data == null) {
                    $qr="SELECT * FROM CRM_customers where userid = ${userid} and (trangthai is null)";
                    if(isset($_POST['DauSo'])){
                        $DauSo = $_POST['DauSo'];
                       // echo $DauSo;die;
                        $phonearr =explode(",", $DauSo);
                        if(count($phonearr) >0){
                            $phone=$phonearr[0];


                            $qr.= " and ( sodt like '".$phone ."%'";
                        }
                        foreach($phonearr as $phone) {
                        if($phone!=null && $phone!="")
                            $qr.= " or sodt like '".$phone ."%'";

                       
                        }
                         $qr.=") ";
                    }
                     $qr.=" order by customerid asc LIMIT 1";
                    // echo $qr;die;
                     $data = mysqli_fetch_all($Customer->Query($qr));
                    if($data == null) {
                        header("Location: /Customers");
                    }
                }
                
           // }
            // else if($_SESSION['role'] == "admin") {
            //     $qr = "SELECT * FROM CRM_customers where userid = ${userid} and (trangthai IN ('hgl', 'kbm') OR trangthai IS NULL) and (ngayhen <= NOW() and ngayhen > CURDATE()) LIMIT 1";
            //     $data = mysqli_fetch_all($Customer->Query($qr));
            //     if($data == null) {
            //         $data = mysqli_fetch_all($Customer->GetCustomerForCustomerID_LIMIT($userid));
            //         if($data == null) {
            //             header("Location: /Customers");
            //         }
            //     }
            //     // $data = mysqli_fetch_all($Customer->GetCustomerTrangThaiNULL_LIMIT());
            //     // if($data == null) {
            //     //     header("Location: /Customers");
            //     // }
            // }
            foreach($data as $row) {
                if(isset($row[0])) {
                    $url="/StaffData/DataEntry/${row[0]}&dauso=${DauSo}";
                    header("Location:".$url);
                }
            }
        }
    }
?>