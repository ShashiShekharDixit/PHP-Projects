<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO tasks (user_id, title) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $title);
    $stmt->execute();
}
header("Location: dashboard.php");
exit();
?>
