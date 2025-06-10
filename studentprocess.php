<?php
include 'studentdata.php';

if (isset($_POST['submit'])) {
    
    $StudentName = $_POST['sname'];
    $MobileNumber = $_POST['mobileno'];
    $DOB = $_POST['dob'];
    $State = $_POST['state'];
    $City = $_POST['city'];
    $Mail = $_POST['email'];
    $Gender = $_POST['gender'];
    $FathersName = $_POST['fname'];
    $MothersName = $_POST['mname'];
    $Course = $_POST['course'];
    $Branch = implode(",", $_POST['branch']); 
    $Address = $_POST['address'];

    if (isset($_FILES['sphoto']) && $_FILES['sphoto']['error'] === 0) {
        $photoTmp = $_FILES['sphoto']['tmp_name'];
        $photoName = uniqid() . "_" . basename($_FILES['sphoto']['name']);
        $photoDestination = "uploads/" . $photoName;

        if (move_uploaded_file($photoTmp, $photoDestination)) {
            echo "School Photo uploaded successfully!<br>";
        } else {
            echo "Error uploading school photo.<br>";
        }
    } else {
        echo "No school photo uploaded or error in uploading.<br>";
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $schoolLPhotoTmp = $_FILES['photo']['tmp_name'];
        $schoolLPhotoName = uniqid() . "_" . basename($_FILES['photo']['name']);
        $schoolLPhotoDestination = "uploads/" . $schoolLPhotoName;

        if (move_uploaded_file($schoolLPhotoTmp, $schoolLPhotoDestination)) {
            echo "Student Photo uploaded successfully!<br>";
        } else {
            echo "Error uploading student photo.<br>";
        }
    } else {
        echo "No student photo uploaded or error in uploading.<br>";
    }

     // Debugging: show uploaded file info
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    
    $sql = "INSERT INTO Application(student_name, mobile_number, dob, state, city, mail, gender, fathers_name, mother_name, course, branch, photo, school_l_photo, address)
            VALUES ('$StudentName', '$MobileNumber', '$DOB', '$State', '$City', '$Mail', '$Gender', '$FathersName', '$MothersName', '$Course', '$Branch', ' $photoName', '$schoolLPhotoName', '$Address')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('New record inserted successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
