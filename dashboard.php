<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT users.username, orders.product_name, orders.order_date 
                       FROM users 
                       JOIN orders ON users.id = orders.user_id 
                       WHERE users.id = ?");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll();
?>
<h1>Welcome to Your Dashboard</h1>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Product Name</th>
        <th>Order Date</th>
    </tr>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?php echo htmlspecialchars($order['username']); ?></td>
        <td><?php echo htmlspecialchars($order['product_name']); ?></td>
        <td><?php echo htmlspecialchars($order['order_date']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="logout.php">Logout</a>
