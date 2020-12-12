<?php
    include "./includes/connect.php";
    session_start();

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



    <style>
        .rsidebar {
            margin-left: 12px;
        }

        /* My CSS */
        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;
        }

        table {
            padding: 0;
            border: none;
            border-collapse: collapse;
            border: 1px solid #ddd;
            width: 1170px;
            margin: 50px auto 10px;
        }

        table td {
            padding: 0;
            border: none;
            border-collapse: collapse;
        }

        a {
            color: #666;
            text-decoration: none;
        }

        .table tr>td,
        .table tr>th {
            border: 1px solid #ddd;
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
            font-weight: normal;
        }

        .cart_avail {
            text-align: center;
        }

        img {
            vertical-align: top;
            max-width: 100%;
        }

        .cart_summary>thead,
        .cart_summary>tfoot {
            background: #f7f7f7;
            font-size: 16px;
        }

        .cart_summary td.cart_product {
            width: 120px;
            padding: 15px;
        }

        .page-order .cart_description {
            font-size: 14px;
        }

        .page-order .product-name {
            font-size: 16px;
        }

        .cart_summary td {
            vertical-align: middle !important;
            padding: 20px;
        }

        a {
            color: #666;
            text-decoration: none;
            outline: none !important;
        }

        .cart_avail .label {
            white-space: normal;
            display: inline-block;
            padding: 6px 10px;
            font-size: 14px;
            border-radius: 0px;
        }

        .cart_summary .price {
            text-align: right;
        }

        .cart_summary .qty {
            text-align: center;
            width: 100px;
        }

        .cart_summary .qty a:hover {
            background: #ff3366;
            color: #fff;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        .form-control:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
        }

        .input-sm {
            height: 30px;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }

        .cart_summary .qty input {
            text-align: center;
            max-width: 64px;
            margin: 0 auto;
            border-radius: 0px;
            border: 1px solid #eaeaea;
        }

        .cart_avail .label-success {
            background: #FFF;
            border: 1px solid #55c65e;
            color: #48b151;
            font-weight: normal;
        }

        .cart_summary .qty a {
            padding: 8px 10px 5px 10px;
            border: 1px solid #eaeaea;
            display: inline-block;
            width: auto;
            margin-top: 5px;
        }

        .cart_summary .action {
            text-align: center;
        }

        .cart_summary .action a {
            background: url(https://i.imgur.com/wBgtljO.png) no-repeat center center;
            font-size: 0;
            height: 9px;
            width: 9px;
            display: inline-block;
            line-height: 24px;
        }

        .cart_summary tfoot {
            text-align: right;
        }

        .cart_navigation {
            margin: 10px 10% 40px;
            float: left;
            width: 80%;
        }

        .cart_navigation a.prev-btn {
            float: left;
        }

        .cart_navigation a {
            padding: 10px 20px;
            border: 1px solid #eaeaea;
        }

        .cart_navigation a.prev-btn:before {
            font: normal normal normal 14px/1 FontAwesome;
            content: "\f104";
            padding-right: 15px;
        }

        .cart_navigation a.next-btn {
            float: right;
            background: #ff3366;
            color: #fff;
            border: 1px solid #ff3366;
        }

        .cart_navigation a:hover {
            background: #ff3366;
            color: #fff;
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

            <?php
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
            if(isset($_GET['action'])){
                switch ($_GET['action']) {
                    case "add":
                        foreach ($_POST['txtSluong'] as $id => $Soluong ){
                            $_SESSION['cart'][$id] = $Soluong;
                            //var_dump($_SESSION['cart']);exit;
                        }
                    break;
                }
            }
            if (!empty($_SESSION['cart'])){
                //$sql = "SELECT * FROM xe WHERE maxe IN ('SH150', 'AB19')";
                $sql = "SELECT * FROM xe WHERE maxe IN (".implode(",",array_keys($_SESSION['cart'])).")";
                var_dump(implode(",",array_keys($_SESSION['cart'])));exit;
                $stmt = $conn -> prepare($sql);
                $stmt->execute();
                /* $cart=$stmt->fetchAll(PDO::FETCH_ASSOC); */
            }


            ?>

            <!-- grids_of_4 -->
            <!-- Giỏ hàng -->
            <div class="wrapper">
                <form action="cart.php?action=submit" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered cart_summary">
                        <thead>
                            <tr>
                                <th class="cart_product">STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th class="action"><i class="fa fa-trash-o"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $num = 0;
                                while($cart=$stmt->fetch(PDO::FETCH_ASSOC)){
                                    
                            ?>
                            <tr>
                                <td class="cart_product"><?=$num++ ?>
                                    <!-- <a href="#"><img src="product-100x122.jpg" alt="Product">
                                    </a> -->
                                </td>
                                <td class="cart_description"> <?php echo $cart['tenxe']; ?> </td> <!-- Tên xe -->
                                <td class="cart_avail"> Hình
                                    <?php /* echo explode(',',$cart['hinh'])[0]; */ ?>
                                </td>
                                <td class="price">
                                    <span class="actual"><?php echo number_format($cart['gia']); ?> VND</span>
                                </td>
                                <td class="qty"> <!-- Số lượng -->
                                    <input class="form-control input-sm" name="txtSluong[<?php echo $cart['maxe']; ?>]" type="text" value="1">
                                    <a href="#"><i class="fa fa-caret-up"></i></a>
                                    <a href="#"><i class="fa fa-caret-down"></i></a>
                                </td>
                                <td class="price">  <!-- Thành tiền -->
                                    <span class="actual"><?php echo number_format($cart['gia']); ?> VND</span>
                                </td>
                                <td class="action">
                                    <a href="#">Delete item</a>
                                </td>
                            </tr>
                            <?php $num++; } ?>

                            <!-- <tr>
                                <td class="cart_product">
                                    <a href="#"><img src="product-100x122.jpg" alt="Product">
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="#">Frederique Constant </a>
                                    </p>
                                    <small class="cart_ref">SKU : #123654999</small>
                                    <br>
                                    <small><a href="#">Color : Beige</a></small>
                                    <br>
                                    <small><a href="#">Size : S</a></small>
                                </td>
                                <td class="cart_avail"><span class="label label-success">In stock</span>
                                </td>
                                <td class="price"><span>61,19 VND</span>
                                </td>
                                <td class="qty">
                                    <input class="form-control input-sm" name="txtSluong[]" type="text" value="1">
                                    <a href="#"><i class="fa fa-caret-up"></i></a>
                                    <a href="#"><i class="fa fa-caret-down"></i></a>
                                </td>
                                <td class="price">
                                    <span>61,19 VND</span>
                                </td>
                                <td class="action">
                                    <a href="#">Delete item</a>
                                </td>
                            </tr> -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" rowspan="2"></td>
                                <td colspan="3">Total products (tax incl.)</td>
                                <td colspan="2">122.38 €</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Total</strong>
                                </td>
                                <td colspan="2"><strong>122.38 €</strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="cart_navigation " id="">
                        <a class="prev-btn" href="#">Continue shopping</a>
                        <input type="submit" name="submitCNhat"  value="Cập Nhật">
                        <!-- <a class="next-btn" href="#">Proceed to checkout</a> -->
                    </div>
                    <hr>
                    
                    <table>
                        <tr>
                            <td>Người nhận: </td>
                            <td><input type="text" name="txtTen" value=""></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại: </td>
                            <td><input type="text" name="txtSdt" value=""></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ: </td>
                            <td><input type="text" name="txtDc" value="" ></td>
                        </tr>
                        <tr>
                            <td>Ghi chú: </td>
                            <td><textarea name="txtGChu" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                    </table>
                    <div class=""></div>
                    <input type="submit" name="submitDHang" value="Đặt Hàng">
                </form>
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

