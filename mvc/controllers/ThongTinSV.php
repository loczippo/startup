<?php
    class ThongTinSV extends Controller{
        function API() {
            $ten = $this->model("SinhVienModel");
            $getInfo = $ten->getSV();
            $mang=[];
            while($row = mysqli_fetch_array($getInfo)) {
                array_push($mang, new SinhVien($row["id"],$row["hoten"],$row["namsinh"],$row["diachi"]));
            }
            $json = json_encode($mang, JSON_UNESCAPED_UNICODE);
            $json = str_replace( array('[', ']', '{','}', '$', '%') , '', $json );
            // $json = explode(",", $json); 
            echo $json;
        }
    }   
    class SinhVien {
        public $Id;
        public $Hoten;
        public $Namsinh;
        public $Diachi;
        public function __construct($id, $hoten, $namsinh, $diachi) {
            $this->Id = $id;
            $this->Hoten = $hoten;
            $this->Namsinh = $namsinh;
            $this->Diachi = $diachi;
        }
    }
?>