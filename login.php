<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<h3>Insert dữ liệu trong from</h3>
			<form method="POST" id="insert_data_hoten">
				<label>Họ và tên</label>
				<input type="text"  class="form-control" placeholder="Điền họ và tên" id="hoten">
				<label>Số điện thoại</label>
				<input type="text"  class="form-control" placeholder="Số điện thoại" id="dienthoai">
				<label>Địa chỉ</label>
				<input type="text"  class="form-control" placeholder="Điền địa chỉ" id="diachi">
				<label>Email</label>
				<input type="text"  class="form-control" placeholder="Điền Email" id="mail">
				<label>Ghi chú</label>
				<input type="text"  class="form-control" placeholder="Điền ghi chú" id="ghichu">
				<br>
				<input type="button" name="insert_data" value="Insert" class="btn btn-success" id="button_insert">
			</form>
			<h3>Load dữ liệu bằng ajax</h3>
			<div id="load_data"></div>
		</div>
	</div>
	<script type="text/javascript">

		$(document).ready(function(){
			//load dữ liệu
			function fetch_data(){
				$.ajax({
					url:"action.php",
					method:"POST",
					success: function(data){
						$('#load_data').html(data);
					}
				});
			}
			fetch_data();

			//edit dữ liệu
			function edit_data(id,text,column_name){
				$.ajax({
					url:"action.php",
					method:"POST",
					data:{id:id,text:text,column_name},
					success: function(data){

						alert("Edit thành công!");
						fetch_data();
					}
				});
			}
			$(document).on('blur','.hoten',function(){
				var id = $(this).data('id1');
				var text = $(this).text();
				edit_data(id,text,'name');
			})
			$(document).on('blur','.phone',function(){
				var id = $(this).data('id2');
				var text = $(this).text();
				edit_data(id,text,'phone');
			})

			// insert du lieu
			$('#button_insert').on('click',function(){
				var hoten = $('#hoten').val();
				var dienthoai = $('#dienthoai').val();
				var diachi = $('#diachi').val();
				var mail = $('#mail').val();
				var ghichu = $('#ghichu').val();
				if (hoten == '' || dienthoai == ''||diachi == '' || mail == ''||ghichu =='') {
					alert('Không được bỏ trống');
				}else{
					$.ajax({
						url:"action.php",
						method:"POST",
						data:{hoten:hoten,dienthoai:dienthoai,diachi:diachi,mail:mail,ghichu:ghichu},
						success: function(data){

							alert("Insert thành công!");
							$('#insert_data_hoten')[0].reset();
							fetch_data();
						}
					});
				}
			})

						//delete du lieu
						$(document).on('click','.del_data',function(){
							var id = $(this).data('xoa');
							$.ajax({
								url:"action.php",
								method:"POST",
								data:{id:id},
								success: function(data){

									alert("delete thành công!");
									fetch_data();
								}
							});
						})
					});
		
				</script>
			</body>
			</html>