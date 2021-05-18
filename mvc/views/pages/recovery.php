<link rel="stylesheet" href="public/css/style.css">
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
				</div>

				<form id="login" class="login100-form validate-form" method="POST" action="">
					<h3 class="login100-form-title">
						RECOVERY
					</h3>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Tên tài khoản" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu mới" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input d-flex justify-content-between">
						<input style="padding-left: 25px" class="input100" type="text" name="captcha" placeholder="Nhập mã captcha" required>
						<img class="captcha100" src="public/captcha/captcha.php" title="" alt="" width='80' />
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="login-submit">
							Khôi phục
						</button>
					</div>

					<div class="text-center p-t-12">
						
						<!-- <a class="txt2" href="/Recovery">
							Quên mật khẩu?
						</a> -->
					</div>

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("form#login").submit(function(e) {
            e.preventDefault();    
            var formData = new FormData(this);
            $.ajax({
                url: '/Recovery',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if(data == 'saicaptcha') {
                        sweetalert2('Oops!','Sai mã captcha','error','OKAY');
                    }
                    else if(data == 'khongtontai') {
                        sweetalert2('Oops!','Tên đăng nhập không tồn tại','error','OKAY');
                    }
					else if(data == 'successfuly') {
						sweetalert2('Successfully!','Khôi phục mật khẩu thành công','success','Đăng nhập');
					}
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        function sweetalert2(title, text, action, btn){
            Swal({
                title: title,
                text: text,
                type: action,
                confirmButtonText: btn
            }).then((result) => {
				location.href = "/Login";
			})
        }
    })
</script>