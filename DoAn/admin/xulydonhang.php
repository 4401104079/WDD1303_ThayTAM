<?php
	include('connect.php');
?>
<?php 
if(isset($_POST['capnhatdonhang'])){
	$xuly = $_POST['xuly'];
	$mahang = $_POST['mahang_xuly'];
	$sql_update_donhang = mysqli_query($con,"UPDATE bills SET tinhtrang='$xuly' WHERE bill_id='$mahang'");
}

?>
<?php
	if(isset($_GET['xoadonhang'])){
		$mahang = $_GET['xoadonhang'];
		$sql_delete = mysqli_query($con,"DELETE FROM bills WHERE bill_id='$mahang'");
		header('Location:xulydonhang.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đơn hàng</title>
	<link href="bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
	      </li>
	       <li class="nav-item">
	         <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container-fluid">
		<div class="row">
			 <?php
			if(isset($_GET['quanly'])=='xemdonhang'){
				$mahang = $_GET['mahang'];
				$sql_chitiet = mysqli_query($con,"SELECT * FROM bill_detail,products WHERE bill_detail.id_product=products.product_id AND bill_detail.id_bill='$mahang'");
				?>
				<div class="col-md-7">
				<p>Xem chi tiết đơn hàng</p>
			<form action="" method="POST">
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã hàng</th>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Giá</th>
						<th>Tổng tiền</th>

						
						<!-- <th>Quản lý</th> -->
					</tr>
					<?php
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_chitiet)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_donhang['id_bill']; ?></td>
						
						<td><?php echo $row_donhang['product_name']; ?></td>
						<td><?php echo $row_donhang['quantity']; ?></td>
						<td><?php echo number_format ($row_donhang['unit_price']).'vnđ'; ?></td>
						<td><?php echo number_format($row_donhang['quantity']*$row_donhang['unit_price']).'vnđ'; ?></td>
						
						<input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['id_bill'] ?>">

						
					</tr>
					 <?php
					} 
					?> 
				</table>

				<select class="form-control" name="xuly">
					<option value="1">Đã xử lý | Giao hàng</option>
					<option value="0">Chưa xử lý</option>
				</select><br>

				<input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
			</form>
				</div>  
			<?php
			}else{
				?> 
				
				<div class="col-md-7">
					<p>Đơn hàng</p>
				</div>  
				<?php
			} 
			
				?> 
			<div class="col-md-5">
				<h4>Liệt kê đơn hàng</h4>
				<?php
				$sql_select = mysqli_query($con,"SELECT * FROM bills,customer WHERE bills.id_customer=customer.customer_id GROUP BY bill_id"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã hàng</th>
						<th>Tình trạng đơn hàng</th>
						<th>Tên khách hàng</th>
						<th>Ngày đặt</th>
						<th>Tổng tiền</th>
						<th>Hình thức thanh toán</th>
						<th>Ghi chú</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_donhang = mysqli_fetch_array($sql_select)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td><?php echo $row_donhang['bill_id']; ?></td>
						<td><?php
							if($row_donhang['tinhtrang']==0){
								echo 'Chưa xử lý';
							}else{
								echo 'Đã xử lý';
							}
						?></td>
						<td><?php echo $row_donhang['name']; ?></td>
						
						<td><?php echo $row_donhang['date_order'] ?></td>
						<td><?php echo number_format($row_donhang['total']).'vnđ' ?></td>
						<td><?php echo $row_donhang['payment'] ?></td>
						<td><?php echo $row_donhang['note'] ?></td>

						<td><a href="?xoadonhang=<?php echo $row_donhang['bill_id'] ?>">Xóa</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['bill_id'] ?>">Xem </a></td>
					</tr>
					 <?php
					} 
					?> 
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>