<?php
    class Login extends Controller{
        
        function Index(){
            if(isset($_SESSION["username"])) {
                header("Location: /Home");
                die;
            }
            // GV Login
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST['gvsubmit'])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $Account = $this->model("GiangVienModel");
                    $data = $Account->GetGV($username, $password);
                    if(mysqli_num_rows($data)>0) {
                        $_SESSION['username'] = $username;
                        header("Location: /Home");
                    }
                    else {
                        $err = "Sai tên đăng nhập hoặc mật khẩu";
                        $view = $this->view("Layout1", [
                            "Page" => "login",
                            "Err" => $err
                        ]);
                        echo $view;
                    }
                }
            }
            else {
                $view = $this->view("Layout1", [
                    "Page" => "login",
                ]);
                echo $view;
            }
            //SV Login
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_POST['svsubmit'])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $Account = $this->model("SinhVienModel");
                    $data = $Account->GetSV($username, $password);
                    if(mysqli_num_rows($data)>0) {
                        $_SESSION['username'] = $username;
                        header("Location: /Home");
                    }
                    else {
                        $err = "Sai tên đăng nhập hoặc mật khẩu";
                        $view = $this->view("Layout1", [
                            "Page" => "login",
                            "Err1" => $err
                        ]);
                        echo $view;
                    }
                }
            }
            else {
                $view = $this->view("Layout1", [
                    "Page" => "login",
                ]);
                echo $view;
            }
        }
        
        function Logout() {
            unset($_SESSION['username']);
            header("Location: /Home");
            die;
        }
    }
?>