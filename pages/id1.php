<?php
require_once '../functions.php';
require_once '../theme.php';

$student = getStudentById('id1');
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $theme['siteTitle'] ?> - <?= escape($student['firstName']) ?></title>
    <link rel="stylesheet" href="../Style.css">
</head>
<body>
    <div class="container">
        <h1><?= escape($student['firstName'] . ' ' . $student['lastName']) ?></h1>
        <div class="card">
            <img src="<?= escape($student['carImageURL']) ?>" alt="Car" width="400">
            <h3>Car Details</h3>
            <p><strong>Model:</strong> <?= escape($student['carModel']) ?></p>
            <p><strong>Horsepower:</strong> <?= escape($student['horsepower']) ?></p>
            </div>
    </div>
</body>
</html>