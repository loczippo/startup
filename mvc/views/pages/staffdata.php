
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">HOME -> STAFF DATA</h6>
        </div>
        <div class="card-body">
        <?php
            foreach($data["Customer"] as $row) {
                if($row == "") {
                    break;
                }
                else {
                    echo "<a href='StaffData/DataEntry/All/${row[0]}' class='btn btn-success' type='button'>Nhập Data</a>";
                    break;
                }
            }
        ?>
        <table class="table mt-3 mb-3 mx-auto table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">CMND</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Hạn mức</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
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
                    foreach($data["Customer"] as $row) {
                        $money = formatMoney($row[4]);
                        echo "<tr>";
                        echo "<th>${i}</th>";
                        echo "<td>${row[1]}</td>";
                        echo "<td>${row[2]}</td>";
                        echo "<td>${row[3]}</td>";
                        echo "<td>${money}</td>";
                        echo "<td><a href='StaffData/DataEntry/${row[0]}' class='btn btn-success' type='button'>Nhập</a></td>";
                        echo "</tr>";
                        $i++;
                    }
                    if($data["Customer"] == null) {
                        echo "<tr><td  class='text-center' colspan='6'>Không có data nào dành cho bạn</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

