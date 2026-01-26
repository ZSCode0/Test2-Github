<?php
// Load JSON file
$jsonData = file_get_contents("about.json");
$data = json_decode($jsonData, true);

// Find only id2
$ranim = null;
foreach ($data["cars"] as $person) {
    if ($person["id"] === "id2") {
        $ranim = $person;
        break;
    }
}

// Stop page if id2 not found
if (!$ranim) {
    die("Profile not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Me - Ranim</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<div class="profile-container">
    <h1>About Me</h1>

    <h2><?php echo $ranim["firstName"] . " " . $ranim["lastName"]; ?></h2>
    <p><strong>Nickname:</strong> <?php echo $ranim["nicktName"]; ?></p>
    <p><strong>Height:</strong> <?php echo $ranim["Height"]; ?></p>
    <p><strong>Weight:</strong> <?php echo $ranim["weight"]; ?></p>
    <p><strong>School:</strong> <?php echo $ranim["School"]; ?></p>

    <h3>Status</h3>
    <p><?php echo $ranim["statusMessage"]; ?></p>

    <h3>Car Info</h3>
    <ul>
        <li><strong>Car:</strong> <?php echo $ranim["year"] . " " . $ranim["carBrand"] . " " . $ranim["carModel"]; ?></li>
        <li><strong>Engine:</strong> <?php echo $ranim["engineType"]; ?></li>
        <li><strong>Horsepower:</strong> <?php echo $ranim["horsepower"]; ?> HP</li>
        <li><strong>Drivetrain:</strong> <?php echo $ranim["drivetrain"]; ?></li>
        <li><strong>0–60:</strong> <?php echo $ranim["zeroToSixty"]; ?> sec</li>
        <li><strong>Top Speed:</strong> <?php echo $ranim["topSpeedMph"]; ?> mph</li>
        <li><strong>Color:</strong> <?php echo $ranim["color"]; ?></li>
    </ul>

    <img src="<?php echo $ranim["carImageURL"]; ?>" alt="Car Image" class="car-image">

    <h3>Dream Car</h3>
    <p><?php echo ucfirst($ranim["dreamCar"]); ?></p>
    <img src="<?php echo $ranim["dreamCarImageURL"]; ?>" alt="Dream Car" class="car-image">

</div>

</body>
</html>
