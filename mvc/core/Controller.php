<?php
    class Controller {
        public function model($model) {
            require_once("./mvc/models/".$model.".php");
            return new $model;
        }
        public function view($view, $title, $data=[]) {
            $title = $title;
            require_once("./mvc/views/layouts/".$view.".php");
        }

        function getQueryParam($name){
            $url=$_SERVER["REQUEST_URI"];
            if(strpos($url, '?') == false) return "";
            $url= explode("?", $url)[1];
            $arr=explode("&", $url);
            foreach ($arr as $pairstr) {
                $pair=explode("=", $pairstr);
                if($pair[0]==$name){
                    return $pair[1];
                }
            }
            return "";
        }
    }
?>