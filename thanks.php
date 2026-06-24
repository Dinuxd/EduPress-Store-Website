<?php
// thanks.php
require_once __DIR__ . '/db.php';
$page_title = 'Thank You - EduPress Store';
include 'header.php';

// 1) Get & validate order_id
$order_id = intval($_POST['order_id'] ?? $_GET['order_id'] ?? 0);

if ($order_id <= 0) {
  echo "<p>Invalid order.</p>";
  include 'footer.php';
  exit;
}

$conn = get_db_connection();

// 3) Fetch order info
$orderRes = mysqli_query($conn,
  "SELECT o.id, o.total, o.created_at, u.email
   FROM orders o
   JOIN users u ON u.id = o.user_id
   WHERE o.id = $order_id"
);
if (mysqli_num_rows($orderRes) === 0) {
  echo "<p>Order not found.</p>";
  include 'footer.php';
  exit;
}
$order = mysqli_fetch_assoc($orderRes);

// 4) Fetch items
$itemsRes = mysqli_query($conn,
  "SELECT oi.qty, p.name, p.price
   FROM order_items oi
   JOIN products p ON p.id = oi.product_id
   WHERE oi.order_id = $order_id"
);
?>

<section class="thanks">
  <h2>Thank You for Your Order!</h2>
  <p>Order #<?= $order['id'] ?> placed on <?= date('d M Y, H:i', strtotime($order['created_at'])) ?></p>
  <p>Receipt sent to: <strong><?= htmlspecialchars($order['email']) ?></strong></p>

  <table class="thanks-table">
    <thead>
      <tr><th>Item</th><th>Price</th><th>Qty</th><th>Subtotal</th></tr>
    </thead>
    <tbody>
      <?php while ($it = mysqli_fetch_assoc($itemsRes)): ?>
        <?php $sub = $it['price'] * $it['qty']; ?>
        <tr>
          <td><?= htmlspecialchars($it['name']) ?></td>
          <td>Rs. <?= number_format($it['price'],2) ?></td>
          <td><?= $it['qty'] ?></td>
          <td>Rs. <?= number_format($sub,2) ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong>Rs. <?= number_format($order['total'],2) ?></strong></td>
      </tr>
    </tfoot>
  </table>

  <p><a href="shop.php">Continue Shopping</a></p>
</section>

<script>
  localStorage.removeItem('edupress_cart');
  const cartCount = document.getElementById('cart-count');
  if (cartCount) {
    cartCount.innerText = '0';
  }
</script>

<?php
mysqli_close($conn);
include 'footer.php';
?>
