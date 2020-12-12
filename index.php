<?php
    include('./includes/connect.php');
    
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
        include "./includes/client/head.php";
    ?>
</head>

<body>
    <!--HEAD-->
    <?php
        include './includes/header.php';
    ?>

    <!--CONTENT-->
    <div class="container-fluid"> 
        <div class="shoes-grid">
        <h1><a href="https://github.com/letrinhan1999/WebBanXeMay.git">Link GITHUB: https://github.com/letrinhan1999/WebBanXeMay.git</a></h1>
            <a href="index.php?maloai=06">
                <div class="wrap-in">
                    <div class="wmuSlider example1 slide-grid">
                        <div class="wmuSliderWrapper">
                        <?php
                            $i = 0;
                            $sql="SELECT * FROM xe WHERE maloai='06'";
                            $stmt=$conn->prepare($sql);
                            $stmt->execute();
                            while($xe=$stmt->fetch(PDO::FETCH_ASSOC)){
                                if($i<3){
                        ?>
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-matter">
                                    <div class="col-md-5 banner-bag">
                                        <img class="img-responsive "
                                            src="images/pro_img/<?php echo explode(',',$xe['hinh'])[0]; ?>" alt=" " />
                                    </div>
                                    <div class="col-md-7 banner-off">
                                        <h3><?php echo $xe['tenxe']; ?></h3>
                                        <h2>FLAT 50% 0FF</h2>
                                        <label>FOR ALL PURCHASE <b>VALUE</b></label>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et </p>
                                        <span class="on-get">GET NOW</span>
                                    </div>

                                    <div class="clearfix"> </div>
                                </div>

                            </article>
                            <?php  }
                            }
                        ?>

                        </div>
            </a>
            <ul class="wmuSliderPagination">
                <li><a href="#" class="">0</a></li>
                <li><a href="#" class="">1</a></li>
                <li><a href="#" class="">2</a></li>
            </ul>
            <script src="js/jquery.wmuSlider.js"></script>
            <script>
                $('.example1').wmuSlider();         
            </script>
        </div>
    </div>
    <!-- </a> -->

    <!-- 2 sản phẩm random -->
    <div class="shoes-grid-left">
        <a href="single.php">
            <div class="col-md-6 con-sed-grid">

                <div class=" elit-grid">

                    <h4>consectetur elit</h4>
                    <label>FOR ALL PURCHASE VALUE</label>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
                    <span class="on-get">GET NOW</span>
                </div>
                <img class="img-responsive shoe-left" src="images/sh.jpg" alt=" " />

                <div class="clearfix"> </div>

            </div>
        </a>
        <a href="single.php">
            <div class="col-md-6 con-sed-grid sed-left-top">
                <div class=" elit-grid">
                    <h4>consectetur elit</h4>
                    <label>FOR ALL PURCHASE VALUE</label>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
                    <span class="on-get">GET NOW</span>
                </div>
                <img class="img-responsive shoe-left" src="images/wa.jpg" alt=" " />

                <div class="clearfix"> </div>
            </div>
        </a>
    </div>

    <!-- Sản phẩm -->
    <?php
    $arrLoai=array();
    $arrLoai[]=isset($_GET['maloai'])?$_GET['maloai']:'';
    $stm = $conn -> prepare('select * from loai where maloai=?');
    $stm->execute($arrLoai);
    $loaixe = $stm->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="products">
        <h5 class="latest-product"><?php echo isset($_GET['maloai'])?$loaixe[0]['tenloai']:'LATEST PRODUCTS' ?></h5>
        <a class="view-all" href="product.php">VIEW ALL<span> </span></a>
    </div>

    <div class="row moto_row">
        <?php
            $para=array();
            $trang=1;
            
            if(isset($_GET['trang']))
                $trang = $_GET['trang'];
            if(isset($_GET['maloai'])){
                $sql="select * from xe where maloai=?";
                //$sql1="select tenloai from loai where maloai=?";
                $para[]=$_GET['maloai'];
            }else
                $sql="select * from xe";
            $sql .= ' limit '.($trang-1)*$xe1trang.','.$xe1trang;
            $stmt=$conn->prepare($sql);
            $stmt->execute($para);
            while($xe=$stmt->fetch(PDO::FETCH_ASSOC)){
                
        ?>
        <div class="col-md-4 moto_col">
            <div class="card">
                <a href="single.php?maxe=<?php echo $xe['maxe']; ?>"><img class="img-responsive chain moto_image"
                        src="images/pro_img/<?php echo explode(',',$xe['hinh'])[0]; ?>" alt=" " /></a>
                <span class="star"> </span>
                <div class="grid-chain-bottom">
                    <h6><a href="single.php?maxe=<?php echo $xe['maxe']; ?>"><?php echo $xe['tenxe']; ?></a></h6>
                    <div class="star-price">
                        <div class="dolor-grid">
                            <span class="actual"><?php echo number_format($xe['gia']); ?> VND</span>
                            <!-- <span class="reducedfrom">400$</span> -->
                            <span class="rating">
                                <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                <label for="rating-input-1-5" class="rating-star1"> </label>
                                <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
                                <label for="rating-input-1-4" class="rating-star1"> </label>
                                <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
                                <label for="rating-input-1-3" class="rating-star"> </label>
                                <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
                                <label for="rating-input-1-2" class="rating-star"> </label>
                                <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
                                <label for="rating-input-1-1" class="rating-star"> </label>
                            </span>
                        </div>
                        <a class="now-get get-cart" href="#">ADD TO CART</a>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>

    <!-- Tinh tong so xe -->
    <?php
    if(isset($_GET['maloai']))
        $sql="select count(*) from xe where maloai=?";
    else
        $sql="select count(*) from xe";
    $stmt=$conn->prepare($sql);
    $stmt->execute($para);
    $tongxe=$stmt->fetchColumn();
    
    $sotrang=ceil($tongxe/$xe1trang);

    echo '<span style="font-size: 20px;">Trang: </span> ';
    if(isset($_GET['maloai']))
        for($i=1;$i<=$sotrang;$i++)
            echo '<a href="index.php?maloai='.$_GET['maloai'].'&trang='.$i.'" class="pages"> '.$i.' </a> ';

    else {
        for($i=1;$i<=$sotrang;$i++)
            echo '<a href="index.php?trang='.$i.'"class="pages"> '.$i.' </a> ';
    }
    ?>


    <div class="products">
        <h5 class="latest-product">Xe nhập khẩu</h5>
        <a class="view-all" href="index.php?maloai=07">VIEW ALL<span> </span></a>
    </div>
    <div class="product-left">
        <?php
            $signature=3;
            $sql="select * from xe where maloai=07";
            //$sql .= ' limit '.($trang-1)*$signature.','.$signature;
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $i=0;
            while($xe=$stmt->fetch(PDO::FETCH_ASSOC)){
                if($i<3){
        ?>
        <div class="col-md-4 moto_col">
            <div class="card">
                <a href="single.php?maxe=<?php echo $xe['maxe']; ?>"><img class="img-responsive chain moto_image"
                        src="images/pro_img/<?php echo explode(',',$xe['hinh'])[0]; ?>" alt=" " /></a>
                <span class="star"> </span>
                <div class="grid-chain-bottom">
                    <h6><a href="single.php?maxe=<?php echo $xe['maxe']; ?>"><?php echo $xe['tenxe']; ?></a></h6>
                    <div class="star-price">
                        <div class="dolor-grid">
                            <span class="actual"><?php echo number_format($xe['gia']); ?> VND</span>
                            <!-- <span class="reducedfrom">400$</span> -->
                            <span class="rating">
                                <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                <label for="rating-input-1-5" class="rating-star1"> </label>
                                <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
                                <label for="rating-input-1-4" class="rating-star1"> </label>
                                <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
                                <label for="rating-input-1-3" class="rating-star"> </label>
                                <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
                                <label for="rating-input-1-2" class="rating-star"> </label>
                                <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
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
            $i++; } 
        ?>

        <div class="clearfix"> </div>
    </div>

    <div class="clearfix"> </div>
    </div>

    <!-- CONTENT Left -->
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