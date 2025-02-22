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
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div>
        <h2>SOAP System Dashboard</h2>
        <div>
            <h5>Welcome, <?= htmlspecialchars($role) ?> <?= htmlspecialchars($username) ?></h5>
        </div>
        
        <div>
            <a href="add.php">Add Patient</a>
            <a href="index.php">Logout</a>
        </div>
        
        <h3>Patients List</h3>
        <table>
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
                        <a href="view.php?id=<?= $row['id'] ?>">View</a>
                        <a href="edit.php?id=<?= $row['id'] ?>">Update</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>