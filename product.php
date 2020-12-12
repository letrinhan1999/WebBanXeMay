<?php
	include "./includes/connect.php";
?>

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


	<style>
		.rsidebar {
			margin-left: 12px;
		}
	</style>


</head>

<body>
	<!--HEADER-->
	<?php
        include './includes/header.php';
    ?>

	<!--CONTENT-->

	<!-- start content -->
	<div class="content">

		<div class="women-product">
			<div class=" w_content">
				<div class="women">
					<a href="#">
						<h4>Enthecwear - <span>4449 itemms</span> </h4>
					</a>
					<ul class="w_nav">
						<li>Sort : </li>
						<li><a class="active" href="#">popular</a></li> |
						<li><a href="#">new </a></li> |
						<li><a href="#">discount</a></li> |
						<li><a href="#">price: Low High </a></li>
						<div class="clearfix"> </div>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>

			<!-- grids_of_4 -->
			<div class="grid-product">
				<div class="all-product">
					<?php
						$trang=1;
						$xeAll=9;
						$para=array();
						if(isset($_GET['trang'])){
							$trang = $_GET['trang'];
						}
						$sql = "select * from xe";
						$sql .= ' limit '.($trang-1)*$xeAll.','.$xeAll;
						$stmt = $conn->prepare($sql);
						$stmt->execute($para);
						
						while ($xe = $stmt->fetch(PDO::FETCH_ASSOC)) {
						
					?>
					<div class="col-md-4 giay_col">
						<div class="card">
							<a href="single.php?maxe=<?php echo $xe['maxe']; ?>"><img
									class="img-responsive chain moto_image"
									src="images/pro_img/<?php echo explode(',', $xe['hinh'])[0]; ?>" alt=" " /></a>
							<span class="star"> </span>
							<div class="grid-chain-bottom">
								<h6><a
										href="single.php?maxe=<?php echo $xe['maxe']; ?>"><?php echo $xe['tenxe']; ?></a>
								</h6>
								<div class="star-price">
									<div class="dolor-grid">
										<span class="actual"><?php echo number_format($xe['gia']); ?> VND</span>
										<!-- <span class="reducedfrom">400$</span> -->
										<span class="rating">
											<input type="radio" class="rating-input" id="rating-input-1-5"
												name="rating-input-1">
											<label for="rating-input-1-5" class="rating-star1"> </label>
											<input type="radio" class="rating-input" id="rating-input-1-4"
												name="rating-input-1">
											<label for="rating-input-1-4" class="rating-star1"> </label>
											<input type="radio" class="rating-input" id="rating-input-1-3"
												name="rating-input-1">
											<label for="rating-input-1-3" class="rating-star"> </label>
											<input type="radio" class="rating-input" id="rating-input-1-2"
												name="rating-input-1">
											<label for="rating-input-1-2" class="rating-star"> </label>
											<input type="radio" class="rating-input" id="rating-input-1-1"
												name="rating-input-1">
											<label for="rating-input-1-1" class="rating-star"> </label>
										</span>
									</div>
									<a class="now-get get-cart" href="#">ADD TO CART</a>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
					</div>
					<?php
						
					}
					?>

		<!-- Tinh tong so xe -->
		<?php
			$sql="select count(*) from xe";
			$stmt=$conn->prepare($sql);
			$stmt->execute();
			$tongxe=$stmt->fetchColumn();
			
			$sotrang=ceil($tongxe/$xeAll);

			echo '<span style="font-size: 20px;">Trang: </span> ';
			if(isset($_GET['maloai']))
				for($i=1;$i<=$sotrang;$i++)
					echo '<a href="product.php?maloai='.$_GET['maloai'].'&trang='.$i.'" class="pages"> '.$i.' </a> ';

			else {
				for($i=1;$i<=$sotrang;$i++)
					echo '<a href="product.php?trang='.$i.'"class="pages"> '.$i.' </a> ';
			}
		?>

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<!-- Menu Left -->
		<div class="sub-cate">
			<?php
        include './includes/menuleft.php'
        ?>


		</div>
		<div class="clearfix"> </div>
	</div>

	<!--FOOTER-->
	<?php
        include './includes/footer.php';
    ?>

</body>

</html>