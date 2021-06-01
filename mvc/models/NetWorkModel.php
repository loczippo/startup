<?php
class NetWorkModel extends Database {
	public function GetAll() {
            $qr = "SELECT * FROM networks";
            return mysqli_query($this->connection, $qr);
        }
        public function Update($Id, $Ten,$DayDauSo){
        	 $qr = "UPDATE networks set `Ten` = '$Ten',`DayDauSo`='$DayDauSo' where `Id` = $Id";
             echo $qr;
            return mysqli_query($this->connection, $qr);
        }
        public function Delete($Id){
        	 $qr = "DELETE FROM networks where Id = $Id";
            return mysqli_query($this->connection, $qr);
        }
        public function Insert($Id, $Ten,$DayDauSo){
        	 $qr = "INSERT INTO networks(`Ten`,`DayDauSo`) VALUES(`$Ten`,`$DayDauSo`)";
            return mysqli_query($this->connection, $qr);
        }
}

?>