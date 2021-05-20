<link rel="stylesheet" href="public/css/style.css">
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
				</div>

				<form id="login" class="login100-form validate-form" method="POST" action="Login/Confirm">
					<h3 class="login100-form-title">
						ĐĂNG NHẬP
					</h3>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Tên tài khoản" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="login-submit">
							ĐĂNG NHẬP
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
                url: '/Login/Confirm',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if(data == 'failed') {
                        sweetalert2('Oops!','Tài khoản hoặc mật khẩu không đúng','error','OKAY');
                    }
                    else {
                        location.href = "/Home";
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
            })
        }
    })
</script>