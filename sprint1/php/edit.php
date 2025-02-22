<?php
// edit.php
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $diagnosis = $_POST['diagnosis'];
    $medications = $_POST['medications'];
    $therapies = $_POST['therapies'];
    $follow_ups = $_POST['follow_ups'];

    $update_query = "UPDATE patients SET diagnosis = ?, medications = ?, therapies = ?, follow_ups = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssssi", $diagnosis, $medications, $therapies, $follow_ups, $patient_id);

    if ($stmt->execute()) {
        header("Location: view.php?id=$patient_id");
        exit();
    } else {
        echo "Error updating patient information.";
    }
}

$query = "SELECT * FROM patients WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient SOAP</title>
</head>
<body>
    <h2>Update Patient SOAP</h2>
    <hr>
    <form method="POST">
        <label>Diagnosis:</label>
        <textarea name="diagnosis" rows="3" required><?= htmlspecialchars($patient['diagnosis']) ?></textarea>
        
        <h4>Treatment Plan</h4>
        
        <label>Medications:</label>
        <br>
        <textarea name="medications" rows="3"><?= htmlspecialchars($patient['medications']) ?></textarea>
        <br>
        
        <label>Therapies:</label>
        <br>
        <textarea name="therapies" rows="3"><?= htmlspecialchars($patient['therapies']) ?></textarea>
        <br>
        
        <label>Follow-up Appointments:</label>
        <br>
        <textarea name="follow_ups" rows="2"><?= htmlspecialchars($patient['follow_ups']) ?></textarea>
        <br>
        
        <button type="submit">Update SOAP</button>
        <a href="view.php?id=<?= $patient_id ?>">Cancel</a>
    </form>
</body>
</html>