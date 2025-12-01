<?php 
class ProductModel
{
    protected $pdo; 

    public function __construct()
    {   
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8', DB_HOST, DB_PORT, DB_NAME);

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OPTIONS);
        } catch (PDOException $e) {
            die("Kết nối cơ sở dữ liệu thất bại: {$e->getMessage()}");
        }
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function searchProduct($keyword)
    {
    $sql = "SELECT * FROM products WHERE name LIKE :keyword";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':keyword' => '%' . $keyword . '%'
    ]);
    return $stmt->fetchAll();    
}
}