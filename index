<?php
session_start();
require 'database.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Handle Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Fetch Patient Records
$stmt = $conn->query("SELECT * FROM patients ORDER BY created_at DESC");
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SOAP System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <a href="?logout">Logout</a>

        <h3>Add Patient SOAP Record</h3>
        <form method="POST" action="index.php">
            <input type="text" name="patient_name" placeholder="Patient Name" required><br>
            <textarea name="subjective" placeholder="Subjective (Symptoms, Medical History)" required></textarea><br>
            <textarea name="objective" placeholder="Objective (Exams, Test Results)" required></textarea><br>
            <textarea name="assessment" placeholder="Assessment (Diagnosis)" required></textarea><br>
            <textarea name="plan" placeholder="Plan (Medications, Follow-ups)" required></textarea><br>
            <button type="submit" name="add_patient">Add Record</button>
        </form>

        <h3>Patient Records</h3>
        <table>
            <tr>
                <th>Patient Name</th>
                <th>Subjective</th>
                <th>Objective</th>
                <th>Assessment</th>
                <th>Plan</th>
                <th>Created At</th>
            </tr>
            <?php foreach ($patients as $patient) : ?>
            <tr>
                <td><?php echo htmlspecialchars($patient['patient_name']); ?></td>
                <td><?php echo htmlspecialchars($patient['subjective']); ?></td>
                <td><?php echo htmlspecialchars($patient['objective']); ?></td>
                <td><?php echo htmlspecialchars($patient['assessment']); ?></td>
                <td><?php echo htmlspecialchars($patient['plan']); ?></td>
                <td><?php echo $patient['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>