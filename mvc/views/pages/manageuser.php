<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">HOME -> ADMIN PANEL -> MANAGE USER</h6>
        </div>
        <div class="card-body">
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
                                echo "<td><a href='PanelAdmin/ManageUser/${row[0]}?role=nhanvien' class='btn btn-success' type='button'>Xóa quyền Admin</a></td>";
                            }
                            else if($row[3] == "nhanvien") {
                                echo "<td>Nhân viên</td>";
                                echo "<td><a href='PanelAdmin/ManageUser/${row[0]}?role=admin' class='btn btn-success' type='button'>Cấp quyền Admin</a></td>";
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