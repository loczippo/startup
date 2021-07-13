
<style>
    @media only screen and (max-width: 540px) {
  .responsive {
    width: 22.5rem !important;
  }
  .container-fluid{
      padding-left: 0px !important;
  }
}
</style>


<div class="container-fluid mt-2">
    <div class="card ">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">Trang chủ -> Dữ liệu -> Nhập thông tin</h6>
        </div>
        <div class="card-body">
        <?php
            foreach($data["Customer"] as $row) {
                $hoten = $row[1];
                $cmnd = $row[2];
                $sodt = $row[3];
                $hanmuc = $row[4];
                $trangthai = $row[5];
                $ghichu = $row[6];
                $sotien = $row[7];
                $ngayhen = $row[8];
                $newDate = date("Y-m-d\TH:i:s", strtotime($ngayhen));
                if($newDate == "1970-01-01T08:00:00") {
                    $newDate='';
                }
                $sotk = $row[11];
                $diachi = $row[12];
            }
        ?>
            <form method="POST" action="StaffData/DataEntry/<?php echo $row[0]; ?>/Update" id="update" name="update">
                <div class="row">
                    <div class=" col-md-6 col-lg-4 col-xl-4">
                    <label for="hoten" class="form-label">Họ và tên: </label>
                    <input type="text" class="form-control" id="hoten" name="hoten" value="<?php echo $hoten; ?>">
                    </div>
               
               
                <div class= "col-md-6 col-lg-4 col-xl-4">
                    <label for="cmnd" class="form-label">CMND: </label>
                    <input type="text" class="form-control" id="cmnd" name="cmnd" value="<?php echo $cmnd; ?>">
                </div>
                <div class=" col-md-6 col-lg-4 col-xl-4">
                    <label for="sodt" class="form-label">Số điện thoại: </label>
                    <div class="d-flex justify-content-between">
                        <input type="text" class="form-control" id="sodt" name="sodt" value="<?php echo $sodt; ?>">
                        <a href="tel:<?php echo $sodt; ?>" type="button" class="btn <?php echo (isset($trangthai) && $trangthai=='hgl'?"btn-danger":"btn-success"); ?> " style="margin-left: 10px">Gọi</a>
                        <a href="https://zalo.me/<?php echo $sodt; ?>" type="button" target="_blank" class="btn btn-success" style="margin-left: 10px">Gọi Zalo</a>
                    </div>
                </div>
                <div class=" col-md-6 col-lg-4 col-xl-4">
                    <label for="hanmuc" class="form-label">Hạn mức: </label>
                    <input type="text" class="form-control money" id="hanmuc" name="hanmuc" value="<?php echo $hanmuc; ?>">
                </div>
                <div class=" col-md-6 col-lg-4 col-xl-4">
                    <label for="sotien" class="form-label">Số tiền: </label>
                    <input type="text" class="form-control money" id="sotien" name="sotien" value="<?php echo $sotien; ?>">
                </div>
                <div class=" col-md-6 col-lg-4 col-xl-4">
                    <label for="ngayhen" class="form-label">Hẹn gọi lại: </label>
                    <div class="d-flex justify-content-between">
                        <input type="datetime-local" class="form-control datepicker" id="ngayhen" name="ngayhen" value="<?php echo $newDate; ?>">
                        <button id="clear" style="margin-left: 10px" class="btn btn-success">Clear</button>
                    </div>
                </div>
                <div class=" col-md-6 col-lg-4 col-xl-4">
                    <label for="sotaikhoan" class="form-label">Số tài khoản: </label>
                    <div class="d-flex justify-content-between">
                        <input type="text" class="form-control" id="sotaikhoan" name="sotaikhoan" value="<?php echo $sotk; ?>">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-4 col-xl-4">
                    <label for="diachi" class="form-label">Địa chỉ: </label>
                    <div class="d-flex justify-content-between">
                    <textarea class="form-control" placeholder="" rows="2" id="diachi" name="diachi"><?php echo $diachi ?></textarea>
                    </div>
                </div>
                <div class=" col-md-6 col-lg-4 col-xl-4">
                    <label for="diachi" class="form-label"></label>
                    <div class="d-flex justify-content-between">
                        <?php
                            echo "<p>Trạng thái: ";
                            echo is_null($trangthai) ? "<b>Chưa nhập</b></p>" : "";
                            echo $trangthai == "cnc" ? "<b>Có nhu cầu</b></p>" : "";
                            echo $trangthai == "knc" ? "<b>Không nhu cầu</b></p>" : "";
                            echo $trangthai == "hgl" ? "<b>Hẹn gọi lại</b></p>" : "";
                            echo $trangthai == "kbm" ? "<b>Không bắt máy</b></p>" : "";
                            echo $trangthai == "chui" ? "<b>Chửi</b></p>" : "";
                            echo $trangthai == "khac" ? "<b>Khác</b></p>" : "";
                        ?>
                    </div>
                </div>
                 </div>
                <hr/>
                <div class="row ">
                    <div class="col-md-12">
                           <input type="hidden" class="btn btn-success" id="trangthai" name="trangthai" value="knc">
                       <input type="submit" name="btnsubmit" style="display: none;" id='btnsubmit'>
                        <a href="javascript:;" class="btn btn-success btn-trangthai" id="trangthai1" data-value='cnc'>Có nhu cầu</a>
                        <a href="javascript:;" class="btn btn-warning btn-trangthai" id="trangthai2" data-value='knc'>Không có nhu cầu</a>
                        <a href="javascript:;" class="btn btn-primary btn-trangthai" id="trangthai3" data-value='hgl'>Hẹn gọi lại</a>

                        <a href="javascript:;" class="btn btn-warning btn-trangthai" id="trangthai4" data-value='kbm'>Không bắt máy</a>

                        <a href="javascript:;" class="btn btn-danger btn-trangthai" id="trangthai5" data-value='chui'>Chửi</a>

                        <a href="javascript:;" class="btn btn-info btn-trangthai" id="trangthai6" data-value='khac'>Khác</a>
