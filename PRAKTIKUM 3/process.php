<?php
// Ambil data dari form
$title = $_POST['title'] ?? '';
$price = $_POST['price'] ?? '';
$description = $_POST['description'] ?? '';
$account_number = $_POST['account_number'] ?? '';
$bank = $_POST['bank'] ?? '';
$account_holder = $_POST['account_holder'] ?? '';
$transaction_count = $_POST['transaction_count'] ?? '';
$send_to_mobile = isset($_POST['send_to_mobile']) ? 'Yes' : 'No';
$send_to_email = isset($_POST['send_to_email']) ? 'Yes' : 'No';
$mobile_number = $_POST['mobile_number'] ?? '-';
$email_address = $_POST['email_address'] ?? '-';

// Upload gambar (jika ada)
$uploadDir = 'assets/uploads/';
if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

$imagePath = '';
if (!empty($_FILES['user_image']['name'])) {
    $fileName = basename($_FILES['user_image']['name']);
    $targetFile = $uploadDir . $fileName;
    if (move_uploaded_file($_FILES['user_image']['tmp_name'], $targetFile)) {
        $imagePath = $targetFile;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Summary</title>
  <link rel="stylesheet" href="assets/CSS/process.css">
</head>
<body>
  <div class="container">
    <div class="summary-card">
      <h1>🎉 Product Successfully Created!</h1>
      <div class="content">
        <div class="image">
          <img src="<?= $imagePath ?: 'assets/img/anonymous.webp' ?>" alt="Uploaded Image">
        </div>
        <div class="info">
          <h2><?= htmlspecialchars($title) ?></h2>
          <p class="price">Rp <?= htmlspecialchars($price) ?></p>
          <p><?= nl2br(htmlspecialchars($description)) ?></p>
          <hr>
          <p><strong>Account:</strong> <?= htmlspecialchars($account_holder) ?> (<?= htmlspecialchars($bank) ?>)</p>
          <p><strong>Number:</strong> <?= htmlspecialchars($account_number) ?></p>
          <p><strong>Transactions:</strong> <?= htmlspecialchars($transaction_count) ?></p>
          <hr>
          <p><strong>Send to Mobile:</strong> <?= $send_to_mobile ?> (<?= htmlspecialchars($mobile_number) ?>)</p>
          <p><strong>Send to Email:</strong> <?= $send_to_email ?> (<?= htmlspecialchars($email_address) ?>)</p>
        </div>
      </div>
      <a href="index.html" class="back-btn">← Back to Form</a>
    </div>
  </div>
</body>
</html>