CREATE DATABASE soap_system;
USE soap_system;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('doctor', 'nurse', 'admin') NOT NULL
);

-- Create patients table
CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    symptoms TEXT,
    medical_history TEXT,
    blood_pressure VARCHAR(20),
    heart_rate INT,
    temperature DECIMAL(4,1),
    weight DECIMAL(5,2),
    diagnostic_tests TEXT,
    diagnosis TEXT,
    treatment_plan TEXT,
    medications TEXT,
    therapies TEXT,
    follow_ups TEXT
);

-- Create SOAP notes table
CREATE TABLE soap_notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    doctor_id INT,
    subjective TEXT,
    objective TEXT,
    assessment TEXT,
    plan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert sample users (passwords should be hashed in real applications)
INSERT INTO users (username, password_hash, role) VALUES 
('doctor1', 'hashed_password', 'doctor'),
('nurse1', 'hashed_password', 'nurse'),
('admin1', 'hashed_password', 'admin');

-- Insert sample patients
INSERT INTO patients (name, age, gender, symptoms, medical_history, blood_pressure, heart_rate, temperature, weight, diagnostic_tests, diagnosis, treatment_plan, medications, therapies, follow_ups)
VALUES
('Bolilan', 21, 'Male', 'Cough and fever', 'No prior conditions', '120/80 mmHg', 75, 37.5, 70.5, 'Chest X-ray: Normal', 'Flu', 'Rest and hydration', 'Paracetamol', 'None', 'Follow-up in 7 days'),
('Brosoto', 21, 'Female', 'Shortness of breath', 'Asthma', '130/85 mmHg', 80, 36.8, 65.3, 'Pulmonary Function Test: Mild obstruction', 'Asthma exacerbation', 'Inhaler therapy', 'Salbutamol inhaler', 'Breathing exercises', 'Follow-up in 14 days'),
('Cabuyao', 21, 'Male', 'Joint pain', 'Diabetes, Hypertension', '140/90 mmHg', 78, 37.0, 80.2, 'Blood test: High glucose', 'Arthritis', 'Pain management', 'Ibuprofen', 'Physical therapy', 'Monthly check-up'),
('Cartagena', 21, 'Female', 'Headache, dizziness', 'Migraines', '110/70 mmHg', 72, 36.5, 55.8, 'MRI: No abnormalities', 'Migraine', 'Lifestyle changes, medications', 'Sumatriptan', 'Relaxation techniques', 'Follow-up in 2 weeks'),
('Cero', 21, 'Male', 'Chest pain', 'Hypertension', '150/95 mmHg', 85, 37.2, 75.0, 'ECG: Possible ischemia', 'Angina', 'Cardiac workup', 'Aspirin, Beta-blockers', 'Cardiac rehab', 'Urgent referral to cardiologist');

-- Insert sample SOAP notes
INSERT INTO soap_notes (patient_id, doctor_id, subjective, objective, assessment, plan)
VALUES
(1, 1, 'Patient reports persistent cough and fever for 3 days.', 'Vitals stable, mild throat redness.', 'Likely viral infection.', 'Supportive care, hydration, and paracetamol.'),
(2, 1, 'Patient experiences shortness of breath after mild exertion.', 'Oxygen saturation 96%, mild wheezing on auscultation.', 'Asthma exacerbation.', 'Increase inhaler use, monitor peak flow.'),
(3, 1, 'Patient has joint pain, especially in knees.', 'Swollen knee joints, reduced flexibility.', 'Osteoarthritis.', 'Pain relief medication, physical therapy.'),
(4, 1, 'Patient complains of frequent headaches and dizziness.', 'Neurological exam normal.', 'Migraine headaches.', 'Prescribed triptans and advised lifestyle changes.'),
(5, 1, 'Patient reports chest pain on exertion.', 'Elevated blood pressure, ECG abnormalities.', 'Suspected angina.', 'Refer to cardiology, start aspirin therapy.');

