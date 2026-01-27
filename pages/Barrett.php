<?php
// Load the JSON file
$jsonFile = 'about.json';
$personData = null;

if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);

    // Loop through the "cars" array to find Barrett (id3)
    if (isset($data['cars'])) {
        foreach ($data['cars'] as $car) {
            if ($car['id'] === 'id3') {
                $personData = $car;
                break; // Stop looping once we find Barrett
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barrett's Profile</title>
     <link rel="stylesheet" href="Style.css">
</head>
<body>

<div class="container">
    <?php if ($personData): ?>

        <div class="profile-header">
            <div class="profile-info">
                <h1><?php echo htmlspecialchars($personData['firstName']); ?></h1>
                <p><strong>Nickname:</strong> <?php echo htmlspecialchars($personData['nicktName']); ?></p>
                <p><strong>School:</strong> <?php echo htmlspecialchars($personData['School']); ?></p>
                <p><strong>Height:</strong> <?php echo htmlspecialchars($personData['Height']); ?> | <strong>Weight:</strong> <?php echo htmlspecialchars($personData['weight']); ?> lbs</p>
            </div>
        </div>

        <div class="car-section">
            <div class="car-title">
                <?php echo htmlspecialchars($personData['year'] . ' ' . $personData['carBrand'] . ' ' . $personData['carModel']); ?>
            </div>

            <div class="image-container">
                <img src="<?php echo htmlspecialchars($personData['carImageURL']); ?>" alt="Barrett's Car">
            </div>

            <h3>Performance Specs</h3>
            <div class="specs-grid">
                <div class="spec-item">
                    <span class="spec-label">Engine</span>
                    <?php echo htmlspecialchars($personData['engineType']); ?>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Horsepower</span>
                    <?php echo htmlspecialchars($personData['horsepower']); ?> HP
                </div>
                <div class="spec-item">
                    <span class="spec-label">0-60 MPH</span>
                    <?php echo htmlspecialchars($personData['zeroToSixty']); ?> sec
                </div>
                <div class="spec-item">
                    <span class="spec-label">Top Speed</span>
                    <?php echo htmlspecialchars($personData['topSpeedMph']); ?> MPH
                </div>
                <div class="spec-item">
                    <span class="spec-label">Transmission</span>
                    <?php echo htmlspecialchars($personData['transmission']); ?>
                </div>
                <div class="spec-item">
                    <span class="spec-label">Modifications</span>
                    <?php foreach($personData['modifications'] as $mod): ?>
                        <span class="tag"><?php echo htmlspecialchars($mod); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <h3>Dream Car</h3>
            <p><strong>Model:</strong> <?php echo htmlspecialchars($personData['dreamCar']); ?></p>
            <div class="image-container">
                <img src="<?php echo htmlspecialchars($personData['dreamCarImageURL']); ?>" alt="Dream Car">
            </div>

            <p style="margin-top:20px; font-style: italic; color:#777;">
                Status: "<?php echo htmlspecialchars($personData['statusMessage']); ?>"
            </p>
        </div>

    <?php else: ?>
        <p style="color:red; text-align:center;">User "Barrett" (id3) not found in about.json.</p>
    <?php endif; ?>
</div>

</body>
</html>