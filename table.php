<?php include 'studentdata.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="tabel.css">
    <script src="https://kit.fontawesome.com/13d6d99986.js" crossorigin="anonymous"></script>
    <style>
        body{
    text-align: center;
    background-color:  #f8d7da;
}
table{
    border: 2px solid;
    border-collapse: collapse;
    margin: 10px;
}
td{
    border: 1px solid;
    font-family: arial;
}
th {
    border: 1px solid;
    font-family:Arial, Helvetica, sans-serif;
}
th{
    font-weight: bolder;
    padding: 5px;
    color: white;
    background-color: rgb(238, 13, 13);
}
h1{
    font-family:Georgia, 'Times New Roman', Times, serif;
   
}
tr{
    background-color: rgb(253, 222, 223);
}

tr:hover{
    background-color: rgb(250, 125, 125);
}

div{
     background-color: rgb(251, 249, 249);
    border: 2px solid;
    border-radius: 20px;
    margin: 0 10%;
    padding-bottom: 20px;
}
    </style>
</head>
<body>
    <div>
    <h1>Submitted Student Details</h1>
    <table method="post" action="studentprocess.php" enctype="multipart/form-data">
        <tbody>
        <thead>
              <tr>
          <th>ID</th>
          <th>Student Name</th>
          <th>Mobile Number</th>
          <th>DOB</th>
          <th>State</th>
          <th>City</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Father's Name</th>
          <th>Mother's Name</th>
          <th>Course</th>
          <th>Branch</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
        </thead>
        <?php
        $result = $con->query("SELECT * FROM Application ORDER BY id DESC");
        while ($row = $result->fetch_assoc()):
        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><a href="edit.php?id=<?= $row['id'] ?>"><?=($row['student_name']) ?></a></td>
            <td><?= $row['mobile_number'] ?></td>
            <td><?= $row['dob'] ?></td>
            <td><?= $row['state'] ?></td>
            <td><?= $row['city'] ?></td>
            <td><?= $row['mail'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?= $row['fathers_name'] ?></td>
            <td><?= $row['mother_name'] ?></td>
            <td><?= $row['course'] ?></td>
            <td><?= $row['branch'] ?></td>
            <td><?= $row['address'] ?></td>
            <td>
            <a href="edit.php?id=<?= $row['id'] ?>">
              <button class="action-btn edit-btn"><i class="fas fa-edit"></i> Edit</button>
            </a>
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this record?');">
              <button class="action-btn delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
            </a>
          </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    </div>
</body>
</html>