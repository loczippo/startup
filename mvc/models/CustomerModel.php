<?php
    class CustomerModel extends Database {
        
        public function GetCustomer($userid) {
            $qr = "SELECT * FROM CRM_customers where userid = '${userid}' Order by ngayhen desc, trangthai asc";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomer1($userid) {
            $qr = "SELECT * FROM customers where userid = '${userid}'";
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
        public function InsertCustomer($hoten, $cmnd, $sodt, $hanmuc, $userid) {
            $qr = "INSERT INTO CRM_customers(hoten, cmnd, sodt, hanmuc, userid) values ('${hoten}', '${cmnd}', '${sodt}', ${hanmuc}, ${userid})";
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