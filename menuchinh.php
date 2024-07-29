<?php
    if (isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap'])
    {
        echo " <li> <a href ='dangxuat.php'>Đăng xuất</a> </li>";
        if (isset ($_SESSION ['loainguoidung']) && $_SESSION['loainguoidung']=='admin')
        {
            echo " <li> <a href='#'>Danh mục sản phẩm </a> <li>
            <li><a href='#'>Danh mục quản lý</a>
                <ul class='manager'>
                    <li> <a href='#'>Quản lý website</a> </li>
                    <li> <a href='quanlynguoidung.php'>Quản lý người dùng</a> </li>
                    <li> <a href='#'>Quản lý sản phẩm</a> </li>
                    <li> <a href='#'>Quản lý đơn hàng</a> </li>
                </ul>
            </li>
            <li><a href='#'>Sản phẩm</a>
                <ul class='sub-menu'>
                    <li><a href='danhmuc.php?loai=DW'>Daniel Wellington</a></li>
                    <li><a a href='danhmuc.php?loai=SK'>Seiko</a></li>
                    <li><a href='#'>Saga</a></li>
                    <li><a href='#'>Sokolov</a></li>
                    <li><a href='#'>Citizen</a></li>
                    <li><a href='#'>G-Shock</a></li>
                    <li><a href='#'>Fossil</a></li>
                    <li><a href='#'>Orient</a></li>
                </ul>
            </li>
            <li><a href='#'>Tin tức</a></li>
            <li><a href='#'>Tuyển dụng</a></li>";
        }
        if (isset ($_SESSION ['loainguoidung']) && $_SESSION['loainguoidung']=='user')
        {
            echo"
            <li><a href='#'>Giới thiệu</a></li>
            <li><a href='#'>Sản phẩm</a>
                <ul class='sub-menu'>
                    <li><a href='danhmuc.php?loai=DW'>Daniel Wellington</a></li>
                    <li><a a href='danhmuc.php?loai=SK'>Seiko</a></li>
                    <li><a href='#'>Saga</a></li>
                    <li><a href='#'>Sokolov</a></li>
                    <li><a href='#'>Citizen</a></li>
                    <li><a href='#'>G-Shock</a></li>
                    <li><a href='#'>Fossil</a></li>
                    <li><a href='#'>Orient</a></li>
                </ul>
            </li>
            <li><a href='#'>Tin tức</a></li>
            <li><a href='#'>Tuyển dụng</a></li>";
        }
        echo "<li id='islogin'> Xin chào bạn ".$_SESSION['hoten']."</li>";
    }
    else{
            echo"
            <li><a href='#'>Giới thiệu</a></li>
            <li><a href='#'>Sản phẩm</a>
                <ul class='sub-menu'>
                    <li><a href='danhmuc.php?loai=DW'>Daniel Wellington</a></li>
                    <li><a a href='danhmuc.php?loai=SK'>Seiko</a></li>
                    <li><a href='#'>Saga</a></li>
                    <li><a href='#'>Sokolov</a></li>
                    <li><a href='#'>Citizen</a></li>
                    <li><a href='#'>G-Shock</a></li>
                    <li><a href='#'>Fossil</a></li>
                    <li><a href='#'>Orient</a></li>
                </ul>
            </li>
            <li><a href='#'>Tin tức</a></li>
            <li><a href='#'>Tuyển dụng</a></li>";
    }
    ?>