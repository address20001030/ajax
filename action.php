<?php

include('db.php');
//chen du lieu 
if(isset($_POST['hoten'])){
	$hoten = $_POST['hoten'];
	$dienthoai = $_POST['dienthoai'];
	$diachi = $_POST['diachi'];
	$mail = $_POST['mail'];
	$ghichu = $_POST['ghichu'];


	$sql = "insert into tbl_khachang(name,phone,email,address,ghichu) values ('{$hoten}','{$dienthoai}','{$diachi}','{$mail}','{$ghichu}')";	
	$result = mysqli_query($conn,$sql);
}

	// edit du lieu
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$text = $_POST['text'];
	$column_name = $_POST['column_name'];	
	$edit = mysqli_query($conn,"update tbl_khachang set $column_name = '$text' where id = $id");
}

	//xoa du lieu
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$del = mysqli_query($conn,"delete from tbl_khachang where id = $id");
}

	//lay du lieu
$output = '';
$sql_select = mysqli_query($conn,"select * from tbl_khachang");
$output .= '
<div class="table table-responsive">
<table class="table table-bordered">
<tr>
<td>Họ tên</td>
<td>Số điện thoại</td>
<td>Email</td>
<td>Địa chỉ</td>
<td>Ghi chú</td>
<td>Action</td>
<tr>
';


if (mysqli_num_rows($sql_select) > 0) {
		# code...
	while ($rows = mysqli_fetch_array($sql_select) ) {
			# code...
		$output .= '
		<tr>
		<td class="hoten" data-id1='.$rows['id'].' contenteditable>'.$rows['name'].'</td>
		<td class="phone" data-id2='.$rows['id'].' contenteditable>'.$rows['phone'].'</td>
		<td contenteditable>'.$rows['email'].'</td>
		<td contenteditable>'.$rows['address'].'</td>
		<td contenteditable>'.$rows['ghichu'].'</td>
		<td><button data-xoa='.$rows['id'].' class="btn btn-sm btn-danger del_data" name="delete_data">Xóa</button></td>
		</tr>
		';
	}
}else{
	$output .= '
	<tr>
	<td colspan="5">Dữ liệu chưa có</td>
	</tr>
	';
}

$output .= '
</table></div>
';
echo $output;
mysqli_close($conn);

?>