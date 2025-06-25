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
  <title>Helwina Mart - Barang Harian</title>
  <link rel="stylesheet" href="/dist/css/web.css">
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div class="logo">Helwina Mart</div>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="hamburger">&#9776;</label>
    <div class="menu">
      <a href="/web.php">Home</a>
      <a href="/product.php">Produk</a>
      <a href="/contact.php">Kontak</a>
    </div>
    <button class="cart">Cart</button>
  </nav>

  <!-- Product Section -->
<section class="product-section">
    <div>
        <h1>Our Product</h1>
    </div>
  <div class="product-container">
    <?php foreach ($data as $product): ?>
    <div class="product-card">
       <img style="width: 300px; height: 200px;" src="<?php echo htmlspecialchars(isset($product['image']) ? $product['image'] : ''); ?>" alt="<?php echo htmlspecialchars(isset($product['name']) ? $product['name'] : ''); ?>">
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
<footer style="margin-top: 200px;" class="footer">
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
