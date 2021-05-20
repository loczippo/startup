<div class="container-fluid mt-4">
    <form id="changepass" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Tên tài khoản:</label>
            <input type="text" class="form-control" id="username" name="username" style="width: 300px" required>
            <div id="oldpassHelp" class="form-text">Đừng quên các thông tin này.</div>
        </div>
        <div class="mb-3">
            <label for="oldpass" class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control" id="oldpass" name="oldpass" style="width: 300px" required>
            <div id="oldpassHelp" class="form-text">Đừng bao giờ quên mật khẩu của mình nhé.</div>
        </div>
        <div class="mb-3">
            <label for="newpass" class="form-label">Xác nhận mật khẩu:</label>
            <input type="password" class="form-control" id="newpass" name="newpass" style="width: 300px" required>
            <div id="oldpassHelp" class="form-text">2 mật khẩu phải trùng khớp với nhau.</div>
        </div>
        <button type="submit" class="btn btn-success">Đăng ký</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("form#changepass").submit(function(e) {
            e.preventDefault();    
            var formData = new FormData(this);
            $.ajax({
                url: '/PanelAdmin/NewUser',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if(data == 'successfuly') {
                        sweetalert2('Successfully','Thêm thành công','success','HAPPY');
                        
                    }
                    else if(data == 'failed') {
                        sweetalert2('Oops!','Tên tài khoản đã được sử dụng','error','OKAY');
                    }
                    else if(data == 'failed1') {
                        sweetalert2('Oops!','2 mật khẩu không giống nhau','error','OKAY');
                    }
                    else {
                        sweetalert2('Oops!','Thêm thất bại','error','OKAY');
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