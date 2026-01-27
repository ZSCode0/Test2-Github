<?php
require_once 'functions.php';
require_once 'theme.php';

$students = loadStudentData()['cars'];
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $theme['siteTitle'] ?></title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="container">
        <h1><?= $theme['siteTitle'] ?></h1>
        <div class="nav">
            <h2>Student Directory</h2>
        </div>
        <?php foreach ($students as $student): ?>
        <div class="card">
            <h2><?= escape($student['firstName'] . ' ' . $student['lastName']) ?></h2>
            <img src="<?= escape($student['carImageURL']) ?>" alt="<?= escape($student['carBrand'] . ' ' . $student['carModel']) ?>" width="200">
            <p><strong>School:</strong> <?= escape($student['school'] ?? $student['School']) ?></p>
            <p><strong>Dream Car:</strong> <?= escape($student['dreamCar']) ?></p>
            <a href="<?= escape($student['id']) ?>.php" class="btn">View Profile</a>
        </div>
        <?php endforeach; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
