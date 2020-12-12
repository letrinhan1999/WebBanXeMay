<!-- Câu 1: upload and insert -->
<?php
    include './includes/connect.php';



    // Thêm 1 sản phẩm vào DB:
if(isset($_POST["submitAdd"])) {
        
    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
        // Dữ liệu gửi lên server không bằng phương thức post
        echo '<script language="javascript">'; 
		echo 'alert("Phải Post dữ liệu !!! ")'; 
        echo '</script>';
        die;
        echo '<script type="text/javascript">
           window.location = "addPro_admin.php" </script>';
    }

    if(strlen($_FILES["hinh"]["name"]) > 40){
        echo '<script language="javascript">'; 
		echo 'alert("Tên file quá dài !!! ")'; 
        echo '</script>';
        die;
        echo '<script type="text/javascript">
           window.location = "addPro_admin.php" </script>';
    }
        

    // Kiểm tra có dữ liệu fileupload trong $_FILES không
    // Nếu không có thì dừng
    if (!isset($_FILES["hinh"]) && !(strlen($_FILES["hinh"]["name"]) >= 40))
    {
        echo '<script language="javascript">'; 
		echo 'alert("Dữ liệu không đúng cấu trúc !!! ")'; 
        echo '</script>';
        echo '<script type="text/javascript">
           window.location = "addPro_admin.php.php" </script>';
        die;
    }

    // Kiểm tra dữ liệu có bị lỗi không
    if ($_FILES["hinh"]['error'] != 0)
    {
        //echo "Dữ liệu upload bị lỗi <a href=".'index.php'.">Tiếp tục</a>";
        echo '<script language="javascript">'; 
		echo 'alert("Dữ liệu upload bị lỗi !!! ")'; 
        echo '</script>';
        echo '<script type="text/javascript">
           window.location = "addPro_admin.php" </script>';
        die;
    } 

    $maxe = isset($_POST['txtMa'])?$_POST['txtMa']:'';
    $tenxe = isset($_POST['txtName'])?$_POST['txtName']:'';
    $mota = isset($_POST['txtDetail'])?$_POST['txtDetail']:'';
    $gia = isset($_POST['txtCost'])?$_POST['txtCost']:'';
    $loai = isset($_POST['maloai'])?$_POST['maloai']:'';
    $hinh = isset($_FILES['hinh']['error'])?$_FILES['hinh']['name']:'';
    $arr = [
        $maxe,
        $tenxe,
        $mota,
        $gia,
        $hinh,
        $loai,
    ];


    $target_dir    = "images/pro_img/";
    $target_file   = $target_dir . basename($_FILES["hinh"]["name"]);
    $allowUpload   = true;

    //Lấy phần mở rộng của file (jpg, png, ...)
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $maxfilesize   = 100000;
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

    if(isset($_POST["submitAdd"])) {
        //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
        $check = getimagesize($_FILES["hinh"]["tmp_name"]);
        if( $check !== false)
        {
            echo "Đây là file ảnh - " . $check["mime"] . ".";
            $allowUpload = true;
        }
        else
        {
            echo '<script language="javascript">'; 
            echo 'alert("Không phải file ảnh !!! Hoặc tên ảnh quá dài")'; 
            echo '</script>';
            $allowUpload = false;
            echo '<script type="text/javascript">
                window.location = "addPro_admin.php" </script>';
        }
    }

    if ($_FILES["hinh"]["size"] > $maxfilesize && !in_array($imageFileType,$allowtypes ))
    {
        echo "Không được upload ảnh lớn hơn $maxfilesize (bytes). Và Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
        $allowUpload = false;
        echo '<script type="text/javascript">
           window.location = "addPro_admin.php" </script>';
    }


    // Upload File thành công
    if ($allowUpload)
    {
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file))
        {
            $sql="INSERT INTO xe (maxe, tenxe, mota, gia,  hinh, maloai)  
                        VALUES (?,       ?,      ?,    ?,     ?,    ?)";
            $stm= $conn->prepare($sql);
            $stm->execute($arr);

            echo "<br>File ". basename( $_FILES["hinh"]["name"]).
            " Đã upload thành công.<br>";
            echo "File lưu tại " . $target_file; 
        }
        else{
            echo '<script language="javascript">'; 
            echo 'alert("Có lỗi xảy ra khi upload file")'; 
            echo '</script>';
            echo '<script type="text/javascript">
                window.location = "addPro_admin.php" </script>';
        }
    }
    else{
        echo '<script language="javascript">'; 
        echo 'alert("Không upload được file, có thể do file lớn, kiểu file không đúng ...")'; 
        echo '</script>';
        echo '<script type="text/javascript">
           window.location = "addPro_admin.php" </script>';
    }
    echo '<script type="text/javascript">
           window.location = "addPro_admin.php" </script>';
}



    // THÊM LOẠI


?>