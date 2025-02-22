<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];

$query = "SELECT * FROM patients";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SOAP System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
   
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
                <h3>SOAP System</h3>
            <div class="user-info">
                <h5>Welcome, <?= htmlspecialchars($role) ?> <?= htmlspecialchars($username) ?></h5>
            </div>
        
            <a href="add.php" class="btn btn-light">Add Patient</a>
            <a href="index.php" class="btn btn-danger">Logout</a>
        </div>
        <div class="content">
            <h2>Dashboard</h2>
            <h3>Patients List</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Symptoms</th>
                        <th>Medical History</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= $row['age'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= htmlspecialchars($row['symptoms']) ?></td>
                        <td><?= htmlspecialchars($row['medical_history']) ?></td>
                        <td>
                            <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-info">View</a>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">Update</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
