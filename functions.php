<?php
// Load student data from about.json
function loadStudentData() {
    $json = file_get_contents('about.json');
    return json_decode($json, true);
}

// Get a student by ID
function getStudentById($id) {
    $data = loadStudentData();
    foreach ($data['cars'] as $student) {
        if ($student['id'] === $id) {
            return $student;
        }
    }
    return null;
}

// Escape output for security
function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// Special function for Zahir's page
function s1_render_car_specs($student) {
    $specs = '<div class="car-specs">';
    $specs .= '<h3>Car Specifications</h3>';
    $specs .= '<p><strong>Brand:</strong> ' . escape($student['carBrand']) . '</p>';
    $specs .= '<p><strong>Model:</strong> ' . escape($student['carModel']) . '</p>';
    $specs .= '<p><strong>Year:</strong> ' . escape($student['year']) . '</p>';
    $specs .= '<p><strong>Engine:</strong> ' . escape($student['engineType']) . '</p>';
    $specs .= '<p><strong>Horsepower:</strong> ' . escape($student['horsepower']) . '</p>';
    $specs .= '<p><strong>Top Speed:</strong> ' . escape($student['topSpeedMph']) . ' mph</p>';
    $specs .= '<p><strong>0-60 mph:</strong> ' . escape($student['zeroToSixty']) . ' sec</p>';
    $specs .= '</div>';
    return $specs;
}

// Reusable function for all pages
function render_student_info($student) {
    $info = '<div class="student-info">';
    $info .= '<h3>Student Info</h3>';
    $info .= '<p><strong>Name:</strong> ' . escape($student['firstName'] . ' ' . $student['lastName']) . '</p>';
    $info .= '<p><strong>School:</strong> ' . escape($student['school'] ?? $student['School']) . '</p>';
    $info .= '<p><strong>Dream Car:</strong> ' . escape($student['dreamCar']) . '</p>';
    $info .= '<p><strong>Nickname:</strong> ' . escape($student['nickname'] ?? $student['nicktName']) . '</p>';
    $info .= '</div>';
    return $info;
}

// Custom function for Barrett's page
function s2_render_performance_upgrades($student) {
    $upgrades = '<div class="performance-upgrades">';
    $upgrades .= '<h3>Performance Upgrades</h3>';
    $upgrades .= '<p><strong>Modifications:</strong> ' . escape(implode(', ', $student['modifications'])) . '</p>';
    $upgrades .= '<p><strong>Status:</strong> ' . escape($student['statusMessage'] ?? 'No status') . '</p>';
    $upgrades .= '</div>';
    return $upgrades;
}

// Custom function for Ranim's page
function s3_render_car_features($student) {
    $features = '<div class="car-features">';
    $features .= '<h3>Car Features</h3>';
    $features .= '<p><strong>Favorite Features:</strong> ' . escape(implode(', ', $student['favoriteFeatures'])) . '</p>';
    $features .= '<p><strong>Drivetrain:</strong> ' . escape($student['drivetrain']) . '</p>';
    $features .= '</div>';
    return $features;
}
?>
