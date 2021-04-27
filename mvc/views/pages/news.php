<?php
    while($row = mysqli_fetch_array($data["SinhVien"])) {
        echo $row["id"]. " - " .$row["masv"] . " - " . $row["tensv"] . " - " .$row["sdt"] . "<br/>";
    }
?>