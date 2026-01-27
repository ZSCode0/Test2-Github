<?php
function loadStudentData() {
    // __DIR__ ensures it finds about.json in this file's root directory
    $json = file_get_contents(__DIR__ . '/about.json');
    return json_decode($json, true);
}

function getStudentById($id) {
    $data = loadStudentData();
    foreach ($data['cars'] as $student) {
        if ($student['id'] === $id) {
            return $student;
        }
    }
    return null;
}

function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>