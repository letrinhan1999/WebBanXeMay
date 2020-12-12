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
	<title>Cua Hang Xe May</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/etalage.css" type="text/css" media="all" />
	<link href="css/my.css" rel="stylesheet" type="text/css" media="all" />
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/offcanvas/offcanvas.css" rel="stylesheet">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        crossorigin="anonymous"></script>
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	
	<!--//fonts-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.etalage.min.js"></script>

	<script>
		jQuery(document).ready(function ($) {

			$('#etalage').etalage({
				thumb_image_width: 300,
				thumb_image_height: 400,
				source_image_width: 900,
				source_image_height: 1200,
				show_hint: true,
				click_callback: function (image_anchor, instance_id) {
					alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
				}
			});

		});
	</script>

	<style>
	.rsidebar{
		margin-left: 12px;
	}

</style>

</head>

<body>
	<!--header-->
	<?php
		include './includes/header.php';
	?>

	<!---->

	<div class="container">

		<div class=" single_top">
		<?php
			$para=array();
			//$trang=1;
			if(isset($_GET['maxe'])){
				$sql="select * from xe where maxe=?";
				$para[]=$_GET['maxe'];
			}else
				$sql="select * from xe";
			$stmt=$conn->prepare($sql);
	
			$stmt->execute($para);
			$xe=$stmt->fetch(PDO::FETCH_ASSOC);
			
		?>

			<div class="single_grid">
				<div class="grid images_3_of_2">
					<ul id="etalage">
						<li>
							<a href="optionallink.html">
								<img class="etalage_thumb_image" src="images/pro_img/<?php echo explode(',',$xe['hinh'])[0]; ?>" class="img-responsive" />
								<img class="etalage_source_image" src="images/pro_img/<?php echo explode(',',$xe['hinh'])[0]; ?>" class="img-responsive"
									title="" />
							</a>
						</li>
						<li>
							<img class="etalage_thumb_image" src="images/lay_img/<?php echo explode(',',$xe['hinh'])[1]; ?>" class="img-responsive" />
							<img class="etalage_source_image" src="images/lay_img/<?php echo explode(',',$xe['hinh'])[1]; ?>" class="img-responsive" title="" />
						</li>
						<li>
							<img class="etalage_thumb_image" src="images/lay_img/<?php echo explode(',',$xe['hinh'])[2]; ?>" class="img-responsive" />
							<img class="etalage_source_image" src="images/lay_img/<?php echo explode(',',$xe['hinh'])[2]; ?>" class="img-responsive" />
						</li>
						<li>
							<img class="etalage_thumb_image" src="images/lay_img/<?php echo explode(',',$xe['hinh'])[3]; ?>" class="img-responsive" />
							<img class="etalage_source_image" src="images/lay_img/<?php echo explode(',',$xe['hinh'])[3]; ?>" class="img-responsive" />
						</li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="desc1 span_3_of_2">


					<h2><?php echo $xe['tenxe']; ?></h2>
					<div class="cart-b">
						<div class="left-n "><?php echo number_format($xe['gia']); ?> VND</div>
						<form action="cart.php?action=add" method="POST" >
							<input type="text" value="1" name="txtSluong[<?php echo $xe['maxe'] ?>]">
							<input class="now-get get-cart-in" type="submit" value="ADD TO CART">
						</form>
						<!-- <a class="now-get get-cart-in" href="#">ADD TO CART</a> -->
						<div class="clearfix"></div>
					</div>
					<h6>100 items in stock</h6>
					<!-- <p><?php echo $xe['mota']; ?></p> -->
					<div class="share">
						<h5>Share Product :</h5>
						<ul class="share_nav">
							<li><a href="https://www.facebook.com/"><img src="images/facebook.png" title="facebook"></a></li>
							<li><a href="https://twitter.com/?lang=vi"><img src="images/twitter.png" title="Twiiter"></a></li>
							<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
							<li><a href="https://www.google.com/"><img src="images/gpluse.png" title="Google+"></a></li>
						</ul>
					</div>


				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="toogle">
				<h3 class="m_3">Product Details</h3>
				<p class="m_text">
					<?php echo $xe['mota']; ?>
				</p>
			</div><br><br>


			<?php
				$maxe=isset($_GET['maxe'])?$_GET['maxe']:'';
				$maloai=isset($_GET['maloai'])?$_GET['maloai']:'';
				$paraMa=[$maxe, $maloai,];
				$sqlLoai = "SELECT * FROM xe WHERE maloai ='$maloai' AND maxe <> '$maxe' ";
				$st = $conn->prepare($sqlLoai);
				$st->execute($para);
				$dataLoai = $st->fetchAll(PDO::FETCH_ASSOC);
				//var_dump($para);exit;
			?>
			<h2>OTHER PRODUCTS</h2>
			<ul id="flexiselDemo1">
				<?php
					$sqlRan = "SELECT * FROM xe ORDER BY RAND ( ) LIMIT 5";
					$stmt = $conn->prepare($sqlRan);
					$stmt->execute();
					$dataRan = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach($dataRan as $key=>$value){
				?>
				<li><img src="images/pro_img/<?php echo explode(',',$value['hinh'])[0]; ?>" />
					<div class="grid-flex"><a href="#"><?php echo $value['tenxe']; ?></a>
						<p><?php echo number_format($value['gia']); ?></p>
					</div>
				</li>
				<?php } ?>
			</ul>
			<script type="text/javascript">
				$(window).load(function () {
					$("#flexiselDemo1").flexisel({
						visibleItems: 5,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: {
							portrait: {
								changePoint: 480,
								visibleItems: 1
							},
							landscape: {
								changePoint: 640,
								visibleItems: 2
							},
							tablet: {
								changePoint: 768,
								visibleItems: 3
							}
						}
					});

				});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>

		</div>

		<!--Menu Left-->
		<div class="sub-cate">
			<?php
        	include './includes/menuleft.php'
        	?>


		</div>
		<div class="clearfix"> </div>
	</div>

	<!-- FOOTER-->
	<?php
		include './includes/footer.php';
	?>

</body>

</html>