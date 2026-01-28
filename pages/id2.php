<?php
require __DIR__ . '/../functions.php';

// Get student with id2
$student = getStudentById('id2');

if (!$student) {
    echo "Student not found!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All About Me</title>
     <link rel="stylesheet" href="../Style.css">
</head>
<body>
    <div class="navbar">
        <a href="../index.php">Home</a>
    </div>

    <div class="container">
        <div class="card student-info">
            <h2><?php echo escape($student['firstName'] . " " . $student['lastName']); ?> (<?php echo escape($student['nicktName']); ?>)</h2>
            <p><strong>Height:</strong> <?php echo escape($student['Height']); ?></p>
            <p><strong>Weight:</strong> <?php echo escape($student['weight']); ?></p>
            <p><strong>School:</strong> <?php echo escape($student['School']); ?></p>
            <p><strong>Status:</strong> <?php echo escape($student['statusMessage']); ?></p>
            <p><strong>Favorite Features:</strong> <?php echo escape(implode(", ", $student['favoriteFeatures'])); ?></p>


        </div>
       
        <div class="card car-specs">
            <h3>My Car</h3>
            <img src="<?php echo escape($student['carImageURL']); ?>" alt="My Car" style="width:100%; max-width:500px; border-radius:5px;">
            <p><strong>Brand:</strong> <?php echo escape($student['carBrand']); ?></p>
            <p><strong>Model:</strong> <?php echo escape($student['carModel']); ?></p>
            <p><strong>Year:</strong> <?php echo escape($student['year']); ?></p>
            <p><strong>Type:</strong> <?php echo escape($student['carType']); ?></p>
            <p><strong>Engine:</strong> <?php echo escape($student['engineType']); ?></p>
            <p><strong>Horsepower:</strong> <?php echo escape($student['horsepower']); ?> HP</p>
            <p><strong>Drivetrain:</strong> <?php echo escape($student['drivetrain']); ?></p>
            <p><strong>Transmission:</strong> <?php echo escape($student['transmission']); ?></p>
            <p><strong>Color:</strong> <?php echo escape($student['color']); ?></p>
            <p><strong>Fuel Type:</strong> <?php echo escape($student['fuelType']); ?></p>
        </div>

        <div class="card performance-upgrades">
            <h3>Modifications</h3>
            <ul>
                <?php foreach ($student['modifications'] as $mod): ?>
                    <li><?php echo escape($mod); ?></li>
                <?php endforeach; ?>
            </ul>
            <h3>Favorite Features</h3>
            <ul>
                <?php foreach ($student['favoriteFeatures'] as $feature): ?>
                    <li><?php echo escape($feature); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="card car-specs">
            <h3>Performance</h3>
            <p><strong>Top Speed:</strong> <?php echo escape($student['topSpeedMph']); ?> MPH</p>
            <p><strong>0-60:</strong> <?php echo escape($student['zeroToSixty']); ?> seconds</p>
            <p><strong>Daily Driver:</strong> <?php echo $student['dailyDriver'] ? 'Yes' : 'No'; ?></p>
            <p><strong>Dream Car:</strong> <?php echo escape($student['dreamCar']); ?></p>
            <img src="<?php echo escape($student['dreamCarImageURL']); ?>" alt="Dream Car" style="width:100%; max-width:500px; border-radius:5px;">
           
        </div>

    </div>
</body>
</html>
