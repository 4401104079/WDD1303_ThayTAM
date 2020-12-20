<?php
	include('connect.php');
?>
<?php
	if(isset($_POST['themsanpham'])){
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		
		$gia = $_POST['giasanpham'];
		$danhmuc = $_POST['danhmuc'];
		$mota = $_POST['mota'];
		$path = '../image/product/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($con,"INSERT INTO products(product_name,description,unit_price,image,id_type) values ('$tensanpham','$mota','$gia','$hinhanh','$danhmuc')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$gia = $_POST['giasanpham'];
		$danhmuc = $_POST['danhmuc'];
		$new = $_POST['new'];
		$mota = $_POST['mota'];
		$path = '../image/product/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE products SET product_name='$tensanpham',description='$mota',unit_price='$gia',id_type='$danhmuc',new='$new' WHERE product_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE products SET product_name='$tensanpham',description='$mota',unit_price='$gia',image='$hinhanh',id_type='$danhmuc',new='$new' WHERE product_id='$id_update'";
		}
		mysqli_query($con,$sql_update_image);
		header('Location:xulysanpham.php');
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM products WHERE product_id='$id'");
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
	<link href="bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="xulydonhang.php">Đơn hàng</a>
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
	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM products WHERE product_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['product_id'];
				?>
				<div class="col-md-4">
				<h4>Cập nhật sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['product_name'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['product_id'] ?>">
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../image/product/<?php echo $row_capnhat['image'] ?>" height="80" width="80"><br>
					<label>Giá</label>
					<input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['unit_price'] ?>"><br>
					<label>Mô tả</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['description'] ?></textarea><br>
					<label>Sản phẩm</label>
					<select name="new" class="form-control">
						<option value="0">Cũ</option>
						<option value="1">Mới</option>
					</select><br>
					<label>Danh mục</label>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM type_products ORDER BY id"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
							if($id_category_1==$row_danhmuc['id']){
						?>
						<option selected value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['type_name'] ?></option>
						<?php 
							}else{
						?>
						<option value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['type_name'] ?></option>
						<?php
							}
						}
						?>
					</select><br>
					<input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Thêm sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Giá</label>
					<input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
					<label>Mô tả</label>
					<textarea class="form-control" name="mota"></textarea><br>
					<label>Danh mục</label>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM type_products ORDER BY id"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
						?>
						<option value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['type_name'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Liệt kê sản phẩm</h4>
				<?php
				$sql_select_sp = mysqli_query($con,"SELECT * FROM products,type_products WHERE products.id_type=type_products.id ORDER BY products.product_id DESC "); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Mô tả</th>
						<th>Danh mục</th>
						<th>Giá sản phẩm</th>
						<th>Sản phẩm</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_sp['product_name'] ?></td>
						<td><img src="../image/product/<?php echo $row_sp['image'] ?>" height="100" width="80"></td>
						<td><?php echo $row_sp['description'] ?></td>
						<td><?php echo $row_sp['type_name'] ?></td>
						<td><?php echo number_format($row_sp['unit_price']).'vnđ' ?></td>
						<td><?php if($row_sp['new']=='1'){
								echo "Mới";
								}else{
								echo "Cũ";
								}
							?></td>
						<td><a href="?xoa=<?php echo $row_sp['product_id'] ?>">Xóa</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['product_id'] ?>">Cập nhật</a></td>
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