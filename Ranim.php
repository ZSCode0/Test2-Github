<?php
header("Cache-Control: no-cache, no-store, must-revalidate");

$json = file_get_contents("about.json");
$jsonData = json_decode($json, true);

if (!$jsonData || !isset($jsonData["cars"])) {
  die("Profile data not found.");
}

$carId = isset($_GET["id"]) ? $_GET["id"] : null;

if ($carId) {
  $data = null;
  foreach ($jsonData["cars"] as $car) {
    if ($car["id"] === $carId) {
      $data = $car;
      break;
    }
  }
  if (!$data) {
    die("Car profile not found.");
  }
} else {
  $data = $jsonData["cars"][1];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile | <?= htmlspecialchars($data["firstName"]); ?></title>
  <link rel="stylesheet" href="Stlye.css">
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
    .nav-links {
      margin-bottom: 20px;
    }
    .nav-links a {
      margin-right: 15px;
      color: #c1121f;
      text-decoration: none;
    }
    .nav-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">

  <div class="nav-links">
    <?php foreach ($jsonData["cars"] as $car): ?>
      <a href="?id=<?= htmlspecialchars($car["id"]); ?>"><?= htmlspecialchars($car["firstName"]); ?>'s Car</a>
    <?php endforeach; ?>
  </div>

  <div class="card">
    <h2>Personal Profile</h2>
    <p><strong>Name:</strong> <?= htmlspecialchars($data["firstName"] . " " . $data["lastName"]); ?></p>
    <p><strong>Nickname:</strong> <?= htmlspecialchars($data["nicktName"] ?? $data["nickname"] ?? "N/A"); ?></p>
    <p><strong>Height:</strong> <?= htmlspecialchars($data["Height"] ?? $data["height"] ?? "N/A"); ?></p>
    <p><strong>Weight:</strong> <?= htmlspecialchars($data["weight"]); ?></p>
    <p><strong>School:</strong> <?= htmlspecialchars($data["School"] ?? $data["school"] ?? "N/A"); ?></p>
  </div>

  <div class="card">
    <h2>Car Profile</h2>
    <p><strong>Car:</strong> <?= htmlspecialchars($data["year"] . " " . $data["carBrand"] . " " . $data["carModel"]); ?></p>
    <p><strong>Type:</strong> <?= htmlspecialchars($data["carType"]); ?></p>
    <p><strong>Color:</strong> <?= htmlspecialchars($data["color"]); ?></p>
    <p><strong>Engine:</strong> <?= htmlspecialchars($data["engineType"]); ?></p>
    <p><strong>Horsepower:</strong> <?= htmlspecialchars($data["horsepower"]); ?> HP</p>
    <p><strong>Drivetrain:</strong> <?= htmlspecialchars($data["drivetrain"]); ?></p>
    <p><strong>Transmission:</strong> <?= htmlspecialchars($data["transmission"]); ?></p>
    <p><strong>0–60 mph:</strong> <?= htmlspecialchars($data["zeroToSixty"]); ?> sec</p>
    <p><strong>Top Speed:</strong> <?= htmlspecialchars($data["topSpeedMph"]); ?> mph</p>
    <p><strong>Fuel:</strong> <?= htmlspecialchars($data["fuelType"]); ?></p>
    <p><strong>Daily Driver:</strong> <?= $data["dailyDriver"] ? "Yes" : "No"; ?></p>
  </div>

  <div class="card">
    <h2>Mods & Features</h2>

    <h3>Modifications</h3>
    <ul>
      <?php foreach ($data["modifications"] as $mod): ?>
        <li><?= htmlspecialchars($mod); ?></li>
      <?php endforeach; ?>
    </ul>

    <h3>Favorite Features</h3>
    <ul>
      <?php foreach ($data["favoriteFeatures"] as $feature): ?>
        <li><?= htmlspecialchars($feature); ?></li>
      <?php endforeach; ?>
    </ul>

    <?php if (!empty($data["statusMessage"])): ?>
      <p class="status">"<?= htmlspecialchars($data["statusMessage"]); ?>"</p>
    <?php endif; ?>

    <?php if (!empty($data["featuredLink"])): ?>
      <a class="btn" href="<?= htmlspecialchars($data["featuredLink"]); ?>" target="_blank">
        Official Car Page
      </a>
    <?php endif; ?>

    <p><small>Last updated: <?= htmlspecialchars($data["lastUpdated"]); ?></small></p>
  </div>

</div>

</body>
</html>
