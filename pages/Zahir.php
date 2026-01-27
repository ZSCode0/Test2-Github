<?php
require_once '../functions.php';
require_once '../theme.php';

$student = getStudentById('id1'); // Assuming this function exists in functions.php
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $theme['siteTitle'] ?> - <?= $student['firstName'] . ' ' . $student['lastName'] ?></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1><?= $student['firstName'] . ' ' . $student['lastName'] ?></h1>
        <div class="card">
            <img src="<?= $student['carImageURL'] ?>" alt="<?= $student['carBrand'] . ' ' . $student['carModel'] ?>">
            <p><strong>School:</strong> <?= $student['school'] ?></p>
            <p><strong>Dream Car:</strong> <?= $student['dreamCar'] ?></p>
            <p><strong>Car:</strong> <?= $student['carBrand'] . ' ' . $student['carModel'] ?></p>
            <p><strong>Year:</strong> <?= $student['year'] ?></p>
            <p><strong>Engine:</strong> <?= $student['engineType'] ?></p>
            <p><strong>Horsepower:</strong> <?= $student['horsepower'] ?></p>
            <p><strong>Top Speed:</strong> <?= $student['topSpeedMph'] ?> mph</p>
            <p><strong>0-60 mph:</strong> <?= $student['zeroToSixty'] ?> sec</p>
            <p><strong>Modifications:</strong> <?= implode(', ', $student['modifications']) ?></p>
            <p><strong>Favorite Features:</strong> <?= implode(', ', $student['favoriteFeatures']) ?></p>
            <!-- Call the special function for your page -->
            <?= s1_render_car_specs($student) ?>
            <!-- Call the reusable function for all pages -->
            <?= render_student_info($student) ?>
        </div>
    </div>
    <script src="../script.js"></script>
</body>
</html>
