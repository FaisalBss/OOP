<?php
session_start();
require_once 'autoload.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = unserialize($_SESSION['user']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; padding: 30px; background: #f4f4f4; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; margin-bottom: 20px; }
        table, th, td { border: 1px solid #ccc; border-collapse: collapse; padding: 10px; }
        th { background: #eee; }
    </style>
</head>
<body>

    <div class="card">
        <h2>👋 Welcome, <?= htmlspecialchars($user->getName()) ?>!</h2>
        <p><strong>Employee ID:</strong> <?= $user->getId() ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user->getEmail()) ?></p>
        <p><strong>Salary:</strong> <?= $user->getSalary() ?> SAR</p>
        <p><strong>Role:</strong> <?= ucfirst($user->getRole()) ?></p>
        <p><a href="logout.php">🚪 Logout</a></p>
    </div>

    <?php if ($user->isManager()): ?>
        <div class="card">
            <h3>📋 Employees Info</h3>
            <?php include 'includes/employee_table.php'; ?>
        </div>
    <?php endif; ?>

    <?php if ($user->isDeveloper()): ?>
    <div class="card">
        <h3>🧪 Interns Info</h3>
        <?php include 'includes/intern_table.php'; ?>
    </div>
<?php endif; ?>

</body>
</html>
