<?php
    class CustomerModel extends Database {
        
        public function GetCustomer($userid) {
            $qr = "SELECT * FROM customers where trangthai IS NULL and ghichu IS NULL and sotien IS NULL and ngayhen IS NULL and ngaygoi IS NULL and userid = '${userid}'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomerForCustomerID($customerID) {
            $qr = "SELECT * FROM customers where trangthai IS NULL and ghichu IS NULL and sotien IS NULL and ngayhen IS NULL and ngaygoi IS NULL and customerid = '${customerID}'";
            return mysqli_query($this->connection, $qr);
        }
        public function InsertCustomer($hoten, $cmnd, $sodt, $hanmuc, $userid) {
            $qr = "INSERT INTO customers(hoten, cmnd, sodt, hanmuc, userid) values ('${hoten}', '${cmnd}', '${sodt}', ${hanmuc}, ${userid})";
            return mysqli_query($this->connection, $qr);
        }
        public function GetCustomerIDForUserID($userid) {
            $qr = "SELECT * FROM customers where trangthai IS NULL and ghichu IS NULL and sotien IS NULL and ngayhen IS NULL and ngaygoi IS NULL and userid = '${userid}'";
            return mysqli_query($this->connection, $qr);
        }
        public function UpdateUseridInCustomer($userid, $customerid) {
            $qr = "UPDATE customers set userid = $userid where customerid = $customerid";
            return mysqli_query($this->connection, $qr);
        }
    }
?>