<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$conn->query("DELETE FROM tasks WHERE id=$id AND user_id={$_SESSION['user_id']}");
header("Location: dashboard.php");
exit();
?>
