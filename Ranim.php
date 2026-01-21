<?php
// Load JSON file
$json = file_get_contents("about.json");
$data = json_decode($json, true);

// Safety check
if (!$data) {
  die("Profile data not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile | <?= $data["firstName"]; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f8;
      padding: 20px;
    }
    .container {
      max-width: 900px;
      margin: auto;
      display: grid;
      gap: 20px;
    }
    .card {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 { color: #c1121f; margin-top: 0; }
    ul { padding-left: 20px; }
    .btn {
      background: #c1121f;
      color: white;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 6px;
      display: inline-block;
      margin-top: 10px;
    }
    .status { font-style: italic; color: #555; }
  </style>
</head>
<body>

<div class="container">

  <!-- Personal Info -->
  <div class="card">
    <h2>Personal Profile</h2>
    <p><strong>Name:</strong> <?= $data["firstName"] . " " . $data["lastName"]; ?></p>
    <p><strong>Nickname:</strong> <?= $data["nicktName"]; ?></p>
    <p><strong>Height:</strong> <?= $data["Height"]; ?></p>
    <p><strong>Weight:</strong> <?= $data["weight"]; ?></p>
    <p><strong>School:</strong> <?= $data["School"]; ?></p>
  </div>

  <!-- Car Info -->
  <div class="card">
    <h2>Car Profile</h2>
    <p><strong>Car:</strong> <?= $data["year"] . " " . $data["carBrand"] . " " . $data["carModel"]; ?></p>
    <p><strong>Type:</strong> <?= $data["carType"]; ?></p>
    <p><strong>Color:</strong> <?= $data["color"]; ?></p>
    <p><strong>Engine:</strong> <?= $data["engineType"]; ?></p>
    <p><strong>Horsepower:</strong> <?= $data["horsepower"]; ?> HP</p>
    <p><strong>Drivetrain:</strong> <?= $data["drivetrain"]; ?></p>
    <p><strong>Transmission:</strong> <?= $data["transmission"]; ?></p>
    <p><strong>0–60 mph:</strong> <?= $data["zeroToSixty"]; ?> sec</p>
    <p><strong>Top Speed:</strong> <?= $data["topSpeedMph"]; ?> mph</p>
    <p><strong>Fuel:</strong> <?= $data["fuelType"]; ?></p>
    <p><strong>Daily Driver:</strong> <?= $data["dailyDriver"] ? "Yes" : "No"; ?></p>
  </div>

  <!-- Mods -->
  <div class="card">
    <h2>Mods & Features</h2>

    <h3>Modifications</h3>
    <ul>
      <?php foreach ($data["modifications"] as $mod): ?>
        <li><?= $mod; ?></li>
      <?php endforeach; ?>
    </ul>

    <h3>Favorite Features</h3>
    <ul>
      <?php foreach ($data["favoriteFeatures"] as $feature): ?>
        <li><?= $feature; ?></li>
      <?php endforeach; ?>
    </ul>

    <p class="status">“<?= $data["statusMessage"]; ?>”</p>

    <a class="btn" href="<?= $data["featuredLink"]; ?>" target="_blank">
      Official Supra Page
    </a>

    <p><small>Last updated: <?= $data["lastUpdated"]; ?></small></p>
  </div>

</div>

</body>
</html>
