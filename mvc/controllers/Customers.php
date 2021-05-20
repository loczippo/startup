<?php
    class Customers extends Controller{
        
        function Index() {
           
            if(!isset($_SESSION['role'])) die;
            
            $role=$_SESSION['role'];
            $Customer = $this->model("CustomerModel");
            $Account = $this->model("AccountModel");
            $NhanVienList = mysqli_fetch_all($Account->GetAllAccount());
            $user = $Account->GetUserID($_SESSION['username']);
            if($row = mysqli_fetch_array($user)) {
                $curentuserid = $row["userid"];
            }
            $query="WHERE 1 ";
            $userid="";
            if($role=="nhanvien")
                $userid=$curentuserid;
            else{
                $quserid=$this->getQueryParam("userid");
                if($quserid!="")
                    $userid=$quserid;
                else
                    $userid='all';
            
            }
            if($userid!="all"){
                $query.=" and c.userid=".$userid ;
            }
            $trangthai=$this->getQueryParam("trangthai");
            if($trangthai==""){
                $trangthai="new";
            }
            if($trangthai!="all" && $trangthai!="new"){
                $query.=" and trangthai='".$trangthai."'" ;
            }
            if($trangthai=="new"){
                $query.=" and trangthai is null" ;
            }
            $cmnd=$this->getQueryParam("cmnd");
            if($cmnd != "") $query.=" and cmnd='${cmnd}'";
            $sodt=$this->getQueryParam("sodt");
            if($sodt != "") $query.=" and cmnd='${sodt}'";
            $ngaybd=$this->getQueryParam('ngaybd');

            $ngaykt=$this->getQueryParam('Ngaykt');
            $today = date("Y-m-d");
            if($ngaybd == "") $query.=" and ngaythem >= '${today}'";
            else $query.=" and ngaythem >= '${ngaybd}'";
            if($ngaykt == "") $query.=" and ngaythem <= '${today}'";
            else if($ngaykt != "") $query.=" and ngaythem <= '${ngaykt}'";
            else if($ngaybd == "" && $ngaykt == "") $query.=" and ngaythem ='${today}'";

            $page=$this->getQueryParam("page");
            if($page==""){
                $page=1;
            }
            $limit=$this->getQueryParam("limit");
            if($limit==""){
                $limit=10;
            }
            
            $totalrows= mysqli_fetch_array($Customer->Query("SELECT count(customerid) from CRM_customers c ".$query));
            $min = 0;
            $min=($page-1) * $limit;
            $query.=" LIMIT ${min}, ${limit}";
            $data = mysqli_fetch_all($Customer->Query("SELECT customerid, hoten,cmnd,sodt,hanmuc,trangthai, ghichu,sotien,ngayhen, ngaygoi, username from CRM_customers c left join CRM_accounts a on c.userid=a.userid  ".$query));
           // echo $totalrows[0];
            $view = $this->view("LayoutBinh", __CLASS__, [
                "View" => "Index",
                "Controller"=> "Customer",
                "Trangthai"=>$trangthai,
                "Cmnd"=>$cmnd,
                "Sodt"=>$sodt,
                "Ngaybd"=>$ngaybd,
                "Ngaykt"=>$ngaykt,

                "Userid"=>$userid,
                "NhanVienList" => $NhanVienList,
                "page"=>$page,
                "limit"=>$limit,
                "Totalrows"=>$totalrows[0],
                "Customers" => $data,
                "Role"=>$role,
            ]);
            echo $view;
        }
        function Import() {
            if(!isset($_SESSION['role'])) die;
            
            $Account = $this->model("AccountModel");
            $role=$_SESSION['role'];
            $user = $Account->GetUserID($_SESSION['username']);
            if($row = mysqli_fetch_array($user)) {
                $curentuserid = $row["userid"];
            }
            if($role == "admin") $data = mysqli_fetch_all($Account->GetNhanVien());
            if($role == "nhanvien") $data = mysqli_fetch_all($Account->GetAccountInUserID($curentuserid));
            $view = $this->view("LayoutBinh",__CLASS__, [
                "Controller" => "Customer",
                "View" => "import",
                "NhanvienList" => $data,
                "Role"=>$role,
                "Userid"=>$curentuserid,
            ]);
       
            echo $view;
        }
        
        
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
        function DeleteMany(){
             if(!isset($_SESSION['role'])) die;
            if($_SESSION['role'] != "admin") die;
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['customerIds'])) {
                $Customer = $this->model("CustomerModel");
                $customerIdsarr =explode(",", $_POST['customerIds']);
                foreach($customerIdsarr as $customerid) {
                    if($customerid!=null && $customerid!="")
                        $Customer->DeleteCustomer( $customerid);
                }
                echo "successfuly";
            }
        }
        
    }
?>