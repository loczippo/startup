<?php
    class GiangVienModel extends Database {
        
        public function GetGV($username, $password) {
            $qr = "SELECT * FROM giangvien where magv='${username}' AND matkhau ='${password}'";
            return mysqli_query($this->connection, $qr);
        }
    }
?>