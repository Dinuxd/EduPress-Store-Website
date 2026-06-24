<?php
session_start();
$page_title = 'Demo Payment - EduPress Store';
include 'header.php';

// Get order ID
$order_id = intval($_GET['order_id'] ?? 0);
if ($order_id <= 0) {
  echo "<p>Invalid order.</p>";
  include 'footer.php';
  exit;
}
?>

<section class="payment-gateway">
  <div class="payment-card">
    <h2>Demo Payment</h2>
    <p>Order #<?= $order_id ?> - this project uses a simulated payment step.</p>
    <form method="post" action="thanks.php">
      <input type="hidden" name="order_id" value="<?= $order_id ?>">

      <div class="field">
        <label>Reference Number</label>
        <input type="text" name="reference" maxlength="30" required placeholder="DEMO-ORDER">
      </div>

      <div class="field-row">
        <div class="field">
          <label>Name</label>
          <input type="text" name="name" required placeholder="Customer name">
        </div>
        <div class="field">
          <label>Contact Number</label>
          <input type="text" name="contact" maxlength="20" required placeholder="0771234567">
        </div>
      </div>

      <button type="submit">Complete Demo Payment</button>
    </form>
  </div>
</section>


<?php include 'footer.php'; ?>
