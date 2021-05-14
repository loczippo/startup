
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">HOME -> STAFF DATA</h6>
        </div>
        <div class="card-body">
        <?php
            if($_SESSION['role'] == "nhanvien") {
                foreach($data["Customer"] as $row) {
                    if($row == "") {
                        break;
                    }
                    
                    if($row[5] == NULL) {
                        echo "<a href='StaffData/DataEntry/${row[0]}' class='btn btn-success mb-2' type='button'>Nhập Data</a>";
                        break;
                    }
                }
            }
            if($_SESSION['role'] == "admin") {
                echo "<div>";
                    echo "<div class=''>";
                        echo "<form method='GET' action=''>
                        <div class='row d-flex'>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                <select style='width: 150px' class='form-select' id='trangthai' name='trangthai'>
                                    <option value='all'>Tất cả</option>
                                    <option value='cnc'>Có nhu cầu</option>
                                    <option value='kbm'>Không bắt máy</option>
                                    <option value='hgl'>Hẹn gọi lại</option>
                                    <option value='khac'>Khác</option>
                                    <option value='chui'>Chửi</option>
                                </select>
                                <label for='trangthai'>Trạng thái</label>
                                </div>
                            </div>
                            <!--<div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 150px' type='text' name='hoten' class='form-control' value='";echo isset($_POST['hoten'])?$_POST['hoten']:'';echo "'/>
                                    <label for='trangthai'>Họ và tên</label>
                                </div>
                            </div>-->
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 150px' type='text' name='cmnd' class='form-control'/>
                                    <label for='trangthai'>CMND</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 150px' type='text' name='sodt' class='form-control'/>
                                    <label for='trangthai'>Số điện thoại</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                <select style='width: 150px' class='form-select' id='userid' name='userid'>";
                                    echo "<option value='all'>Tất cả</option>";
                                    foreach($data["Nhanvien"] as $row) {
                                        echo "<option value='${row[0]}'>${row[1]}</option>";
                                    }
                                echo "</select>
                                <label for='trangthai'>Chọn NV muốn xem</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 180px' type='date' class='form-control datepicker' id='ngaybd' name='ngaybd'>
                                <label for='trangthai'>Ngày bắt đầu</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 180px' type='date' class='form-control datepicker' id='ngaykt' name='ngaykt'>
                                <label for='trangthai'>Ngày kết thúc</label>
                                </div>
                            </div>
                        </div>
                        <button type='submit' class='btn btn-success mt-1'>Lọc</button>
                        </form>";
                    echo "</div>";
                    
                    echo "<div class='mt-2 ml-2'>";
                        echo "<form method='POST' action='/PanelAdmin/ChuyenData' name='handing' id='handing'>
                                <div class='form-floating'>
                                    <select style='width: 220px' class='form-select' id='uid' name='uid'>";
                                        foreach($data["Nhanvien"] as $row) {
                                            echo "<option value='${row[0]}'>${row[1]}</option>";
                                        }
                                    echo "</select>
                                    <label for='trangthai'>Chọn NV muốn chuyển</label>
                                </div>
                                
                                <button type='submit' id='checkall-btn-submit' class='btn btn-success mt-1'>Chuyển</button>
                                <br/>";
                    echo "</div>";
                echo "</div>";
                echo "<input style='' class='mt-4' type='checkbox' id='checkbox-all'/> Chọn tất cả";                                    
            }
            else if($_SESSION['role'] == "nhanvien") {
                echo "<div>";
                    echo "<div class=''>";
                        echo "<form method='GET' action=''>
                        <div class='row d-flex'>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                <select style='width: 150px' class='form-select' id='trangthai' name='trangthai'>
                                    <option value='all'>Tất cả</option>
                                    <option value='cnc'>Có nhu cầu</option>
                                    <option value='kbm'>Không bắt máy</option>
                                    <option value='hgl'>Hẹn gọi lại</option>
                                    <option value='khac'>Khác</option>
                                    <option value='chui'>Chửi</option>
                                </select>
                                <label for='trangthai'>Trạng thái</label>
                                </div>
                            </div>
                            <!--<div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 150px' type='text' name='hoten' class='form-control'/>
                                    <label for='trangthai'>Họ và tên</label>
                                </div>
                            </div>-->
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 150px' type='text' name='cmnd' class='form-control'/>
                                    <label for='trangthai'>CMND</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 150px' type='text' name='sodt' class='form-control'/>
                                    <label for='trangthai'>Số điện thoại</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 180px' type='date' class='form-control datepicker' id='ngaybd' name='ngaybd'>
                                <label for='trangthai'>Ngày bắt đầu</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 180px' type='date' class='form-control datepicker' id='ngaykt' name='ngaykt'>
                                <label for='trangthai'>Ngày kết thúc</label>
                                </div>
                            </div>
                        </div>
                        <button type='submit' class='btn btn-success mt-1'>Lọc</button>
                        </form>";
                    echo "</div>";
                echo "</div>";
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
                        if($_SESSION['role'] == "nhanvien") {
                            // if($row[5] == "Không nhu cầu" || $row[5] == "Có nhu cầu" || $row[5] == "Chửi") {
                            //     continue;
                            // }
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
        <?php
            if($_SESSION['role']=="admin" && isset($data["Numrows"])) {
                echo "<div class=''>";
                $total = $data["Numrows"];
                $pagenum = (($data["Numrows"]/10)+($data["Numrows"]%10>0?1:0));
                echo '<nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>';
                  for($i=1;$i<=$pagenum;$i++) {
                      if($i >= $data['Pagenum']-5 && $i<=$data['Pagenum']+5) {
                        echo "<li class='page-item'><a class='page-link' href='PanelAdmin/ViewData/${i}'>${i}</a></li>";
                        }
                    }
                
                  if($pagenum > 0) {
                    echo '<li class="page-item">
                            <a class="page-link" href="PanelAdmin/ViewData/'."${pagenum}".'" aria-label="Trang cuối">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Trang cuối</span>
                            </a>
                        </li>
                        </ul>
                    </nav>';
                  }
                echo "</div>";
            }
            else if($_SESSION['role'] == "nhanvien" && isset($data["Numrows"])) {
                echo "<div class=''>";
                $total = $data["Numrows"];
                $pagenum = intval((($data["Numrows"]/10)+($data["Numrows"]%10>0?1:0)));
                echo '<nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>';
                  for($i=1;$i<=$pagenum;$i++) {
                      if($i >= $data['Pagenum']-5 && $i<=$data['Pagenum']+5) {
                        echo "<li class='page-item'><a class='page-link' href='StaffData/${i}'>${i}</a></li>";
                        }
                    }
                  echo '<li class="page-item">
                    <a class="page-link" href="StaffData/'."${pagenum}".'" aria-label="Trang cuối">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Trang cuối</span>
                    </a>
                  </li>
                </ul>
              </nav>';
                echo "</div>";
            }
        ?>
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
            $("form#handing").submit(function(e) {
                e.preventDefault();    
                var formData = new FormData(this);
                $.ajax({
                    url: '/PanelAdmin/ChuyenData',
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

