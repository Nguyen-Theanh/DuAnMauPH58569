<?php
require __DIR__ . '/configs/env.php';

$action = $_GET['action'] ?? 'home';

if ($action == 'home') {
    require_once __DIR__ . '/models/ProductsModel.php';

    $productModel = new ProductModel();

    $keyword = trim($_GET['keyword'] ?? '');
    if ($keyword !== '') {
        $products = $productModel->searchProduct($keyword);
    } else {
        $products = $productModel->getAllProducts();
    }

    include __DIR__ . '/views/main.php';
}
?>
