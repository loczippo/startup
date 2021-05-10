
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">HOME -> STAFF DATA</h6>
        </div>
        <div class="card-body">
        <?php
            if($_SESSION['role'] != "admin") {
                foreach($data["Customer"] as $row) {
                    if($row == "") {
                        break;
                    }
                    
                    if($row[5] == NULL) {
                        echo "<a href='StaffData/DataEntry/${row[0]}' class='btn btn-success' type='button'>Nhập Data</a>";
                        break;
                    }
                }
            }
            if($_SESSION['role'] == "admin") {
                echo "<div class='d-flex'>";
                echo "<div>";
                    echo "<form method='POST' action=''>
                    <div class='form-floating'>
                    <select style='width: 200px' class='form-select' id='trangthai' name='trangthai'>
                        <option value='Tất cả'>Tất cả</option>
                        <option value='Có nhu cầu'>Có nhu cầu</option>
                        <option value='Không bắt máy'>Không bắt máy</option>
                        <option value='Hẹn gọi lại'>Hẹn gọi lại</option>
                        <option value='Khác'>Khác</option>
                        <option value='Chửi'>Chửi</option>
                    </select>
                    <label for='trangthai'>Trạng thái</label>
                    </div>
                    <button type='submit' class='btn btn-success mt-1'>Lọc</button>
                    </form>";
                echo "</div>";
                echo "<div style='margin-left:10px'>";
                    echo "<form method='POST' action='' name='handing' id='handing'>
                    <div class='form-floating'>
                    <select style='width: 220px' class='form-select' id='uid' name='uid'>";
                        foreach($data["Nhanvien"] as $row) {
                            echo "<option value='${row[0]}'>${row[1]}</option>";
                        }
                    echo "</select>
                    <label for='trangthai'>Chọn NV muốn chuyển</label>
                    </div>
                    <button type='submit' id='checkall-btn-submit' class='btn btn-success mt-1' disabled>Chuyển</button>
                    <br/>
                    ";
                echo "</div>";
                echo "</div>";
                echo "<input style='' class='mt-4' type='checkbox' id='checkbox-all'/> Chọn tất cả";                    
                echo "<input type='text' id='myInput' class='form-control' style='width: 200px'>";
            }
            else {
                echo "<input type='text' id='myInput' class='form-control mt-3' style='width: 200px'>";
            }
        ?>
        
        <div class="table-responsive-sm">
        <table class="table table-sm mb-3 mx-auto table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">CMND</th>
                <th scope="col">Số điện thoại</th>
                <!-- <th scope="col">Hạn mức</th> -->
                <th scope="col">Trạng thái</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id='myTable'>
                <?php
                    function formatMoney($number, $fractional=false) {  
                        if ($fractional) {  
                            $number = sprintf('%.2f', $number);  
                        }  
                        while (true) {  
                            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
                            if ($replaced != $number) {  
                                $number = $replaced;  
                            } else {  
                                break;  
                            }  
                        }  
                        return $number;
                    }
                    $i=1;
                    $count=0;
                    foreach($data["Customer"] as $row) {
                        $money = formatMoney($row[4]);
                        $ngayhen = $row[8];
                        $today = date("Y-m-d H:i:s");
                        if($_SESSION['role'] != "admin") {
                            if($row[5] == "Không nhu cầu" || $row[5] == "Có nhu cầu" || $row[5] == "Khác" || $row[5] == "Chửi") {
                                continue;
                            }
                            if($ngayhen != NULL) {
                                if(($ngayhen>$today)) {
                                    continue;
                                }
                            }
                        }
                        echo "<tr>";
                        if($_SESSION['role'] == "admin") {
                            echo "<th><input type='checkbox' name='customerIds[]' value='${row[0]}'/>${i}</th>";
                        }
                        else {
                            echo "<th>${i}</th>";
                        }
                        echo "<td>${row[1]}</td>";
                        echo "<td>${row[2]}</td>";
                        echo "<td>${row[3]}</td>";
                        if($row[5] == NULL)
                        {
                            $status="Chưa cập nhật";
                            echo "<td>${status}</td>";
                        } 
                        else {
                            echo "<td>${row[5]}</td>";
                        }
                        echo "<td><a href='StaffData/DataEntry/${row[0]}' class='btn btn-success' type='button'>Nhập</a></td>";
                        echo "</tr>";
                        $i++;
                        $count++;
                    }
                    if($data["Customer"] == null) {
                        echo "<tr><td  class='text-center' colspan='6'>Không có data nào dành cho bạn</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <span>
                    <?php
                        if($_SESSION['role'] == "admin") {
                            //echo "Tổng cộng có <b>${count}</b> bản ghi";
                        }
                    ?>
            </span>
        <?php echo "</form>"; ?>
        </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxAll = $('#checkbox-all');
        var checkAllSubmitBtn = $('#checkall-btn-submit');
        var customerItemCheckbox = $('input[name="customerIds[]"]')
        //console.log(customerItemCheckbox)
        // check click
        checkboxAll.change(function() {
            var isCheckedAll = $(this).prop('checked');
            customerItemCheckbox.prop('checked', isCheckedAll);
            RenderButtonChuyen();
        })
        customerItemCheckbox.change(function() {
            var isCheckedAll = customerItemCheckbox.length === $('input[name="customerIds[]"]:checked').length;
            checkboxAll.prop('checked', isCheckedAll);
            RenderButtonChuyen();
        })
        function RenderButtonChuyen() {
            var checkedCount = $('input[name="customerIds[]"]:checked').length;
            if(checkedCount >0) {
                checkAllSubmitBtn.attr('disabled', false);
            }
            else {
                checkAllSubmitBtn.attr('disabled', true);
            }
        }
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $("form#handing").submit(function(e) {
                e.preventDefault();    
                var formData = new FormData(this);
                $.ajax({
                    url: '',
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
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                })
            }
        });
    })
</script>

