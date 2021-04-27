<div class="container login-container">
            <div class="row">
                <div class="col-md-8 login-form-1">
                    <h3>Đăng nhập</h3>
                    <form method="post">
                        <?php
                            if(isset($data["Err"])) {
                                echo "<div class='alert alert-primary' role='alert'>
                                ${data['Err']}
                              </div>";
                            };
                        ?>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Mã giảng viên" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="gvsubmit" class="btnSubmit" value="Đăng nhập" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Quên mật khẩu?</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 login-form-2">
                    <h3>Nếu bạn là sinh viên</h3>
                    <form method="post" action="">
                    <?php
                            if(isset($data["Err1"])) {
                                echo "<div class='alert alert-primary' role='alert'>
                                ${data['Err1']}
                              </div>";
                            };
                        ?>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Mã số sinh viên" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="svsubmit" class="btnSubmit" value="Đăng nhập" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">Quên mật khẩu?</a>
                        </div>
                    </form>
            </div>
        </div>
</div>