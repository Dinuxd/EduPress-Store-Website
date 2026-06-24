<?php
// api/product.php
header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

$id = intval($_GET['id'] ?? 0);

$conn = get_db_connection();

// fetch
$sql = "SELECT id, name, price FROM products WHERE id = $id";
$res = mysqli_query($conn, $sql);
if (!$res || mysqli_num_rows($res) === 0) {
  http_response_code(404);
  echo json_encode(['error'=>'Not found']);
  exit;
}
$prod = mysqli_fetch_assoc($res);
$prod['price'] = floatval($prod['price']); // ensure number
echo json_encode($prod);

mysqli_close($conn);
