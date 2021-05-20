
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">Trang chủ -> Quản lý nhân viên</h6>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success" href="/PanelAdmin/NewUser">Thêm tài khoản</a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                        foreach($data["Account"] as $row) {
                            echo "<tr>";
                            echo "<th>${i}</th>";
                            echo "<td>${row[1]}</td>";
                            if($row[3] == "admin") {
                                echo "<td>Admin</td>";
                                echo "<td><a href='PanelAdmin/ManageUser/${row[0]}?role=nhanvien' class='btn btn-success' type='button'>Xóa quyền Admin</a>
                                <a id='doimk' class='btn btn-info' data-toggle='modal' data-target='#changepassword' data-id='${row[1]}'>Đổi mật khẩu</a>
                                </td>";
                            }
                            else if($row[3] == "nhanvien") {
                                echo "<td>Nhân viên</td>";
                                echo "<td><a href='PanelAdmin/ManageUser/${row[0]}?role=admin' class='btn btn-success' type='button'>Cấp quyền Admin</a>
                                <a id='doimk' class='btn btn-info' data-toggle='modal' data-target='#changepassword' data-id='${row[1]}'>Đổi mật khẩu</a>
                                <a id='removeuser' class='btn btn-danger' data-toggle='modal' data-target='#xoanguoidung' data-id='${row[1]}'>Xóa</a>
                                </td>";
                            }
                            echo "</tr>";
                            $i++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .captcha100 {
	display: block;
  	width: 40%;
	font-size: 15px;
	border-radius: 25px;
}
.form-control {
    display: block !important;
    font-size: 15px !important; 
    width: 100%;
    height:50px;
	font-size: 15px;
}
</style>
<!-- Modal -->
<form id="doipass" action="/Recovery" method="POST">
    <div class="modal fade" id="changepassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Đổi mật khẩu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" id="username" name="username" value="" hidden>
            <input style="padding-left: 25px" type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới" required>
            <input style="padding-left: 25px" type="password" id="confirm_password" name="confirm_password" class="mt-2 form-control" placeholder="Nhập lại mật khẩu mới" required>
        </div>
        <div class="modal-footer">
            <button id="changepass" type="submit" class="btn btn-danger">Đổi</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
        </div>
    </div>
    </div>
</form>

<!-- Modal -->
<form id="xoa" action="/Recovery" method="POST">
    <div class="modal fade" id="xoanguoidung" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Xóa nhân viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" id="username1" name="username_remove" value="" hidden>
            <h6>Bạn có chắc muốn xóa nhân viên ra khỏi hệ thống không?</h6>
            <h6>Quá trình này không thể khôi phục</h6>
        </div>
        <div class="modal-footer">
            <button id="changepass" type="submit" class="btn btn-danger">Xóa</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
        </div>
    </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var courseID
        $('#changepassword').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            courseID = button.data('id')
            console.log(courseID);
        })
        $('#xoanguoidung').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            courseID = button.data('id')
            console.log(courseID);
        })
        $("form#xoa").submit(function(e) {  
            var formData = new FormData(this);
            document.getElementById("username1").value = courseID;
        })
        $("form#doipass").submit(function(e) {  
            var formData = new FormData(this);
            document.getElementById("username").value = courseID;
            var pass = document.getElementById("password");
            var nhaplaipass = document.getElementById("confirm_password");
            if(pass.value != nhaplaipass.value) {
                alert("2 mật khẩu không giống nhau");
                e.preventDefault();
            }
        })
})
</script>
