
<?php

//echo $data['trangthai'];
?>
<style>
    .disable {
   pointer-events: none;
   cursor: default;
}
</style>
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">Danh mục khách hàng</h6>
        </div>
        <div class="card-body" id="form">
        <?php
        
            
                // foreach($data["Customer"] as $row) {
                //     if($row == "") {
                //         break;
                //     }
                    
                //     if($row[5] == NULL) {
                //         echo "<a href='StaffData/DataEntry/${row[0]}' class='btn btn-success mb-2' type='button'>Nhập Data</a>";
                //         break;
                //     }
                // }

            
                echo "<div>";
                    echo "<div class=''>";
                        echo "
                        <div class='row d-flex'>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                <select style='width: 150px' class='form-select' id='trangthai' name='trangthai'>
                                    <option value='all' ";echo  (isset( $data['Trangthai']) &&  $data['Trangthai']=='all'?'selected':'');echo" >Tất cả</option>
                                    <option value='new' ";echo  (!isset( $data['Trangthai']) ||  $data['Trangthai']=='new'?'selected':'');echo" >Chưa gọi</option>
                                    
                                    <option value='cnc' ";echo  (isset( $data['Trangthai']) &&  $data['Trangthai']=='cnc'?'selected':'');echo" >Có nhu cầu</option>
                                    <option value='kbm' ";echo (isset( $data['Trangthai']) &&  $data['Trangthai']=='kbm'?'selected':'');echo" >Không bắt máy</option>
                                    <option value='hgl' ";echo  (isset( $data['Trangthai']) &&  $data['Trangthai']=='hgl'?'selected':'');echo" >Hẹn gọi lại</option>
                                    <option value='khac' ";echo  (isset( $data['Trangthai']) &&  $data['Trangthai']=='khac'?'selected':'');echo" >Khác</option>
                                    <option value='chui' ";echo (isset( $data['Trangthai']) &&  $data['Trangthai']=='chui'?'selected':'');echo" >Chửi</option>
                                </select>
                                <label for='trangthai'>Trạng thái</label>
                                </div>
                            </div>
                           
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 150px' type='text' name='cmnd' class='form-control' value='";echo isset($data['Cmnd'])?$data['Cmnd']:'';echo "'/>
                                    <label for='trangthai'>CMND</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 150px' type='text' name='sodt' class='form-control' value='";echo isset($data['Sodt'])?$data['Sodt']:'';echo "'/>
                                    <label for='trangthai'>Số điện thoại</label>
                                </div>
                            </div>";
                            echo"<div class='col-sm-2'  ".($data["Role"]!="admin"?"style='display:none;'":"").">";
                            echo"    <div class='form-floating'>
                                <select style='width: 150px' class='form-select' id='userid' name='userid'>";
                                    echo "<option value='all'>Tất cả</option>";
                                    foreach($data["NhanVienList"] as $row) {
                                        echo "<option value='${row[0]}'>${row[1]}</option>";
                                    }
                                echo "</select>
                                <label for='trangthai'>Chọn NV muốn xem</label>
                                </div>
                            </div>
                            <script>document.getElementById('userid').value = '";echo isset($data['Userid'])?$data['Userid']:'all';echo "'</script>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 180px' type='date' class='form-control datepicker' id='ngaybd' name='ngaybd' value='";echo isset($data['Ngaybd'])?$data['Ngaybd']:'';echo "'/>
                                <label for='trangthai'>Ngày bắt đầu</label>
                                </div>
                            </div>
                            <div class='col-sm-2'>
                                <div class='form-floating'>
                                    <input style='width: 180px' type='date' class='form-control datepicker' id='ngaykt' name='ngaykt' value='";echo isset($data['Ngaykt'])?$data['Ngaykt']:'';echo "'/>
                                <label for='trangthai'>Ngày kết thúc</label>
                                </div>
                            </div>
                        </div>
                        <a href='javascript:;' class='btn btn-primary' data-container='form'
                              id='btnLoc'
                                  >Lọc  </a>
                                   <a href='/Customers/Import' class='btn btn-success' 
                              id='btnLoc'
                                  >Import  </a>
                        </form>";
                    echo "</div>";
                    
                     echo "<div class='mt-2 ml-2'".($data["Role"]!="admin"?"style='display:none;'":"").">";
                     echo "<div class='form-check' style='padding-left:0'><input style='' class='mt-4' type='checkbox' id='checkbox-all'/><label class='form-check-label' for='checkbox-all'>Chọn tất cả</label></div>";
                        echo "<form method='POST' action='/PanelAdmin/ChuyenData' name='handing' id='handing'>
                                <div class='form-floating'>
                                    <select style='width: 220px' class='form-select' id='uid' name='uid'>";
                                        foreach($data["NhanVienList"] as $row) {
                                            echo "<option value='${row[0]}'>${row[1]}</option>";
                                        }
                                    echo "</select>
                                    <label for='trangthai'>Chọn NV muốn chuyển</label>
                                </div>
                                
                                <button type='submit' id='checkall-btn-submit' class='btn btn-success mt-1' disabled>Chuyển</button>

                             ";
                             echo "<a href='javascript:;' id='btn-delete' class='btn btn-danger mt-1 disabled'>Xóa</a>";   
                    echo "</div>";
                echo "</div>";
                //echo "<div class='d-flex align-items-center'><div class='form-check' style='padding-left:0'><input style='' class='mt-4' type='checkbox' id='checkbox-all'/><label class='form-check-label' for='checkbox-all'>Chọn tất cả</label></div>";
                echo "</div>";
                // echo "<a href='javascript:;' id='btn-delete' class='btn btn-danger mt-1'>Xóa</a></div>";   

        ?>
    
        <div class="table-responsive-sm">
        <table class="table table-sm mb-3 mx-auto table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">CMND</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Hạn mức</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Nhu cầu</th>
                <th scope="col">Nhân viên</th>
                <th scope="col">Thao tác</th>
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
                    foreach($data["Customers"] as $row) {
                        $hanmuc = formatMoney($row[4]);
                        $nhucau = formatMoney($row[7]);
                        $ngayhen = $row[8]; //err
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
                //          <th scope="col">Họ và tên</th>
                // <th scope="col">CMND</th>
                // <th scope="col">Số điện thoại</th>
                // <th scope="col">Hạn mức</th>
                // <th scope="col">Trạng thái</th>
                // <th scope="col">Ghi chú</th>
                // <th scope="col">Nhu cầu</th>
                // <th scope="col">Nhân viên</th>
                        echo "<td>${row[1]}</td>";
                        echo "<td>${row[2]}</td>";
                        echo "<td>${row[3]}</td>";
                         echo "<td>${hanmuc}</td>";
                        if($row[5] == NULL) echo "<td>Chưa cập nhật</td>";
                        if($row[5] == "cnc") echo "<td>Có nhu cầu</td>";
                        if($row[5] == "knc") echo "<td>Không nhu cầu</td>";
                        if($row[5] == "khac") echo "<td>Khác</td>";
                        if($row[5] == "hgl") echo "<td>Hẹn gọi lại</td>";
                        if($row[5] == "kbm") echo "<td>Không bắt máy</td>";
                        if($row[5] == "chui") echo "<td>Chửi</td>";
                        echo "<td>${row[6]}</td>";
                        echo "<td>${nhucau}</td>";
                        echo "<td>${row[10]}</td>";
                        echo "<td><a href='StaffData/DataEntry/${row[0]}' class='btn btn-success' type='button'>Nhập</a></td>";
                        echo "</tr>";
                        $i++;
                        $count++;
                    }
                    if($data["Customers"] == null) {
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
       
        </div>
        <div class="form-floating" style="width: 200px">
        <select class="form-select" id='limit' name="limit">
            <option value="10" <?php echo ($data["limit"]==10?"selected":"")?> >10</option>
            <option value="20" <?php echo ($data["limit"]==20?"selected":"")?> >20</option>
            <option value="30" <?php echo ($data["limit"]==30?"selected":"")?> >30</option>
            <option value="40" <?php echo ($data["limit"]==40?"selected":"")?> >40</option>
            <option value="50" <?php echo ($data["limit"]==50?"selected":"")?> >50</option>
            <option value="100" <?php echo ($data["limit"]==100?"selected":"")?> >100</option>
            <option value="200" <?php echo ($data["limit"]==200?"selected":"")?> >200</option>
            
        </select>
        <label for="limit">Số dòng/Trang</label>
    </div>
        </div>
        <?php
            if(isset($data["Customers"])) {
                echo "<div class=''>";
                $total = $data["Totalrows"];
                $page=$data["page"];
                 $limit=$data["limit"];
               
                $pagenum = (($total/$limit)+($total%$limit>0?1:0));
               
                echo '<nav aria-label="Page navigation example">
                <ul class="pagination">';
                if($page>1 && $pagenum>1)
                echo'
                  <li class="page-item">
                    <a class="page-link" href="javascript:;" data-page="1" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    
                    </a>
                  </li>';
                  $minpage=($page-5)>=0?$page-5:1;

                  $maxpage=($page+5)<=$pagenum?$page+5:$pagenum;

                  for($i=$minpage;$i<=$maxpage;$i++) {

                      echo'
                          <li class="page-item  '.($i==$page?'active':'').'">
                            <a class="page-link" href="javascript:;" data-page="'.$i.'" aria-label="Previous">
                              <span aria-hidden="true">'.$i.'</span>
                            
                            </a>
                          </li>';
                    }
                
                  if($pagenum > 0) {
                    
                    if(($page+5)<=$pagenum) {
                        echo "<li class='page-item'>
                            <a class='page-link' aria-label='Trang cuối' data-page='".$pagenum."'>
                            <span aria-hidden='true'>&raquo;</span>
                         
                            </a>
                        </li>
                      ";
                   }
                  }
                  echo "  </ul>
                    </nav>";
                echo "</div>";
            }
           
        ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxAll = $('#checkbox-all');
        var checkAllSubmitBtn = $('#checkall-btn-submit');
        var deleteBtn = $('#btn-delete');
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
                deleteBtn.removeClass('disabled');
            }
            else {
                checkAllSubmitBtn.attr('disabled', true);
                deleteBtn.addClass('disabled');
            }
        }
        $("#btn-delete").click(function(){
            console.log('test')
                var checkedList = $('input[name="customerIds[]"]:checked');
                var customerIds ="";
                $.each(checkedList, function( index, input ) {
                    customerIds+=input.value+",";
                }); 
                
                $.ajax({
                      method: "POST",
                      url: "Customers/DeleteMany",
                      data: { customerIds: customerIds }
                    })
                      .done(function( msg ) {
                        window.location.reload();
                });
        });
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
    });
    $("#btnLoc").click(function(){
            var url ="/Customers/Index/"+createformparam("form");
            window.location=url +"&page=1";
    });
     $(".page-link").click(function(){
            var url ="/Customers/Index/"+createformparam("form");
            var page=$(this).data("page");
            window.location=url +"&page="+page;
    });
</script>
