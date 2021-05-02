
<div class="container-fluid mt-2">
    <div class="card" style="width:29rem">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">HOME -> STAFF DATA -> DATA ENTRY</h6>
        </div>
        <div class="card-body">
        <?php
            foreach($data["Customer"] as $row) {
                $hoten = $row[1];
                $cmnd = $row[2];
                $sodt = $row[3];
                $hanmuc = $row[4];
            }
        ?>
            <form method="GET" id="update" name="update">
                <div class="mb-1">
                    <label for="hoten" class="form-label">Họ và tên: </label>
                    <input type="text" class="form-control" id="hoten" name="hoten" value="<?php echo $hoten; ?>">
                </div>
                <div class="mb-1">
                    <label for="cmnd" class="form-label">CMND: </label>
                    <input type="text" class="form-control" id="cmnd" name="cmnd" value="<?php echo $cmnd; ?>">
                </div>
                <div class="row mb-1">
                    <label for="sodt" class="form-label">Số điện thoại: </label>
                    <div class="d-flex justify-content-between">
                        <input type="text" class="form-control" id="sodt" name="sodt" value="<?php echo $sodt; ?>">
                        <a href="tel:<?php echo $sodt; ?>" type="button" class="btn btn-success" style="margin-left: 10px">Gọi</a>
                    </div>
                </div>
                <div class="mb-1">
                    <label for="hanmuc" class="form-label">Hạn mức: </label>
                    <input type="text" class="form-control" id="hanmuc" name="hanmuc" value="<?php echo $hanmuc; ?>">
                </div>
                <div class="mb-1">
                    <label for="sotien" class="form-label">Số tiền: </label>
                    <input type="text" class="form-control" id="sotien" name="sotien">
                </div>
                <div class="row mb-1">
                    <label for="ngayhen" class="form-label">Hẹn gọi lại: </label>
                    <div class="d-flex justify-content-between">
                        <input type="datetime-local" class="form-control datepicker" id="ngayhen" name="ngayhen">
                        <button id="clear" style="margin-left: 10px" class="btn btn-success">Clear</button>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="d-flex">
                        <div class="p-2">
                            <input type="checkbox" class="form-check-input" id="checknhucau" name="checknhucau">
                            <label class="form-check-label" for="checknhucau">Có nhu cầu</label>
                        </div>
                        <div class="p-2">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Không nhu cầu</label>
                        </div>
                        <div class="p-2">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Không bắt máy</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="d-flex">
                        <div class="p-2">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Hẹn gọi lại</label>
                        </div>
                        <div class="p-2">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Chửi</label>
                        </div>
                        <div class="p-2">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Khác</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mt-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="ghichu" name="ghichu"></textarea>
                    <label for="ghichu">Ghi chú</label>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let value = document.getElementById('hanmuc');
    let format = value.value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    value.value = format;

    document.addEventListener('DOMContentLoaded', (event) => {
        $(document).ready(function(){
            $("#update").on("click", "input#checknhucau", function(){
                let hanmuc = document.getElementById("hanmuc");
                let convert = hanmuc.value.replaceAll(',', '');
                hanmuc.value = convert;
                $("#update").submit();
            });
            $("#clear").click(function(e) {
                e.preventDefault();
                document.getElementById("ngayhen").value = "";
            })
        });
        
    })
    
</script>

