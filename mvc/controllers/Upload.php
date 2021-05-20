<?php
    class Upload extends Controller{
        function Index() {
            
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_FILES['file'])) {
                require_once 'PHPExcel/excel.php';
                $file = $_FILES['file']['tmp_name'];
                $excel = SimpleXLSX::parse($file);
                $i=0;
                $Customer = $this->model("CustomerModel");
                if($excel !== false) {
                    foreach($excel -> rows() as $key => $row) {
                        $q="";
                        foreach($row as $key => $cell) {
                            if($i==0) {
                                $q.=$cell. "varchar(50)";
                            }
                            else {
                                $q.=$cell. "|";
                            }
                        }
                        if($i !=0) {
                            // $data = $query = explode("|", $q);
                            // print_r ($data);
                            $index = strpos(rtrim($q,"|")," ")-5;
                            $query = substr(rtrim($q, "|"), $index);
                            $query = explode("|", $query);
                            $query[3] = str_replace(',','',$query[3]);
                            //echo $query[2][0] . $query[2][1] ."<br/>";
                            if($query[2][0] == 8 && $query[2][1] == 4) {
                                $query[2] = substr($query[2], 2);
                            }
                            if($query[2][0] != 0) {
                                $query[2] = "0" . $query[2];
                            }
                            $today = date("Y-m-d");
                            $Customer->InsertCustomer($query[0], $query[1], $query[2], $query[3], $today, $_POST['username']);
                        }
                        $i++;
                    }
                    echo "successfuly"; //success
                }
                else {
                    echo "failed"; //check dữ liệu k hợp lệ
                }
            }
            // // bàn giao
            // if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['username-new'])) {
            //     $Customer = $this->model("CustomerModel");
            //     $data = ($Customer->GetCustomerIDForUserID($_POST['username']));
            //     while($row = mysqli_fetch_array($data)) {
            //         ($Customer->UpdateUseridInCustomer($_POST['username-new'], $row["customerid"]));
            //     }
            //     echo "successfuly";
            // }
        }







        function Import() {
            //echo "import";
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_FILES['file'])) {
                require_once 'PHPExcel/excel.php';
                $file = $_FILES['file']['tmp_name'];
                $excel = SimpleXLSX::parse($file);
                $i=0;
                $Customer = $this->model("CustomerModel");
                $Role= $_SESSION['role'];
                //echo $Role;
                if($excel !== false) {
                    if($Role=="nhanvien"){
                        foreach($excel -> rows() as $key => $row) {
                           
                            $hoten=$row[0];
                            //echo $hoten." - ";
                            $cmnd=$row[1];
                            //echo $cmnd." - ";
                            $sodt=$row[2];
                            //echo $sodt." - ";
                            $hanmuc=$row[3];
                            
                            if(!isset($hanmuc)|| $hanmuc==" " || $hanmuc==''){
                             $hanmuc="null";
                            }
                            //echo $hanmuc." - ";
                             $sotk=$row[4];
                            
                            //echo $sotk." - ";
                              $DiaChi=$row[5];
                                
                             $today = date("Y-m-d");
                             $Customer->InsertCustomer($hoten, $cmnd, $sodt, $hanmuc, $today,$sotk,$DiaChi, $_POST['username']);
                             $i++;
                           
                        }
                    }
                    else{
                        $strUserIds=$_POST["UserIds"];
                       //echo $strUserIds;
                        $UserIds =explode(",", $strUserIds);
                        $iuser=0;
                        $usercount= count($UserIds);
                        if($usercount)
                        foreach($excel -> rows() as $key => $row) {
                            if($i!=0) {
                                $hoten=$row[0];
                                //echo $hoten." - ";
                                $cmnd=$row[1];
                                //echo $cmnd." - ";
                                $sodt=$row[2];
                                if($sodt==null || $sodt=="") continue;
                                //echo $sodt." - ";
                                $hanmuc=$row[3];
                                //echo $hanmuc." - ";
                                 $sotk=$row[4];
                                //echo $sotk." - ";
                                   $DiaChi=$row[5];
                                 //   echo $iuser."----------";
                                $today = date("Y-m-d");
                                $UserId=$UserIds[$iuser];
                                $Customer->InsertCustomer($hoten, $cmnd, $sodt, $hanmuc, $today,$sotk,$DiaChi, $UserId);
                                $iuser++;
                                if($iuser==$usercount) $iuser =0;
                                $i++;
                            }
                            $i++;
                           
                        }
                    }
                    echo "successfuly"; //success
                }
                else {
                    echo "failed"; //check dữ liệu k hợp lệ
                }
            }
            // bàn giao
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['username-new'])) {
                $Customer = $this->model("CustomerModel");
                $data = ($Customer->GetCustomerIDForUserID($_POST['username']));
                while($row = mysqli_fetch_array($data)) {
                    ($Customer->UpdateUseridInCustomer($_POST['username-new'], $row["customerid"]));
                }
                echo "successfuly";
            }
        }
    }
?>