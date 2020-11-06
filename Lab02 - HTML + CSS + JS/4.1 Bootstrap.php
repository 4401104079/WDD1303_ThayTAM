<html>
<head>
	<title>Lab04.1 - HTML + CSS + JS</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>

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

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
	<div id="wrapper">
		<div class="container">
			<form = id"dien-tich-hinh-chu-nhat" action="" method="post">
				<div class="row">
					<h1 class="text-white bg-secondary">DIỆN TÍCH HÌNH CHỮ NHẬT</h1>
				</div>
				<div class="row form-group">
					<div class="col-sm-5">
						<label>Chiều dài</label>
					</div>
					<div class="col-sm-7">
						<input type="number" class="form-control" name="chieu-dai" placeholder="Nhập chiều dài" value="<?php echo $chieudai;?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-5">
						<label>Chiều rộng</label>
					</div>
					<div class="col-sm-7">
						<input type="number" class="form-control" name="chieu-rong" placeholder="Nhập chiều rộng" value="<?php echo $chieurong;?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-5">
						<label>Diện tích</label>
					</div>
					<div class="col-sm-7">
						<input type="number" class="form-control" name="dien-tich" placeholder="Diện tích hình chữ nhật" disabled="disabled" style="background-color:#ffe6ff" value="<?php echo $dientich;?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-3">
						<button class="form-control btn-success">Tính</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		function TinhDienTich(){
			var dai = document.getElementById('chieu-dai');
			var rong = document.getElementById('chieu-rong');
			var dientich = dai.value * rong.value;
			document.getElementById("dien-tich").value = dientich;
		}
	</script>
</body>
</html>