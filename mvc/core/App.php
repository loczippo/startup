<?php
    class App{
        // set default mvc
        protected $controller="Home";
        protected $action="Index";
        protected $params=[];

        // hàm tự chạy
        function __construct(){
            $arr = $this->urlProcess();
            // print_r($arr);

            // xử lý controllers
            // file_exits kiểm tra file có tồn tại không
            if(isset($arr[0])) {
                if( file_exists("./mvc/controllers/".$arr[0].".php") ){
                    $this->controller = $arr[0];
                    // hủy kết quả sau khi lấy
                    unset($arr[0]);
                }
            }
            require_once("./mvc/controllers/".$this->controller.".php");
            // xử lý actional
            // isset kiểm tra có tồn tại không
            if( isset($arr[1]) ){
                // method_exists kiểm tra phương thức có tồn tại trong controller không
                if( method_exists($this->controller, $arr[1]) ){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            
            // xử lý params
            $this->params = $arr?array_values($arr):[];

            // khởi tạo đối tượng cho controller nếu không phải thêm static ở trước function
            $this->controller = new $this->controller;
            // truyền params vào controllers->action
            call_user_func_array([$this->controller, $this->action], $this->params);
        }

        // xử lý url
        function urlProcess() {
            if( isset( $_GET["page"]) ){
                // trim xóa khoảng trắng, filter_var xóa kí tự đặc biệt
                $string = filter_var(trim( $_GET["page"], "/"));
                // explode cắt chuỗi theo dấu / và trả về 1 array
                return explode("/", $string);
            }
        }
    }
?>