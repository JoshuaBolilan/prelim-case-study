<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $symptoms = $_POST['symptoms'];
    $medical_history = $_POST['medical_history'];
    $blood_pressure = $_POST['blood_pressure'];
    $heart_rate = $_POST['heart_rate'];
    $temperature = $_POST['temperature'];
    $weight = $_POST['weight'];
    $diagnostic_tests = $_POST['diagnostic_tests'];

    $query = "INSERT INTO patients (name, age, gender, symptoms, medical_history, blood_pressure, heart_rate, temperature, weight, diagnostic_tests)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sissssidds", $name, $age, $gender, $symptoms, $medical_history, $blood_pressure, $heart_rate, $temperature, $weight, $diagnostic_tests);

    if ($stmt->execute()) {
        echo "Patient added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
</head>
<body>

    <h2>Add Patient</h2>

    <form action="add.php" method="POST">

        <label>Name:</label>
        <br>
        <input type="text" name="name" required>
        <br><br>

        <label>Age:</label>
        <br>
        <input type="number" name="age" required>
        <br><br>

        <label>Gender:</label>
        <br>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <br><br>

        <h4>Subjective Data</h4>

        <label>Symptoms:</label>
        <br>
        <textarea name="symptoms" required></textarea>
        <br><br>

        <label>Medical History:</label>
        <br>
        <textarea name="medical_history" required></textarea>
        <br><br>

        <h4>Objective Data</h4>

        <label>Blood Pressure:</label>
        <br>
        <input type="text" name="blood_pressure" required>
        <br><br>

        <label>Heart Rate (BPM):</label>
        <br>
        <input type="number" name="heart_rate" required>
        <br><br>

        <label>Temperature (°C):</label>
        <br>
        <input type="number" step="0.1" name="temperature" required>
        <br><br>

        <label>Weight (kg):</label>
        <br>
        <input type="number" step="0.1" name="weight" required>
        <br><br>

        <label>Diagnostic Tests:</label>
        <br>
        <textarea name="diagnostic_tests" required></textarea>
        <br><br>

        <button type="submit">Add Patient</button>
        <br><br>

        <a href="dashboard.php">Back to Dashboard</a> 

    </form>

</body>
</html>
