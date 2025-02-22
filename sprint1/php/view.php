<?php
// view.php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "Invalid request.";
    exit();
}

$patient_id = $_GET['id'];
$query = "SELECT * FROM patients WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient SOAP Details</title>
</head>
<body>
    <h2>SOAP System</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="edit.php?id=<?= $patient_id ?>">Edit SOAP</a>

    <h2>Patient SOAP Details</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr><th>Name</th><td><?= htmlspecialchars($patient['name']) ?></td></tr>
        <tr><th>Age</th><td><?= $patient['age'] ?></td></tr>
        <tr><th>Gender</th><td><?= $patient['gender'] ?></td></tr>
        <tr><th>Symptoms</th><td><?= htmlspecialchars($patient['symptoms']) ?></td></tr>
        <tr><th>Medical History</th><td><?= htmlspecialchars($patient['medical_history']) ?></td></tr>
        <tr><th>Blood Pressure</th><td><?= $patient['blood_pressure'] ?></td></tr>
        <tr><th>Heart Rate</th><td><?= $patient['heart_rate'] ?> BPM</td></tr>
        <tr><th>Temperature</th><td><?= $patient['temperature'] ?> °C</td></tr>
        <tr><th>Weight</th><td><?= $patient['weight'] ?> kg</td></tr>
        <tr><th>Diagnostic Tests</th><td><?= htmlspecialchars($patient['diagnostic_tests']) ?></td></tr>
    </table>

    <h3>Diagnosis</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr><th>Primary Diagnosis</th><td><?= htmlspecialchars($patient['diagnosis']) ?></td></tr>
    </table>

    <h3>Treatment Plan</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr><th>Medications</th><td><?= htmlspecialchars($patient['medications']) ?></td></tr>
        <tr><th>Therapies</th><td><?= htmlspecialchars($patient['therapies']) ?></td></tr>
        <tr><th>Follow-up Appointments</th><td><?= htmlspecialchars($patient['follow_ups']) ?></td></tr>
    </table>
</body>
</html>