<div class="container-fluid mt-4">
    <form id="changepass" method="POST">
        <div class="mb-3">
            <label for="oldpass" class="form-label">Mật khẩu cũ:</label>
            <input type="password" class="form-control" id="oldpass" name="oldpass" style="width: 300px" required>
            <div id="oldpassHelp" class="form-text">Vui lòng nhập đúng mật khẩu.</div>
        </div>
        <div class="mb-3">
            <label for="newpass" class="form-label">Mật khẩu mới:</label>
            <input type="password" class="form-control" id="newpass" name="newpass" style="width: 300px" required>
            <div id="oldpassHelp" class="form-text">Đừng bao giờ quên mật khẩu của mình nhé.</div>
        </div>
        <button type="submit" class="btn btn-success">Change</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("form#changepass").submit(function(e) {
            e.preventDefault();    
            var formData = new FormData(this);
            $.ajax({
                url: '/ChangePassword/Confirm',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if(data == 'successfuly') {
                        sweetalert2('Successfully','Đổi mật khẩu thành công','success','HAPPY');
                    }
                    else {
                        sweetalert2('Oops!','Mật khẩu cũ không đúng','error','OKAY');
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