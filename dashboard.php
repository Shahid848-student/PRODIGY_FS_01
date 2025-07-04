<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

$role = $_SESSION['role'] ?? 'user';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<div class="dashboard-container">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>

    <?php if ($role === 'admin'): ?>
        <p class="admin-msg">This is admin content.</p>
    <?php else: ?>
        <p class="user-msg">This is regular user content.</p>
    <?php endif; ?>

    <a class="logout-btn" href="logout.php">Logout</a>
</div>

</body>
</html>
