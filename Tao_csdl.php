<?php
    include 'ketnoi.php' ;
    $conn=MoKetNoi();
    if($conn->connect_error)
    {
        echo "không kết nối được MySQL";
    }
   
    $sql="CREATE DATABASE IF NOT EXISTS  Akai";
    if(!mysqli_query($conn,$sql))
    {
            echo "không tạo được database ".mysqli_error($conn);
    }
    mysqli_select_db($conn,"Akai");

    $LOAI = "CREATE TABLE IF NOT EXISTS LOAI (
        MATL varchar(20) primary key,
        TENTL nvarchar(200) not null)";
    $results = mysqli_query($conn,$LOAI)or die (mysqli_error($conn));

    $SANPHAM = "CREATE TABLE IF NOT EXISTS SANPHAM (
        MASP varchar(20) primary key,
        TENSP nvarchar(200) not null,
        THUONGHIEU nvarchar(200) not null,
        CHATLIEU nvarchar(200) not null,
        MAUDAY nvarchar(200),
        MAUMAT nvarchar(200),
        MANHOM nvarchar(200) not null,
        CHIEURONGDAY nvarchar(10),
        DODAYMAT nvarchar(10),
        CAUTAOMAY nvarchar(200),
        CHONGNUOC nvarchar(200),
        HINH longblob,
        MATL varchar(20) not null,
        SOLUONG int default 12,
        GIA int)";
    $results = mysqli_query($conn,$SANPHAM)or die (mysqli_error($conn));
    
    $NHOMSP = "CREATE TABLE IF NOT EXISTS NHOMSP(
        MANHOM varchar(20) primary key,
        TENNHOM nvarchar(200) not null,
        MOTA nvarchar(2000))";
    $results = mysqli_query($conn,$NHOMSP) or die(mysqli_error($conn));

    $CHITIETDONHANG="CREATE TABLE IF NOT EXISTS CHITIETDONHANG(
            MADH int(10) NOT NULL,
            MAKH int(10) NOT NULL,
            MASP varchar(20) NOT NULL,
            DONGIA int,
            SOLUONG int,
            GIAMGIA float,
            PRIMARY KEY (MADH, MASP),
            FOREIGN KEY (MASP) REFERENCES SANPHAM(MASP))";
    $results = mysqli_query($conn,$CHITIETDONHANG)or die (mysqli_error($conn));
    
    $NGUOIDUNG = "CREATE TABLE IF NOT EXISTS NGUOIDUNG (
        MAKH INT AUTO_INCREMENT PRIMARY KEY,
        TENDANGNHAP nvarchar(200) NOT NULL,
        MATKHAU varchar(200) NOT NULL,
        SODT int default 0,
        HOTEN nvarchar(200) NOT NULL,
        NGAYSINH nvarchar (200),
        DIACHI nvarchar(200) not null,
        PHANLOAI varchar(10) default 'user')";
    $results = mysqli_query($conn,$NGUOIDUNG)or die (mysqli_error($conn));
    
    $DONHANG="CREATE TABLE IF NOT EXISTS DONHANG(
        MAKH int, 
        TENDANGNHAP nvarchar(200) not null,
        MADH int(10) not null,
        DIACHI nvarchar(200),
        SODT int,
        HOTEN nvarchar(200),
        NGAYDAT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        TONGTIEN int,
        THANHTOAN nvarchar(200),    
        FOREIGN KEY (MAKH) REFERENCES NGUOIDUNG(MAKH),
        FOREIGN KEY (MADH) REFERENCES CHITIETDONHANG(MADH)
        )";
        $results = mysqli_query($conn,$DONHANG)or die (mysqli_error($conn));

    $DataLOAI="INSERT INTO LOAI (MATL,TENTL)". 
            "VALUES ('DW','DANIEL WELLINGTON'),
            ('SK','SEIKO'),
            ('CS','CASIO'),
            ('OR','ORIENT'),
            ('FS','FOSSIL')
            ";
    $results = mysqli_query($conn,$DataLOAI) or die (mysqli_error($conn));
    
    $DataNGUOIDUNG="INSERT INTO NGUOIDUNG (MAKH,TENDANGNHAP,MATKHAU,SODT,HOTEN,NGAYSINH,DIACHI,PHANLOAI)". 
                "VALUES ('0','hhai.lanh.00@gmail.com','123','0777768169','Akai','31-10-2000','116/33 NVL','admin')";
    $results = mysqli_query($conn,$DataNGUOIDUNG) or die (mysqli_error($conn));

    $DataSANPHAM = "INSERT INTO SANPHAM (MASP, TENSP, THUONGHIEU, CHATLIEU, MAUDAY, MAUMAT, CHIEURONGDAY, DODAYMAT, CAUTAOMAY, CHONGNUOC, HINH, SOLUONG, GIA, MATL)"." VALUES
    ('DW01', 'CLASSIC BLACK BAYSWATER', 'DANIEL WELLINGTON', 'Dây Nato', 'Màu xanh', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/1.jpg', 12, 2100000,'DW'),
    ('DW02', 'CLASSIC BLACK BRISTOL', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu sẫm', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/2.jpg', 10, 1900000,'DW'),
    ('DW03', 'CLASSIC BLACK CORNWALL', 'DANIEL WELLINGTON', 'Dây Nato', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/3.jpg', 20, 1950000,'DW'),
    ('DW04', 'CLASSIC BLACK DURHAM', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/4.jpg', 15, 1950000,'DW'),
    ('DW05', 'CLASSIC BLACK READING', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/5.jpg', 21, 1900000,'DW'),
    ('DW06', 'CLASSIC SHEFFIEDL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/6.jpg', 12, 2050000,'DW'),
    ('DW07', 'CLASSIC BRISTOL', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/7.jpg', 10, 1800000,'DW'),
    ('DW08', 'CLASSIC BRISTOL AMBER', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu nâu', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/8.jpg', 20, 1850000,'DW'),
    ('DW09', 'CLASSIC BRISTOL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/9.jpg', 15, 1900000,'DW'),
    ('DW10', 'CLASSIC MESH ONYX BLACK', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/10.jpg', 21, 1850000,'DW'),
    ('DW11', 'CLASSIC MESH ONYX STERLING', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/11.jpg', 20, 1800000,'DW'),
    ('DW12', 'ICONIC SHEFFIELD RG', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/12.jpg', 15, 2600000,'DW'),
    ('DW13', 'ICONIC CHRONOGRAPH S', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu xanh lục', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/13.jpg', 21, 2650000,'DW'),
    ('DW14', 'ICONIC CHRONOGRAPH GM', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu đồng', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/14.jpg', 21, 2800000,'DW'),
    ('DW15', 'ICONIC CHRONOGRAPH BLACK', 'DANIEL WELLINGTON', 'Dây cao su', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/15.jpg', 21, 2800000,'DW'),
    ('DW16', 'ICONIC CHRONOGRAPH ONYX G', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu vàng lợt', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/16.jpg', 21, 2700000,'DW'),

    ('SK01', 'SEIKO Prospex J009', 'SEIKO', 'Dây kim loại', 'Màu bạc', 'Màu xanh lục', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/17.jpg', 18, 6500000,'SK'),
    ('SK02', 'SEIKO 5 Sports J81K1', 'SEIKO', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/18.jpg', 14, 6820000,'SK'),
    ('SK03', 'SEIKO Prospex C819P1', 'SEIKO', 'Dây Nato', 'Màu xanh', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/19.jpg', 20, 8700000,'SK'),
    ('SK04', 'SEIKO Prospex C815P1', 'SEIKO', 'Dây Nato', 'Màu xanh', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/20.jpg', 16, 9760000,'SK'),
    ('SK05', 'SEIKO Prospex E571P1', 'SEIKO', 'Dây Nato', 'Màu xanh', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/21.jpg', 22, 13230000,'SK'),
    ('SK06', 'CLASSIC SHEFFIEDL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/6.jpg', 12, 2050000,'SK'),
    ('SK07', 'CLASSIC BRISTOL', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/7.jpg', 10, 1800000,'SK'),
    ('SK08', 'CLASSIC BRISTOL AMBER', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu nâu', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/8.jpg', 20, 1850000,'SK'),
    ('SK09', 'CLASSIC BRISTOL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/9.jpg', 15, 1900000,'SK'),
    ('SK10', 'CLASSIC MESH ONYX BLACK', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/10.jpg', 21, 1850000,'SK'),
    ('SK11', 'CLASSIC MESH ONYX STERLING', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/11.jpg', 20, 1800000,'SK'),
    ('SK12', 'ICONIC SHEFFIELD RG', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/12.jpg', 15, 2600000,'SK'),
    ('SK13', 'ICONIC CHRONOGRAPH S', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu xanh lục', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/13.jpg', 21, 2650000,'SK'),
    ('SK14', 'ICONIC CHRONOGRAPH GM', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu đồng', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/14.jpg', 21, 2800000,'SK'),
    ('SK15', 'ICONIC CHRONOGRAPH BLACK', 'DANIEL WELLINGTON', 'Dây cao su', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/15.jpg', 21, 2800000,'SK'),
    ('SK16', 'ICONIC CHRONOGRAPH ONYX G', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu vàng lợt', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/16.jpg', 21, 2700000,'SK'),

    ('CS11', 'CASIO 1375L-7AVDF', 'CASIO', 'Dây da', 'Màu đen', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/22.jpg', 15, 1570000,'CS'),
    ('CS12', 'CASIO 1374L-1AVDF', 'CASIO', 'Dây da', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/23.jpg', 8, 1570000,'CS'),
    ('CS13', 'CASIO 1384L-1AVDF', 'CASIO', 'Dây da', 'Màu nâu', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/24.jpg', 12, 1630000,'CS'),
    ('CS14', 'CASIO VT01D-1BUDF', 'CASIO', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/25.jpg', 10, 870000,'CS'),
    ('CS15', 'CASIO 100D-2AVDF', 'CASIO', 'Dây kim loại', 'Màu bạc', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/26.jpg', 14, 2040000,'CS'),
    ('CS16', 'CLASSIC SHEFFIEDL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/6.jpg', 12, 2050000,'CS'),
    ('CS17', 'CLASSIC BRISTOL', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/7.jpg', 10, 1800000,'CS'),
    ('CS18', 'CLASSIC BRISTOL AMBER', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu nâu', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/8.jpg', 20, 1850000,'CS'),
    ('CS19', 'CLASSIC BRISTOL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/9.jpg', 15, 1900000,'CS'),
    ('CS20', 'CLASSIC MESH ONYX BLACK', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/10.jpg', 21, 1850000,'CS'),
    ('CS21', 'CLASSIC MESH ONYX STERLING', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/11.jpg', 20, 1800000,'CS'),
    ('CS22', 'ICONIC SHEFFIELD RG', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/12.jpg', 15, 2600000,'CS'),
    ('CS23', 'ICONIC CHRONOGRAPH S', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu xanh lục', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/13.jpg', 21, 2650000,'CS'),
    ('CS24', 'ICONIC CHRONOGRAPH GM', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu đồng', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/14.jpg', 21, 2800000,'CS'),
    ('CS25', 'ICONIC CHRONOGRAPH BLACK', 'DANIEL WELLINGTON', 'Dây cao su', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/15.jpg', 21, 2800000,'CS'),
    ('CS26', 'ICONIC CHRONOGRAPH ONYX G', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu vàng lợt', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/16.jpg', 21, 2700000,'CS'),
    
    ('OR11', 'Orient 3Star 04C9', 'ORIENT', 'Dây da', 'Màu đen', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/28.png', 15, 4890000,'OR'),
    ('OR12', 'Orient 3Star B19B', 'ORIENT', 'Dây da', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/29.png', 8, 5570000,'OR'),
    ('OR13', 'Orient 3Star 5S19B', 'ORIENT', 'Dây da', 'Màu nâu', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/30.png', 12, 1630000,'OR'),
    ('OR14', 'Orient 3Star 5S19B', 'ORIENT', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/31.png', 10, 4330000,'OR'),
    ('OR15', 'CASIO 100D-2AVDF', 'CASIO', 'Dây kim loại', 'Màu bạc', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/26.jpg', 14, 2040000,'OR'),
    ('OR16', 'CLASSIC SHEFFIEDL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/6.jpg', 12, 2050000,'OR'),
    ('OR17', 'CLASSIC BRISTOL', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/7.jpg', 10, 1800000,'OR'),
    ('OR18', 'CLASSIC BRISTOL AMBER', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu nâu', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/8.jpg', 20, 1850000,'OR'),
    ('OR19', 'CLASSIC BRISTOL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/9.jpg', 15, 1900000,'OR'),
    ('OR20', 'CLASSIC MESH ONYX BLACK', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/10.jpg', 21, 1850000,'OR'),
    ('OR21', 'CLASSIC MESH ONYX STERLING', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/11.jpg', 20, 1800000,'OR'),
    ('OR22', 'ICONIC SHEFFIELD RG', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/12.jpg', 15, 2600000,'OR'),
    ('OR23', 'ICONIC CHRONOGRAPH S', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu xanh lục', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/13.jpg', 21, 2650000,'OR'),
    ('OR24', 'ICONIC CHRONOGRAPH GM', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu đồng', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/14.jpg', 21, 2800000,'OR'),
    ('OR25', 'ICONIC CHRONOGRAPH BLACK', 'DANIEL WELLINGTON', 'Dây cao su', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/15.jpg', 21, 2800000,'OR'),
    ('OR26', 'ICONIC CHRONOGRAPH ONYX G', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu vàng lợt', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/16.jpg', 21, 2700000,'OR'),

    ('FS11', 'CASIO 1375L-7AVDF', 'CASIO', 'Dây da', 'Màu đen', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/22.jpg', 15, 1570000,' FS'),
    ('FS12', 'CASIO 1374L-1AVDF', 'CASIO', 'Dây da', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/23.jpg', 8, 1570000,'FS'),
    ('FS13', 'CASIO 1384L-1AVDF', 'CASIO', 'Dây da', 'Màu nâu', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/24.jpg', 12, 1630000,'FS'),
    ('FS14', 'CASIO VT01D-1BUDF', 'CASIO', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/25.jpg', 10, 870000,'FS'),
    ('FS15', 'CASIO 100D-2AVDF', 'CASIO', 'Dây kim loại', 'Màu bạc', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/26.jpg', 14, 2040000,'FS'),
    ('FS16', 'CLASSIC SHEFFIEDL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/6.jpg', 12, 2050000,'FS'),
    ('FS17', 'CLASSIC BRISTOL', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/7.jpg', 10, 1800000,'FS'),
    ('FS18', 'CLASSIC BRISTOL AMBER', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu nâu', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/8.jpg', 20, 1850000,'FS'),
    ('FS19', 'CLASSIC BRISTOL ARCTIC', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu nâu', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/9.jpg', 15, 1900000,'FS'),
    ('FS20', 'CLASSIC MESH ONYX BLACK', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/10.jpg', 21, 1850000,'FS'),
    ('FS21', 'CLASSIC MESH ONYX STERLING', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/11.jpg', 20, 1800000,'FS'),
    ('FS22', 'ICONIC SHEFFIELD RG', 'DANIEL WELLINGTON', 'Dây da bê Ý', 'Màu đen', 'Màu xanh dương', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/12.jpg', 15, 2600000,'FS'),
    ('FS23', 'ICONIC CHRONOGRAPH S', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu bạc', 'Màu xanh lục', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/13.jpg', 21, 2650000,'FS'),
    ('FS24', 'ICONIC CHRONOGRAPH GM', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu đồng', 'Màu trắng', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/14.jpg', 21, 2800000,'FS'),
    ('FS25', 'ICONIC CHRONOGRAPH BLACK', 'DANIEL WELLINGTON', 'Dây cao su', 'Màu đen', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/15.jpg', 21, 2800000,'FS'),
    ('FS26', 'ICONIC CHRONOGRAPH ONYX G', 'DANIEL WELLINGTON', 'Dây kim loại', 'Màu vàng lợt', 'Màu đen', '20mm', '6mm', 'Japanese Quartz Movement', '3ATM (chống nước mưa)', 'picture/16.jpg', 21, 2700000,'FS')
    ";

$results = mysqli_query($conn, $DataSANPHAM) or die(mysqli_error($conn));

    DongKetNoi($conn);
?>