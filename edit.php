<?php
include 'studentdata.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    echo "No student ID provided.";
    exit;
}

$id = intval($_GET['id']);

// Fetching the student data
$result = $con->query("SELECT * FROM Application WHERE id = $id");

if ($result->num_rows != 1) {
    echo "No student data available.";
    exit;
}
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $mobile_number = $_POST['mobile_number'];
    $dob = $_POST['dob'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $mail = $_POST['mail'];
    $gender = $_POST['gender'];
    $fathers_name = $_POST['fathers_name'];
    $mother_name = $_POST['mother_name'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $address = $_POST['address'];

    $update = $con->prepare("UPDATE Application SET 
        student_name=?, mobile_number=?, dob=?, state=?, city=?, mail=?, gender=?, fathers_name=?, mother_name=?, course=?, branch=?, address=?
        WHERE id=?");
    $update->bind_param("ssssssssssssi", $student_name, $mobile_number, $dob, $state, $city, $mail, $gender, $fathers_name, $mother_name, $course, $branch, $address, $id);

    if ($update->execute()) {
        echo "<script>alert('Student updated successfully.'); window.location='table.php';</script>";
        exit;
    } else {
        echo "Update failed: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <style>
        body {
            background-color: #f8d7da;
            font-family: Arial, sans-serif;
            padding: 30px;
            text-align: center;
        }
        form {
            display: inline-block;
            text-align: left;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            border: 2px solid #dc3545;
        }
        input, select, textarea {
            display: block;
            width: 300px;
            margin-bottom: 15px;
            padding: 8px;
        }
        label {
            font-weight: bold;
        }
        button {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Edit Student Record</h2>

<form method="post">
    <label>Student Name</label>
    <input type="text" name="student_name" value="<?=($row['student_name']) ?>" required>

    <label>Mobile Number</label>
    <input type="text" name="mobile_number" value="<?=($row['mobile_number']) ?>" required>

    <label>Date of Birth</label>
    <input type="date" name="dob" value="<?=($row['dob']) ?>" required>

    <label>State</label>
    <input type="text" name="state" value="<?=($row['state']) ?>" required>

    <label>City</label>
    <input type="text" name="city" value="<?=($row['city']) ?>" required>

    <label>Email</label>
    <input type="email" name="mail" value="<?=($row['mail']) ?>" required>

    <label>Gender</label>
    <select name="gender" required>
        <option value="Male" <?= $row['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= $row['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
    
    </select>

    <label>Father's Name</label>
    <input type="text" name="fathers_name" value="<?=($row['fathers_name']) ?>" required>

    <label>Mother's Name</label>
    <input type="text" name="mother_name" value="<?=($row['mother_name']) ?>" required>

    <label>Course</label>
    <input type="text" name="course" value="<?=($row['course']) ?>" required>

    <label>Branch</label>
    <input type="text" name="branch" value="<?=($row['branch']) ?>" required>

    <label>Address</label>
    <textarea name="address" required><?=($row['address']) ?></textarea>

    <button type="submit">Update</button>
</form>

</body>
</html>
