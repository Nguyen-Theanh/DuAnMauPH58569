<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Petzone</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      background: linear-gradient(to right, #d0f0f8, #f9dfff);
    }

    .navbar-custom {
      background-color: #0ccee3;
    }

    .product-card:hover {
      transform: scale(1.05);
      transition: 0.2s;
    }
  </style>
</head>
<body>

<!-- HEADER -->
<header class="navbar navbar-expand-lg navbar-custom shadow py-3">
  <div class="container">
    <a href="?action=home" class="navbar-brand text-white fw-bold fs-2">
      <i class="fa-solid fa-paw"></i> Petzone
    </a>

    <!-- Search -->
    <form class="d-flex flex-grow-1 mx-4" method="get">
      <input type="hidden" name="action" value="home">
      <input 
        class="form-control rounded-pill px-3" 
        type="text" 
        name="keyword" 
        placeholder="Tìm kiếm..." 
        value="<?= $_GET['keyword'] ?? '' ?>"
      >
      <button class="btn btn-light rounded-circle ms-2" type="submit">
        <i class="fa fa-search text-info"></i>
      </button>
    </form>

    <!-- Icons -->
    <div class="d-flex gap-4">
      <a href="giohang.php" class="text-white fs-3"><i class="fa-solid fa-cart-shopping"></i></a>
      <a href="?action=login" class="text-white fs-3"><i class="fa-solid fa-user"></i></a>
    </div>
  </div>
</header>

<!-- NAVBAR DROPDOWN -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
  <div class="container justify-content-center">
    <ul class="navbar-nav fw-bold">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-info" href="#" data-bs-toggle="dropdown">Thú cưng</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Chó</a></li>
          <li><a class="dropdown-item" href="#">Mèo</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown ms-4">
        <a class="nav-link dropdown-toggle text-info" href="#" data-bs-toggle="dropdown">Sản phẩm</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Sản phẩm cho chó</a></li>
          <li><a class="dropdown-item" href="#">Sản phẩm cho mèo</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown ms-4">
        <a class="nav-link dropdown-toggle text-info" href="#" data-bs-toggle="dropdown">Sức khỏe</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Thức ăn</a></li>
          <li><a class="dropdown-item" href="#">Vệ sinh</a></li>
          <li><a class="dropdown-item" href="#">Thuốc</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- SLIDESHOW BANNER -->
<div id="bannerCarousel" class="carousel slide container my-4" data-bs-ride="carousel">

  <div class="carousel-inner rounded shadow">

    <div class="carousel-item active">
      <img src="uploads/imgproduct/banner.png" class="d-block w-100" style="height:500px; object-fit:cover;">
    </div>

    <div class="carousel-item">
      <img src="uploads/imgproduct/banner2.jpg" class="d-block w-100" style="height:500px; object-fit:cover;">
    </div>

    <div class="carousel-item">
      <img src="uploads/imgproduct/banner3.jpg" class="d-block w-100" style="height:500px; object-fit:cover;">
    </div>

  </div>

  <!-- Nút trước -->
  <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <!-- Nút sau -->
  <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>

<!-- TITLE -->
<h1 class="text-center text-info fw-bold mb-4">Sản phẩm của shop</h1>

<!-- PRODUCT LIST -->
<div class="container">
  <div class="row g-4 justify-content-center">
    <?php foreach ($products as $product): ?>
      <div class="col-md-3 col-sm-6">
        <a href="index.php?action=productDetail&id=<?= $product['id'] ?>" class="text-decoration-none">
          <div class="card p-3 product-card shadow-sm border-0">
            <img src="<?= BASE_URL ?>uploads/imgproduct/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" style="height:180px; object-fit:contain;">
            <div class="card-body text-center">
              <h5 class="card-title text-dark"><?= htmlspecialchars($product['name']) ?></h5>
              <p class="text-danger fw-bold"><?= number_format($product['price']) ?> đ</p>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- FOOTER -->
<footer class="text-center text-white bg-info py-3 mt-5">
  Liên hệ: 037944534 <br>
  Địa chỉ: Xuân Trường, Nam Định.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
