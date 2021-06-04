<?php
    class Login extends Controller{
        function Index() {
            if(isset($_SESSION['role'])) {
                header("Location: /Customers");
            }
            $view = $this->view("Layout2", __CLASS__, [
                "Page" => "login",
            ]);
            echo $view;
            
        }
        function Confirm() {
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $Account = $this->model("AccountModel");
                $username = $_POST['username'];
                $password = $_POST['password'];
                $data = $Account->GetAccount($username, $password);
                if(mysqli_num_rows($data)>0)
                {
                    while($row = mysqli_fetch_array($data))
                    {
                        $_SESSION['role'] = $row["role"];
                    }
                    $_SESSION['username'] = $username;
                    echo "successfuly";

                }
                else {
                    echo "failed";
                }
            }
        }
    }
?>