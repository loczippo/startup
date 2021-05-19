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
                            print_r ($cell);
                            if($i==0) {
                                $q.=$cell. "varchar(50)";
                            }
                            else {
                                $q.=$cell. "|";
                            }
                        }
                        //print_r ($q);
                        if($i !=0) {
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
            
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_FILES['file'])) {
                require_once 'PHPExcel/excel.php';
                $file = $_FILES['file']['tmp_name'];
                $excel = SimpleXLSX::parse($file);
                $i=0;
                $Customer = $this->model("CustomerModel");
                if($excel !== false) {
                    foreach($excel -> rows() as $key => $row) {
                        
                       $hoten=$row[0];
                       //echo $hoten." - ";
                       $cmnd=$row[1];
                       //echo $cmnd." - ";
                       $sodt=$row[2];
                       //echo $sodt." - ";
                       $hanmuc=$row[3];
                       //echo $hanmuc." - ";
                       $sotk=$row[4];
                       //echo $sotk." - ";
                           
                        $today = date("Y-m-d");
                        $Customer->InsertCustomer($hoten, $cmnd, $sodt, $hanmuc, $today, $_POST['username']);
                        $i++;
                       
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