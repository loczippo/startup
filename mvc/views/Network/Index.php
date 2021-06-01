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
            <h6><img class="img-fluid" src="public/img/star.gif" alt="" width="40">Danh mục Nhà mạng</h6>
        </div>
        <div class="card-body" id="form">
        		<div>
        			<div>
        				 <div class='row d-flex'>
        				 	<table>
        				 		<thead>
        				 			<th style="width:30px;">
        				 				#
        				 			</th>
        				 			<th style="width:50px;">
        				 				Tên
        				 			</th>
        				 			<th>
        				 				dãy đầu số
        				 			</th>
        				 			<th style="width:100px;">
        				 				Thao tác
        				 			</th>
        				 		</thead>
        				 		<tbody>
        				 			<?php
        				 			 foreach($data["Data"] as $row) {
        				 			 	?>
        				 			 	<tr id="row_<?php echo $row[0]  ?>">
        				 			 	<td><?php echo $row[0]  ?><input type="hidden" name="Id" value="<?php echo $row[0]  ?>"></td>
        				 			 	<td><input type="text" name="Ten" value="<?php echo $row[1]  ?>"></td>
        				 			 	<td><input type="text" name="DayDauSo" style="width:100%;" value="<?php echo $row[2]  ?>"></td>
        				 			 	<td>
        				 			 		<a href="javascript:;" class="btn btn-success saveform" data-container="row_<?php echo $row[0]  ?>" data-url="/Networks/Update" data-aftersave="ThanhCong"
        				 			 			><i class="fas fa-save"></i> Lưu</a>
        				 			 	</td>
        				 			 	</tr>
        				 			 	<?php
        				 			 }
        				 			 ?>
        				 		</tbody>
        				 	</table>
        				 </div>
        			</div>

        		</div>
        	</div>
        </div>
    </div>
    <script type="text/javascript">
    	function ThanhCong() {
    		// body...
    		sweetalert2("Lưu thành công",'success','OK');
    	}
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
    </script>