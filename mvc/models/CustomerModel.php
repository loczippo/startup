<?php
    class CustomerModel extends Database {
        public function Query($qr) {
            return mysqli_query($this->connection, $qr);
        }
        public function SearchCustomer($trangthai, $hoten, $cmnd, $sodt, $userid, $ngaybd, $ngaykt, $min, $limit) {
            //nếu if ở đây bị lỗi, chưa có giải pháp
            $qr="SELECT * FROM CRM_customers where hoten LIKE '${hoten}%' LIMIT $min, $limit";
            return mysqli_query($this->connection, $qr);
            
        }
        public function GetCountSearch($trangthai, $hoten, $cmnd, $sodt, $userid, $ngaybd, $ngaykt) {
            $qr="SELECT count(customerid) FROM CRM_customers where hoten LIKE '%${hoten}%'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomer($userid, $min, $limit) {
            $qr = "SELECT * FROM CRM_customers where userid = ${userid} and (trangthai IN ('hgl', 'kbm') OR trangthai IS NULL) Order by ngayhen desc, trangthai asc LIMIT $min, $limit";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCountCustomerTrangThaiNULL($userid) {
            $qr = "SELECT count(customerid) FROM CRM_customers where userid = ${userid} and (trangthai IN ('hgl', 'kbm') OR trangthai IS NULL) Order by ngayhen desc, trangthai asc";
            return mysqli_query($this->connection, $qr);
        }
        public function GetAllCustomer($min, $limit) {
            $qr = "SELECT * FROM CRM_customers LIMIT $min, $limit";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCountCustomer() {
            $qr = "SELECT count(customerid) FROM CRM_customers";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomer1($userid) {
            $qr = "SELECT * FROM CRM_customers where userid = '${userid}'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomer2($userid, $trangthai) {
            $qr = "SELECT * FROM CRM_customers where userid = '${userid}' and trangthai ='${trangthai}'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomer3($userid) {
            $qr = "SELECT * FROM CRM_customers where userid = '${userid}' and trangthai IS NULL";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomer4($trangthai) {
            $qr = "SELECT * FROM CRM_customers where trangthai ='${trangthai}'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomerForCustomerID($customerID) {
            $qr = "SELECT * FROM CRM_customers where customerid = '${customerID}'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomerForCustomerID_LIMIT($userid) {
            $qr = "SELECT * FROM CRM_customers where userid = $userid and trangthai IS NULL LIMIT 1";
            return mysqli_query($this->connection, $qr);
        }
        public function InsertCustomer($hoten, $cmnd, $sodt, $hanmuc, $ngaythem, $userid) {
            $qr = "INSERT INTO CRM_customers(hoten, cmnd, sodt, hanmuc, ngaythem, userid) values ('${hoten}', '${cmnd}', '${sodt}', ${hanmuc}, '${ngaythem}', ${userid})";
            echo $qr;
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomerIDForUserID($userid) {
            $qr = "SELECT * FROM CRM_customers where trangthai IS NULL and ghichu IS NULL and sotien IS NULL and ngayhen IS NULL and ngaygoi IS NULL and userid = '${userid}'";
            return mysqli_query($this->connection, $qr);
        }
        public function UpdateUseridInCustomer($userid, $customerid) {
            $qr = "UPDATE CRM_customers set userid = $userid where customerid = $customerid";
            return mysqli_query($this->connection, $qr);
        }
        public function UpdateCustomerTrangThai($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $ngaygoi) {
            $qr = "UPDATE CRM_customers set hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', hanmuc='${hanmuc}', trangthai='${trangthai}', ghichu='${ghichu}', ngaygoi='${ngaygoi}' where customerid=${customerid}";
            return mysqli_query($this->connection, $qr);
        }
        public function UpdateCustomerCNC($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $sotien, $ngaygoi) {
            $qr = "UPDATE CRM_customers set hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', hanmuc='${hanmuc}', trangthai='${trangthai}', ghichu='${ghichu}', sotien='${sotien}', ngaygoi='${ngaygoi}', ngayhen=NULL where customerid=${customerid}";
            return mysqli_query($this->connection, $qr);
        }
        public function UpdateCustomerKNC($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $ngaygoi) {
            $qr = "UPDATE CRM_customers set hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', hanmuc='${hanmuc}', trangthai='${trangthai}', ghichu='${ghichu}', sotien=NULL, ngaygoi='${ngaygoi}', ngayhen=NULL where customerid=${customerid}";
            return mysqli_query($this->connection, $qr);
        }
        public function UpdateCustomerKBM($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $ngayhen, $ngaygoi) {
            $qr = "UPDATE CRM_customers set hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', hanmuc='${hanmuc}', trangthai='${trangthai}', ghichu='${ghichu}', ngayhen='${ngayhen}', ngaygoi='${ngaygoi}' where customerid=${customerid}";
            return mysqli_query($this->connection, $qr);
        }
        public function UpdateCustomerHGL($customerid, $hoten, $cmnd, $sodt, $hanmuc, $trangthai, $ghichu, $ngayhen, $ngaygoi) {
            $qr = "UPDATE CRM_customers set hoten = '${hoten}', cmnd='${cmnd}', sodt='${sodt}', hanmuc='${hanmuc}', trangthai='${trangthai}', ghichu='${ghichu}', ngayhen='${ngayhen}', ngaygoi='${ngaygoi}' where customerid=${customerid}";
            return mysqli_query($this->connection, $qr);
        }
    }
?>