<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Admission Form</title>
     
    <style>
        body{
            margin:0;
            box-sizing: border-box;
            background-color: #f8d7da;
            font-family: Arial, sans-serif;
            }

        input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red;
        }
        input[type=tel]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red;
        }
        input[type=tel]:focus {
        background-color:  #f8d7da;
        }

        input[type= email]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red;
        }
        input[type=email]:focus {
        background-color: #f8d7da;
        }

        .student{
            width: 50%;
            margin-left: 25%;
            border: 3px solid;
            border-radius: 10px;
            padding: 20px 10px 50px 10px;
            border: 2px solid #dc3545;
            background-color: white;
        }

        .clearfix::after {
        content: "";
        clear:right;
        display:table;
        }
        img{
            width:2cm;
            float: right;
        }
        h1{
            text-align: center;
        }
        .row{
            padding: 8px;
            margin-left: 2px;
        }
        textarea{
            width:100%;
            height: 100px;
        }
        input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }
        input[type=text]:focus {
        background-color: #f8d7da;
        }

        @media only screen and (max-width: 455 px){
        body{
        display: flex;
        }
        }
    </style>  
</head>
<body>
    <h1>Student Admission Form</h1>
    <form method="post" action="studentprocess.php" enctype="multipart/form-data">
        <section class="student">
            
                <div class="clearfix">
                    <img src="/practice/student image.jpg" alt="">
                </div>
                <br><br>
                <fieldset>
                    <legend>Student Information</legend>
                    <label>Student Name:</label>
                    <input type="text" name="sname" required>
                    <label>Mobile Number:</label>
                    <input type="tel" name="mobileno" required>
                    <label>Date Of Birth:</label>
                    <input type="date" name="dob" required><br><br>
                    <label>State:</label>
                    <input type="text" name="state" required>
                    <label>City:</label>
                    <input type="text" name="city" required>
                    <label>Mail Id:</label>
                    <input type="email" name="email" required>
                    <label>Gender:</label><br>
                    <input type="radio" name="gender" value="Male" required> Male
                    <input type="radio" name="gender" value="Female"> Female
                </fieldset>
                    <br><br>
                <fieldset>
                    <legend>Parent Information</legend>
                    <label>Father Name:</label>
                    <input type="text" name="fname" required>
                    <label>Mother Name:</label>
                    <input type="text" name="mname" required>
                </fieldset>
                    <br><br>
                <fieldset>
                    <legend>Course Information</legend>
                    <label>Select Course:</label>
                    <select name="course" required>
                        <option value="">Select...</option>
                        <option value="B-Tech">B-Tech</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                        <option value="B-Com">B-Com</option>
                        <option value="M-Tech">M-Tech</option>
                        <option value="MCA">MCA</option>
                        <option value="MBA">MBA</option>
                    </select>
                    <br><br>
                    <label>Select Branch:</label>
                    <input type="checkbox" name="branch[]" value="CSE">CSE
                    <input type="checkbox" name="branch[]" value="CIVIL">CIVIL
                    <input type="checkbox" name="branch[]" value="IT">IT
                    <input type="checkbox" name="branch[]" value="ECE">ECE
                </fieldset> <br><br>
                <fieldset>
                    <legend>File's Upload </legend>
                <label>Student Photo:</label>
                <input type="file" name="sphoto" required>
                <br><br>
                <label>School Leaving Photo:</label>
                <input type="file" name="photo" required>
                </fieldset>
                <br><br>
                <fieldset>
                    <legend>Address</legend>
                    <textarea name="address" required></textarea>
                </fieldset>

                <input type="submit" name="submit" value="Submit">
            
        </section>
    </form>
</body>
</html>
