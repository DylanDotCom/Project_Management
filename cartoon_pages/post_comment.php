<?php
session_start();

include '../db_connect.php';

if (empty($_SESSION['user_id'])) {
    die("You must be logged in to comment. <a href='../index.php'>Back</a>");
}

$type     = $_POST['type'] ?? '';
$targetId = (int)($_POST['target_id'] ?? 0);
$body     = trim($_POST['body'] ?? '');

if ($targetId <= 0 || $body === '' || mb_strlen($body) > 1000) {
    die("Invalid comment.");
}

$userId = (int)$_SESSION['user_id'];

if ($type === 'cartoon') {
    $stmt = $conn->prepare("INSERT INTO Comments (user_id, cartoon_id, body) VALUES (?, ?, ?)");
    $back = "episodes.php?id=$targetId";
} elseif ($type === 'episode') {
    $stmt = $conn->prepare("INSERT INTO Comments (user_id, episode_id, body) VALUES (?, ?, ?)");
    $back = "episode.php?id=$targetId";
} else {
    die("Invalid comment type.");
}

$stmt->bind_param("iis", $userId, $targetId, $body);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: $back");
exit;