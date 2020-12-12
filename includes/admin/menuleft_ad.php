<center>
    <img src="./images/layout/SYM.png" class="avatar" alt="avatar">
    <div class="username">
        <?php
                if(isset($_SESSION['username']))
                        echo "Xin chao ",$_SESSION['username'];
                    else{
                ?>
        <a href="loginAdmin.php">Đăng nhập</a>
        <?php
            //header("location: loginAdmin.php");
        ?>
        <?php } ?>
    </div>

</center>
<a href="admin.php"><i class="fas fa-desktop"></i><span> Statistical</span></a>

<div class="dropdown">
    <button class="dropdown-btn">
        <i class="fas fa-th"></i>
        Quản lí
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="addType_admin.php"> Quản lí loại </a>
        <a href="addPro_admin.php"> Quản lí thông tin sản phẩm</a>
    </div>
    <button class="dropdown-btn">
        <i class="fas fa-th"></i>
        Chi tiết
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="viewType_admin.php"> Xem loại </a>
        <a href="viewPro_admin.php"> Xem thông tin sản phấm</a>
        <a href="#"> Xem hoa don</a>
    </div>
</div>
<a href="#"><i class="fas fa-info-circle"></i><span> About</span></a>
<a href="#"><i class="fas fa-sliders-h"></i><span> Settings</span></a>
<a href="logout.php"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
<a href="logout.php"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
