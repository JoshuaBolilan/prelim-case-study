<?php
// edit.php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-primary">Update Patient SOAP</h2>
        <hr>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Diagnosis:</label>
                <textarea name="diagnosis" class="form-control" rows="3" required><?= htmlspecialchars($patient['diagnosis']) ?></textarea>
            </div>

            <h4 class="text-secondary">Treatment Plan</h4>
            <div class="mb-3">
                <label class="form-label fw-bold">Medications:</label>
                <textarea name="medications" class="form-control" rows="3"><?= htmlspecialchars($patient['medications']) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Therapies:</label>
                <textarea name="therapies" class="form-control" rows="3"><?= htmlspecialchars($patient['therapies']) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Follow-up Appointments:</label>
                <textarea name="follow_ups" class="form-control" rows="2"><?= htmlspecialchars($patient['follow_ups']) ?></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update SOAP</button>
                <a href="view.php?id=<?= $patient_id ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
