<?php
    class ChangePassword extends Controller{
        function Index(){
            $view = $this->view("Layout3",__CLASS__, [
                "Page" => "changepass"
            ]);
            echo $view;
        }

        function Confirm() {
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $Account = $this->model("AccountModel");
                $username = $_SESSION['username'];
                $passcu = $_POST['oldpass'];
                $passmoi = $_POST['newpass'];
                $data = $Account->GetAccount($username, $passcu);
                if(!mysqli_num_rows($data)>0)
                {
                    echo "failed";
                }
                else {
                    $Account->UpdatePassword($username, $passmoi);
                    echo "successfuly";
                }
            }
        }
    }
?>