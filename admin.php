<?php
    include('./includes/admin/head.php');
    include('./includes/connect.php');
    session_start();
    $sql="select * from loai";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $loai = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <h1>
                <?php
                    if(isset($_SESSION['username']))
                        echo "Xin chao ",$_SESSION['username'];
                ?>
            </h1>
        </section>
    </div>



    <?php
        include('./script.php');
    ?>
   
</body>
</html>