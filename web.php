<?php 

$servername = "localhost"; 
$username = "root";      
$password = "";        
$dbname = "admin-lte"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    
}

$conn->close();

?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Helwina Shopp - Barang Harian</title>
  <link rel="stylesheet" href="/dist/css/web.css">
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div class="logo">Helwina Shopp</div>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="hamburger">&#9776;</label>
    <div class="menu">
      <a href="#">Home</a>
      <a href="#">Produk</a>
      <a href="#">Kontak</a>
    </div>
    <button class="cart">Cart</button>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1>Belanja Kebutuhan Harian Lebih Mudah</h1>
      <p>Dari sabun sampai sembako, semua ada di ShopKu!</p>
      <a href="#" class="hero-btn">Belanja Sekarang</a>
    </div>
  </section>

  <!-- About Section -->
<section class="about-section">
  <div class="about-container">
    <div class="about-image">
      <img src="https://lh5.googleusercontent.com/YOVjx5EeT8vtVEge-HV6TSWRe2wyxPsaWvtiWl6u9jrAIoEnEwfLHZX9NVNZlUYdpG3sqTwWgdljrkGyw5jTv3qAXhgVSdws2I6SChKFVWP2i7ABXiz4s60lTYXsFHWKOQUhrrdjTqP4g0RY-T_gDiU" alt="Warung Harian">
    </div>
    <div class="about-text">
      <h2>Tentang ShopKu</h2>
      <p>ShopKu adalah solusi belanja kebutuhan harian online yang praktis, cepat, dan hemat. Kami menyediakan berbagai barang penting seperti sembako, produk kebersihan, makanan ringan, dan lainnya — langsung dari warung ke rumah Anda!</p>
    </div>
  </div>
</section>

<!-- Product Section -->
<section class="product-section">
  <div class="product-container">
    <?php foreach ($data as $product): ?>
    <div class="product-card">
       <img src="<?php echo htmlspecialchars(isset($product['image']) ? $product['image'] : ''); ?>" alt="<?php echo htmlspecialchars(isset($product['name']) ? $product['name'] : ''); ?>">
      <div class="product-info">
        <h3 class="product-name">Nama Product : <?php echo htmlspecialchars($product['name']); ?></h3>
        <p class="product-description"><span>Deskripsi : </span><?php echo htmlspecialchars($product['desc']); ?></p>
        <p class="product-price"><p class="product-price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p></p>
        <button class="buy-btn">Beli</button>
      </div>
    </div>
       <?php endforeach; ?>
  </div>
</section>


<!-- Footer Section -->
<footer class="footer">
  <div class="footer-container">
    <div class="footer-info">
      <h3>ShopKu</h3>
      <p>&copy; 2025 ShopKu. Semua hak cipta dilindungi.</p>
    </div>
    <div class="footer-links">
      <h4>Link Cepat</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Produk</a></li>
        <li><a href="#">Kontak</a></li>
        <li><a href="#">Tentang Kami</a></li>
      </ul>
    </div>
    <div class="footer-social">
      <h4>Ikuti Kami</h4>
      <ul>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
      </ul>
    </div>
  </div>
</footer>


</body>
</html>
