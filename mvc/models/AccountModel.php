<?php
    class AccountModel extends Database {
        
        public function GetAccount($username, $password) {
            $qr = "SELECT * FROM accounts where username='${username}' AND password ='${password}'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetNhanVien() {
            $qr = "SELECT * FROM accounts where role = 'nhanvien'";
            return mysqli_query($this->connection, $qr);
        }
        public function GetUserID($username) {
            $qr = "SELECT userid FROM accounts where username = '${username}'";
            return mysqli_query($this->connection, $qr);
        }
    }
?>