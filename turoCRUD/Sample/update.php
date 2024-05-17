<?php
    // Include db.php for database connection
    include 'db.php';

    //get the information based on the id
    if(isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        // Execute SQL query to select user information
        $sql = "SELECT * FROM students WHERE student_id = '$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Assign user information to variables
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $suffix = $row['suffix'];
            $course = $row['course'];
            $ysection = $row['year_section']; 
        } else {
            echo "No user found with the given ID.";
            exit(); // Stop script execution if ID not found
        }
    } else {
        echo "No ID provided.";
        exit(); // Stop script execution if ID not provided
    }

    // Updates the records.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $suffix = $_POST['suffix'];
        $course = $_POST['course'];
        $ysection = $_POST['ysection']; 

        // Prepare and execute SQL query for update
        $sql = "UPDATE students SET  fname='$fname', mname='$mname', lname='$lname', suffix='$suffix', course='$course', year_section='$ysection' WHERE student_id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data updated successfully!');</script>";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Citizen</title>
    <!-- Add your CSS styles here if needed -->
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <form method="POST">
        Barangay registration Form<br><br>
        <input type="hidden" name="id" value="<?php echo $id ?>"><br> <!-- "echo $id"  used to display value-->
        First Name:
        <input type="text" name="fname" value="<?php echo $fname ?>"><br><br>
        Last Name:
        <input type="text" name="mname" value="<?php echo $mname ?>"><br><br>
        Middle Name:
        <input type="text" name="lname" value="<?php echo $lname ?>"><br><br>
        Suffix:
        <input type="text" name="suffix" value="<?php echo $suffix ?>"><br><br>
        Course:
        <input type="text" name="course" value="<?php echo $course ?>"><br><br>
        Year & Section:
        <input type="text" name="ysection" value="<?php echo $ysection ?>"><br><br>
        <input type="submit" value="Update"> 
    
        <a href="index.php"><input type="button" value="Back"></a>
    </form>
</body>
</html>
