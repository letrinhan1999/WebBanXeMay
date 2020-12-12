<?php
    include('./includes/admin/head.php');
    include('./includes/connect.php');
    session_start();
    if(!isset($_SESSION['username'])){
        echo '<script type="text/javascript">
            window.location = "loginAdmin.php" </script>';
    }
    /* $sql="select * from loai";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $loai = $stmt->fetchAll(PDO::FETCH_ASSOC); */
?>

<!DOCTYPE html>
<html>
<head>
<title>Document</title>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
    
<style>
    .cover_create {
        height: auto;
        width: 1100px;
        background: #e6dede;
        box-shadow: 5px 5px 5px #cccccc;
        margin-left: 80px;
        margin-top: 40px;

    }

    .cover_content {
        margin: 20px;

    }

    .form_title {
        margin-bottom: 30px;
    }

    .form_bodyleft {
        margin-left: 50px;
    }

    .form_bodyleft img {
        width: 400px;
        height: 330px;
    }

    .form_title p,
    .form_bodyright p {
        font-size: 23px;
        font-family: 'FS Core Magic Rough';
        font-weight: bold;
        margin-bottom: -2px;
    }

    .form_bodyright input[type="text"] {
        width: 521px;
        height: 40px;
        border: none;
        outline: none;
        color: #000000;
    }

    .form_title input[type="text"] {
        border: none;
        outline: none;
        width: 600px;
        height: 40px;
        color: #000000;
    }

    input[type="file"] {
        padding-top: 20px;
    }

    .form_bodyleft,
    .form_bodyright {
        padding-top: 20px;
    }

    .drink_item {
        padding-bottom: 40px;
        padding-top: 20px;
    }

    .complete,
    .add {
        float: right;
    }

    .btn-primary,
    .btn-success {
        margin: 0 -60px 10px 70px;
    }

    .btn-danger {
        float: right;
        margin-top: -45px;
    }

    textarea {
        border: none;
        outline: none;
        margin-bottom: 10px;
    }

    .username {
        font-size: 20px;
        font-family: 'FS Core Magic Rough';
        font-weight: bold;
        color: #ffffff;

    }
</style>
</head>

<body>
    <input type="checkbox" id="check">

    <header>
        <?php
            include "./includes/admin/header_admin.php";
        ?>
    </header>

    <!-- Menu Left -->
    <div class="sidebar">
        <?php
            include "./includes/admin/menuleft_ad.php";
        ?>
    </div>


    <div class="content">
        <!-- <div class="women-product"> -->
            

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
                                <h6><a href="single.php?maxe=<?php echo $xe['maxe']; ?>"><?php echo $xe['tenxe']; ?></a>
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
					echo '<a href="viewType_admin.php?maloai='.$_GET['maloai'].'&trang='.$i.'" class="pages"> '.$i.' </a> ';

			else {
				for($i=1;$i<=$sotrang;$i++)
					echo '<a href="viewType_admin.php?trang='.$i.'"class="pages"> '.$i.' </a> ';
			}
		?>

                </div>
                <div class="clearfix"> </div>
            <!-- </div> -->
        </div>

    </div>


    <!-- FOOTER -->

    <?php
        include('./script.php');
    ?>

</body>

</html>