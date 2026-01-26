<?php
$json = file_get_contents("about.json");
$data = json_decode($json, true);

$me = null;

// find only id = car2
foreach ($data as $item) {
    if ($item["id"] === "car2") {
        $me = $item;
        break;
    }
}

if (!$me) {
    die("Profile not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Me</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="section">
        <h1><?= $me["firstName"] . " " . $me["lastName"] ?> (<?= $me["nicktName"] ?>)</h1>
        <p><strong>School:</strong> <?= $me["School"] ?></p>
        <p><strong>Height:</strong> <?= $me["Height"] ?> | <strong>Weight:</strong> <?= $me["weight"] ?></p>
        <p><strong>Status:</strong> <?= $me["statusMessage"] ?></p>
    </div>

    <div class="section">
        <h2>My Car</h2>
        <img src="<?= $me["carImageURL"] ?>" alt="Car Image">
        <p>
            <?= $me["year"] ?> <?= $me["carBrand"] ?> <?= $me["carModel"] ?> (<?= $me["carType"] ?>)
        </p>
        <p>
            <?= $me["engineType"] ?> • <?= $me["horsepower"] ?> HP • <?= $me["drivetrain"] ?>
        </p>
        <p>
            0–60: <?= $me["zeroToSixty"] ?>s • Top Speed: <?= $me["topSpeedMph"] ?> mph
        </p>
    </div>

    <div class="section">
        <h2>Modifications</h2>
        <?php foreach ($me["modifications"] as $mod): ?>
            <span class="tag"><?= $mod ?></span>
        <?php endforeach; ?>
    </div>

    <div class="section">
        <h2>Favorite Features</h2>
        <ul>
            <?php foreach ($me["favoriteFeatures"] as $feature): ?>
                <li><?= $feature ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="section">
        <h2>Dream Car</h2>
        <p><?= ucfirst($me["dreamCar"]) ?></p>
        <img src="<?= $me["dreamCarImageURL"] ?>" alt="Dream Car">
        <p>
            <a href="<?= $me["featuredLink"] ?>" target="_blank">Official Page</a>
        </p>
    </div>

    <p><em>Last updated: <?= $me["lastUpdated"] ?></em></p>

</div>

</body>
</html>
