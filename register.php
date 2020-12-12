<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<!DOCTYPE html>
<html>

<head>
	<?php
        include './includes/client/head.php';
    ?>
</head>

<body>
	<!--header-->
	<?php
		include "./includes/header.php";
	if(isset($_POST['submitDKy'])){
		$username = isset($_POST['username'])?$_POST['username']:'';
		$matkhau = isset($_POST['password'])?$_POST['password']:'';
		$hoten = isset($_POST['txtTen'])?$_POST['txtTen']:'';
		$mkhau = md5($matkhau);
		$data=[	$username,
			$mkhau,
			$hoten,
		];
		$sql = "INSERT INTO quantri (username, matkhau, hoten) VALUES (?,	?,	?)";
		$stmt = $conn->prepare($sql);
		$stmt->execute($data);
		echo '<script language="javascript">'; 
		echo 'alert("Đăng ký thành công !!!") ';
		echo '</script>';
		echo '<script type="text/javascript">
           window.location = "loginAdmin.php" </script>';
	}


	?>


	<!--CONTENT-->
	<div class="container">

		<div class="register">
			<form action="register.php" method="POST" enctype="multipart/form-data">
				<div class="  register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					<div class="mation">
						<span> Userame <label>*</label></span>
						<input type="text" name="username" value="<?=isset($_POST['username'])?$_POST['username']:''; ?>">

						<span> Mật Khẩu <label>*</label></span>
						<input type="password" name="password" value="">

						<span> Họ và tên <label>*</label></span>
						<input type="text" name="txtTen" value="<?=isset($_POST['txtTen'])?$_POST['txtTen']:''; ?>">
					</div>
					<div class="clearfix"> </div>

				</div>
				<input type="submit" name="submitDKy" value="Đăng Ký">
			</form>
			<div class="clearfix"> </div>
		</div>


		<!-- Menu Left -->
		<div class="sub-cate">
			<?php
				include "./includes/menuleft.php";
			?>
		</div>
	</div>


	<hr>
	<!--FOOTER-->
	<?php
		include "./includes/footer.php";
	?>
</body>

</html>