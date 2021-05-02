<?php
    class Login extends Controller{
        function Index() {
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['login-submit']))
            {
                $this->confirm($_POST['username'], $_POST['password']);
                die();
            }
            $view = $this->view("Layout1", __CLASS__, [
                "Page" => "login",
            ]);
            echo $view;
            
        }
        function confirm($username, $password) {
            $Account = $this->model("AccountModel");
            $data = $Account->GetAccount($username, $password);
            if(mysqli_num_rows($data)>0)
            {
                while($row = mysqli_fetch_array($data))
                {
                    $_SESSION['role'] = $row["role"];
                }
                $_SESSION['username'] = $username;
                header("Location: /Home");

            }
            else {
                $err = "Sai tên đăng nhập hoặc mật khẩu";
                $view = $this->view("Layout1", __CLASS__, [
                    "Page" => "login",
                    "Err" => $err
                ]);
                echo $view;
            }
        }
    }
?>