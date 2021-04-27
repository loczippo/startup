<?php
    class SinhVienModel extends Database {

        public function GetSV($username, $password) {
            $qr = "SELECT * FROM sinhvien where masv='${username}' AND matkhau ='${password}'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetSV1($username) {
            $qr = "SELECT * FROM sinhvien where masv='${username}'";
            return mysqli_query($this->connection, $qr);
        }
        public function getName() {
            return "Nguyen Van A";
        }
    }
?>