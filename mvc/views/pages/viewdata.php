
<div class="container-fluid mt-3">
    <div class="card mt-3">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">HOME -> ADMIN PANEL -> DETAILS</h6>
        </div>
        <form method="POST" action="/PanelAdmin/ViewData" name="handing" id="handing">
            <div class="card-body">
                <h5 class="card-title">Chi tiết công việc</h5>
                <div class="form-floating">
                    <select class="form-select" id="username" name="username">
                        <?php
                            foreach($data["Nhanvien"] as $row) {
                                echo "<option value='${row[0]}'>${row[1]}</option>";
                            }
                        ?>
                    </select>
                    <label for="username">Nhân viên muốn hiển thị</label>
                </div>
                <button class="btn btn-success mt-2">Hiển thị</button>
            </div>
        </form>
    </div>
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
                    sweetalert2('Successfuly','Insert dữ liệu thành công trong '+seconds+' giây','success','HAPPY');
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
