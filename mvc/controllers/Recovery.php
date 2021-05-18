<?php
    class Recovery extends Controller{
        function Index(){
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $Account = $this->model("AccountModel");
                $username = $_POST['username'];
                $password = $_POST['password'];
                $input = $_POST['captcha'];
                if($input != $_SESSION['captcha']) {
                    echo "saicaptcha";
                    die;
                }
                $qr = "SELECT * FROM CRM_accounts where username = '${username}'";
                $data = $Account -> Query($qr);
                // khong ton tai acc
                if($data->num_rows == 0) {
                    echo 'khongtontai';
                    die;
                }
                $qr = "UPDATE CRM_accounts SET password = '${password}' WHERE username='${username}'";
                $data = $Account -> Query($qr);
                echo 'successfuly';
                die;
            }
            $view = $this->view("Layout2", __CLASS__, [
                "Page" => "recovery",
            ]);
            echo $view;
        }
    }
?>