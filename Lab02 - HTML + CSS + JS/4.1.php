<html>
<head>
	<title>Lab04.1 - HTML + CSS + JS</title>
</head>
<style>
	div{
		margin: 20% ;
	}
	h1{
	color: #cc6600;
	background-color:#ffb380;
	}
	table{
	background-color:#ffcc99;
	}
	
</style>
<body>
<?php
	$method = $_SERVER['REQUEST_METHOD'];
	if($method == 'POST'){
		$chieudai = $_POST['chieu-dai'];
		$chieurong = $_POST['chieu-rong'];
		$dientich = $chieudai * $chieurong;
	}
	echo $method;
?>
	<div id="wrapper">
		<div class="container">
			<form = id="dien-tich-hinh-chu-nhat" action="" method="post">
				<table>
					<thead>
						<tr>
							<th colspan="2">
								<h1>DIỆN TÍCH HÌNH CHỮ NHẬT</h1>
							</th>
						</tr>
					</thead>
					<body>
						<tr>
							<td>
								Chiều dài
							</td>
							<td>
								<input type="number" name="chieu-dai" placeholder="Nhập chiều dài" value="<?php echo $chieudai;?>">
							</td>
						</tr>
						<tr>
							<td>
								Chiều rộng
							</td>
							<td>
								<input type="number" name="chieu-rong" placeholder="Nhập chiều rộng" value="<?php echo $chieurong;?>">
							</td>
						</tr>
						<tr>
							<td>
								Diện tích
							</td>
							<td>
								<input type="number" name="dien-tich" placeholder="Diện tích hình chữ nhật" disabled="disabled" style="background-color:#ffe6ff" value="<?php echo $dientich;?>">
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center">
								<input type="submit" value="Tính">
							</td>
						</tr>
					</body>
				</table>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		function TinhDienTich(){
			var dai = document.getElementById('chieu-dai');
			var rong = document.getElementById('chieu-rong');
			var dientich = Number(dai.value) + Number(rong.value);
			document.getElementById("dien-tich").value = dientich;
		}
	</script>
</body>
</html>