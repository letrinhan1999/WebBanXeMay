<?php
    include('./includes/admin/head.php');
    include('./includes/connect.php');
    session_start();
    /* $sql="select * from loai";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $loai = $stmt->fetchAll(PDO::FETCH_ASSOC); */
    if(!isset($_SESSION['username'])){
        echo '<script type="text/javascript">
            window.location = "loginAdmin.php" </script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Document</title>
    <style>
        .cover_create{
        height: auto;
        width: 1100px;
        background: #e6dede;
        box-shadow: 5px 5px 5px #cccccc;
        margin-left: 80px;
        margin-top: 40px;

    }
    .cover_content{
        margin: 20px;

    }
    .form_title{
        margin-bottom: 30px;
    }
    .form_bodyleft{
        margin-left: 50px;
    }
    .form_bodyleft img{
        width: 400px;
        height: 330px;
    }
    .form_title p, .form_bodyright p{
        font-size: 23px;
        font-family: 'FS Core Magic Rough';
        font-weight: bold;
        margin-bottom: -2px;
    }
    .form_bodyright input[type="text"]{
        width: 521px;
        height: 40px;
        border: none;
        outline: none;
        color: #000000;
    }
    .form_title input[type="text"]{
        border: none;
        outline: none;
        width: 600px;
        height: 40px;
        color: #000000; 
    }
    input[type="file"]{
        padding-top: 20px;
    }
    .form_bodyleft ,.form_bodyright{
        padding-top: 20px;
    }
    .drink_item{
        padding-bottom: 40px;
        padding-top: 20px;
    }
    .complete, .add{
        float: right;
    }
    .btn-primary, .btn-success{
        margin: 0 -60px 10px 70px;
    }
    .btn-danger{
        float: right;
        margin-top: -45px;
    }
    textarea{
        border: none;
        outline: none;
        margin-bottom: 10px;
    }
    .username{
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
    
        <section class="drink-form">
        <h2>Thêm Sản Phẩm:</h2>
                <form action="funcAddProduct.php" method="POST" enctype="multipart/form-data">
                    <!-- Tên loại -->
                    <div class="container">
                        <div class="cover_create">
                            <div class="cover_content">
                                <div class="drink_item">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form_bodyleft">
                                                <img src="./images/layout/HONDA/AB1.png" alt="xe">
                                                <input type="file" name="hinh" value="">
                                            </div>
                                            <div class="form_bodyleft">
                                                <h3>Loai</h3> <select name="maloai" id="">
                                                <?php foreach ($loai as $key => $value) 
                                                { ?>
                                                    <option value="<?php echo isset($_POST['maloai'])?$value['maloai']:$value['maloai'] ?>">
                                                        <?php echo isset($_POST['tenloai'])?$value['tenloai']:$value['tenloai'] ?>
                                                    </option>
                                                    <?php
                                                }?>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col">
                                            <div class="form_bodyright">
                                                <p>Mã xe</p>
                                                <input type="text" placeholder="Nhập mã xe" name="txtMa" value="<?php echo isset($_POST['txtMa'])?$_POST['txtMa']:''  ?>">
                                                <p>Tên xe</p>
                                                <input type="text" placeholder="Nhập tên xe" name="txtName" value="<?php echo isset($_POST['txtName'])?$_POST['txtName']:''  ?>">
                                                <p>giá</p>
                                                <input type="text" placeholder="Nhập giá xe" name="txtCost" value="<?php echo isset($_POST['txtCost'])?$_POST['txtCost']:''  ?>">
                                                <p>Mô tả</p>
                                                <textarea name="txtDetail" id="detail" cols="70" rows="8" placeholder="Nhập mô tả xe">
                                                    <?php echo isset($_POST['txtDetail'])?$_POST['txtDetail']:''  ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="complete btn btn-success" name="submitAdd" type="submit">Complete</button>
            </form>
        </section>
    </div>



    <?php
        include('./script.php');
    ?>
   
</body>
</html>