Nhà mạng:
                        <select  name="DauSo" id="DauSo">
                            <option></option>
                            <?php
                            foreach($data["NetworkList"] as $row) {
                                ?>
                                <option value="<?php echo $row[2]; ?>" 
                                    <?php echo ((isset($_GET['dauso'])&& $_GET['dauso'] ==$row[2] )?"selected":""); ?>
                                >
                                    <?php echo $row[1]; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                       
                       Chọn ngày từ:
                        <input style='width: 140px' type='date' class=' datepicker' id='Ngaybd' name='Ngaybd' value='<?php echo isset($_GET['Ngaybd'])?$_GET['Ngaybd']:'';?>' />
                       
                       Đến:
                        <input style='width: 140px' type='date' class=' datepicker' id='Ngaykt' name='Ngaykt' value='<?php echo isset($_GET['Ngaykt'])?$_GET['Ngaykt']:'';?>' />
                       
                    </div>
                </div>
                <div class="form-floating mt-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="ghichu" name="ghichu"><?php echo $ghichu ?></textarea>
                    <label for="ghichu">Ghi chú</label>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="/public/js/formatMoney.js"></script>
<script type="text/javascript">
		$('.money').simpleMoneyFormat();
	</script>
<script>
    let hanmuc = document.getElementById('hanmuc');
    let format = hanmuc.value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    hanmuc.value = format;
    let sotien = document.getElementById('sotien');
    let format1 = sotien.value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    sotien.value = format1;
    document.addEventListener('DOMContentLoaded', (event) => {
        $(document).ready(function(){
            
            $('#trangthai, #trangthai1, #trangthai2, #trangthai4, #trangthai5, #trangthai6').click(function() {
                    
                    let hanmuc = document.getElementById("hanmuc");
                    let sodt = document.getElementById("sodt");
                    if(sodt.value.length == 0) {
                        alert(' Vui lòng nhập sdt');
                        preventDefault();
                        return false;
                    }
                    let convert = hanmuc.value.replaceAll(',', '');
                    hanmuc.value = convert;
                    convert = sotien.value.replaceAll(',', '');
                    sotien.value = convert;

                    $("#update").submit();
            });
            $('#trangthai3').click(function() {
                let ngayhen = document.getElementById("ngayhen");
                if(ngayhen.value.length == 0) {
                    alert('Vui lòng nhập ngày hẹn');
                    preventDefault();
                        return false;
                }
                let hanmuc = document.getElementById("hanmuc");
                    let sodt = document.getElementById("sodt");
                    if(sodt.value.length == 0) {
                        alert(' Vui lòng nhập sdt');
                        preventDefault();
                        return false;
                    }
                    let convert = hanmuc.value.replaceAll(',', '');
                    hanmuc.value = convert;
                    convert = sotien.value.replaceAll(',', '');
                    sotien.value = convert;

                    $("#update").submit();
            });
            $('#hengoilai').click(function(e) {
                let hanmuc = document.getElementById("hanmuc");
                    let convert = hanmuc.value.replaceAll(',', '');
                    hanmuc.value = convert;
                    if(document.getElementById('ngayhen').value == ''){
                        e.preventDefault();
                        return;
                    }
                    else {
                        $("#update").submit();
                    }
            });
            $("#clear").click(function(e) {
                e.preventDefault();
                document.getElementById("ngayhen").value = "";
            })
             $(".btn-trangthai").click(function(){
                var trangthai=$(this).data("value");
                $("#trangthai").val(trangthai);
                $("#btnsubmit").trigger("click");
            });
            
        });
        
    })
    
</script>

