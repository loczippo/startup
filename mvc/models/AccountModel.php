<?php
    class AccountModel extends Database {
        
        public function GetAccount($username, $password) {
            $qr = "SELECT * FROM CRM_accounts where username='${username}' AND password ='${password}'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetNhanVien() {
            $qr = "SELECT * FROM CRM_accounts where role = 'nhanvien'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetNhanVien1($userid) {
            $qr = "SELECT * FROM CRM_accounts where role = 'nhanvien' and userid not in ('${userid}')";
            return mysqli_query($this->connection, $qr);
        }
        public function GetUserID($username) {
            $qr = "SELECT userid FROM CRM_accounts where username = '${username}'";
            return mysqli_query($this->connection, $qr);
        }
    }
?>