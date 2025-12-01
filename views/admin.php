<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Petzone</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      background: linear-gradient(to right, #d0f0f8, #f9dfff);
    }
  </style>
</head>
<body>

<!-- HEADER -->
<div class="bg-info shadow py-3">
  <div class="container d-flex justify-content-between align-items-center">

    <a href="index.php?action=home" class="text-decoration-none">
      <div class="fs-2 fw-bold text-white"><i class="fa-solid fa-paw"></i> Petzone</div>
    </a>

    <form class="d-flex bg-white rounded-pill px-3 py-1" method="get">
      <input type="hidden" name="action" value="qlsp">
      <input type="text" name="keyword" class="form-control border-0" placeholder="Tìm kiếm..."
        value="<?= $_GET['keyword'] ?? '' ?>">
      <button class="btn text-info"><i class="fa fa-search"></i></button>
    </form>

    <a href="index.php?action=home" class="btn btn-light fw-bold">Đăng xuất</a>

  </div>
</div>

<!-- NAV -->
<nav class="navbar navbar-expand-lg bg-info-subtle shadow-sm">
  <div class="container justify-content-center">
    <ul class="navbar-nav fw-bold gap-3">
      <li class="nav-item"><a class="nav-link text-info" href="quanli_sanpham.php">Quản lý sản phẩm</a></li>
      <li class="nav-item"><a class="nav-link text-info" href="quanli_danhmuc.php">Quản lý danh mục</a></li>
      <li class="nav-item"><a class="nav-link text-info" href="quanli_nguoidung.php">Quản lý người dùng</a></li>
      <li class="nav-item"><a class="nav-link text-info" href="quanli_binhluan.php">Quản lý bình luận</a></li>
    </ul>
  </div>
</nav>

<div class="container my-4">
  <a href="?action=themsp" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Thêm sản phẩm
  </a>

  <!-- TABLE -->
  <div class="table-responsive shadow rounded">
    <table class="table table-bordered table-hover align-middle bg-white">
      <thead class="table-info">
        <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Giá</th>
          <th>Danh mục</th>
          <th>Mô tả</th>
          <th>Hành động</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($products as $product) { ?>
        <tr>
          <td><?= $product['id'] ?></td>
          <td><?= $product['name'] ?></td>

          <td>
            <img src="/PH58569/uploads/imgproduct/<?= $product['image'] ?>" width="100" class="rounded">
          </td>

          <td><?= number_format($product['price']) ?> đ</td>

          <td><?= $product['idcategory'] ?></td>

          <td style="width: 300px;"><?= $product['description'] ?></td>

          <td>
            <a href="?action=suasp&id=<?= $product['id'] ?>" class="btn btn-sm btn-warning mb-1">
              <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="?action=xoasp&id=<?= $product['id'] ?>"
              onclick="return confirm('Xác nhận xoá sản phẩm này?');"
              class="btn btn-sm btn-danger">
              <i class="fa fa-trash"></i> Xoá
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
