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

        
    }
?>