<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM tasks WHERE user_id=$user_id ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<form method="POST" action="add_task.php">
    <input type="text" name="title" placeholder="New Task..." required>
    <button type="submit">Add Task</button>
</form>

<h3>Your Tasks:</h3>
<?php while ($row = $result->fetch_assoc()): ?>
<div class="task <?php if($row['status']=='completed') echo 'completed'; ?>">
    <?php echo htmlspecialchars($row['title']); ?>
    <div>
        <a href="update_task.php?id=<?php echo $row['id']; ?>">✔</a>
        <a href="delete_task.php?id=<?php echo $row['id']; ?>">🗑</a>
    </div>
</div>
<?php endwhile; ?>

<p style="text-align:center;"><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
