<?php
include('db.php'); // Kết nối cơ sở dữ liệu

// Truy vấn để lấy sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legacy Watch Store</title>
    <meta content="Sell Watches " name="keywords">
    <meta content="Sell Watches " name="description">
    <link rel="stylesheet" href="style.css">
    <link href="asset/img/Logo_Store.webp" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>
<body>
    <header class="header-1">
        <div class="top-links">
            <a href="#">Sitemap</a>
            <a href="#">Liên Hệ</a>
            <a href="#">Góp Ý</a>
        </div>
    </header>

    <header class="header-2">
        <div class="logo">
            <img src="asset/img/Logo_Store.webp" alt="Logo" class="logo-img">
            <h1>LGC <span>WATCHSTORE</span></h1>
        </div>

        <div class="search-box">
            <input type="text" placeholder="Tìm kiếm sản phẩm...">
            <button><i class="ti-search"></i></button>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="#">Trang Chủ</a></li>
            <li><a href="#">Sản Phẩm</a></li>
            <li><a href="#">Liên Hệ</a></li>
            <li><a href="#">Giới Thiệu</a></li>
        </ul>
    </nav>

    <div class="cart">
        <button><i class="ti-shopping-cart-full"></i></button>
        <a href="#">Giỏ hàng</a>
    </div>

    <main>
        <section class="highlight">
            <img src="asset/img/gshock.png" alt="Casio G-Shock">
            <div class="details">
                <h2>Đồng Hồ CASIO G-SHOCK G8217</h2>
                <p>Nổi bật với thiết kế cực kỳ thể thao mạnh mẽ, nam tính với màu đen làm chủ đạo và mặt đồng hồ vàng sang trọng. Điểm đặc biệt nhất của GBA-400-1A9 là được trang bị thiết bị Bluetooth SMART, giúp bạn thiết lập kết nối với điện thoại thông minh.</p>
                <button>Chi Tiết</button>
            </div>
        </section>

        <div class="brands">
        <div class="slider">
            <div><img src="asset/img/logo_hinh.png" alt="slider"></div>
            <div><img src="asset/img/logo_hinh.png" alt="slider"></div>
        </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.slider').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            });
        </script>
    </main>

    <div class="s2"><h2>Sản phẩm bán chạy</h2></div>

    <div class="products">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
<div class="sp1">
    <!-- Sử dụng URL trực tiếp từ cơ sở dữ liệu để hiển thị hình ảnh -->
    <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
    <div class="infor">
        <p><?php echo $row['name']; ?></p>
        <p>Giá: <?php echo number_format($row['price'], 0, ',', '.'); ?> VND</p>
    </div>
</div>

        <?php
            }
        } else {
            echo "Không có sản phẩm nào!";
        }
        ?>
    </div>

    <div class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Company Info</h4>
                <p>LgC WATCHSTORE</p>
                <p>Address:12 Street, Binh Duong</p>
                <p>Phone: 123456789</p>
            </div>
            <div class="footer-section">
                <h4>Quick links</h4>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Follow us</h4>
                <p>Follow us on social media!</p>
                <i class="ti-twitter-alt"></i>
                <i class="ti-facebook"></i>
                <i class="ti-youtube"></i>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 LgC WATCHSTORE. All rights reserved.
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
