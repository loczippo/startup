
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">HOME -> ADMIN PANEL -> INSERT DATA</h6>
        </div>
        <form method="POST" name="upload" id="upload" enctype="multipart/form-data">
            <div class="card-body">
                <h5 class="card-title">Insert Data Into Database</h5>
                <p><input type="file" id="file" name="file" accept=".xlsx, .xls" class="form-control"/></p>
                <div class="form-floating" style="<?php echo $_SESSION['role']=="nhanvien"?"display:none":""; ?>">
                    <select class="form-select" id="username" name="username">
                        <?php
                            foreach($data["Nhanvien"] as $row) {
                                echo "<option value='${row[0]}'>${row[1]}</option>";
                            }
                            
                        ?>
                    </select>
                    <label for="username">Chọn một nhân viên</label>
                </div>
                <button class="btn btn-success mt-2">Thêm dữ liệu</button>
            </div>
        </form>
    </div>
    <!-- <div class="card mt-3">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">HOME -> ADMIN PANEL ->HAND OVER WORK</h6>
        </div>
        <form method="POST" action="Upload" name="handing" id="handing">
            <div class="card-body">
                <h5 class="card-title">Bàn giao công việc</h5>
                <div class="form-floating">
                    <select class="form-select" id="username" name="username">
                        <?php
                            // foreach($data["Nhanvien"] as $row) {
                            //     echo "<option value='${row[0]}'>${row[1]}</option>";
                            // }
                        ?>
                    </select>
                    <label for="username">Nhân viên muốn chuyển</label>
                </div>
                <div class="form-floating mt-3">
                    <select class="form-select" id="username-new" name="username-new">
                        <?php
                            // foreach($data["Nhanvien"] as $row) {
                            //     echo "<option value='${row[0]}'>${row[1]}</option>";
                            // }
                            
                        ?>
                    </select>
                    <label for="username">Sang cho</label>
                </div>
                <button class="btn btn-success mt-2">Chuyển</button>
            </div>
        </form>
    </div> -->
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    $("form#upload").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
        var a = window.performance.now();
        $.ajax({
            url: 'Upload',
            type: 'POST',
            data: formData,
            success: function (data) {
                if(data == 'successfuly') {
                    var b = window.performance.now();
                    var seconds = ((b-a) / 1000).toFixed(1);
                    sweetalert2('Successfully','Insert dữ liệu thành công trong '+seconds+' giây','success','HAPPY');
                }
                else {
                    sweetalert2('Oops!','Đã có lỗi xảy ra, vui lòng kiểm tra lại','error','OKAY');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    $("form#handing").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
        $.ajax({
            url: 'Upload',
            type: 'POST',
            data: formData,
            success: function (data) {
                if(data == 'successfuly') {
                    sweetalert2('Successfuly','Chuyển dữ liệu sang thành công','success','HAPPY');
                }
                else {
                    sweetalert2('Oops!','Đã có lỗi xảy ra, vui lòng kiểm tra lại','error','OKAY');
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
});
</script>
