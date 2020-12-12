<?php
    include "./includes/connect.php";
    session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){
        unset($_SESSION['username']);
        echo 'Bạn đã đăng xuất thành công.';
        //header("location: index.php");
        echo '<script type="text/javascript">
           window.location = "index.php" </script>';
    }

?>