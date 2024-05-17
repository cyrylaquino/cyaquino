<html>
    <body>
        <h2>Barangay Registration Form</h2>
        <form method="POST">
            Student ID:
            <input type="text" name="id" required><br><br>
            First Name:
            <input type="text" name="fname" required><br><br>
            Middle Name:
            <input type="text" name="mname" required><br><br>
            Last Name:
            <input type="text" name="lname" required><br><br>
            Suffix:
            <input type="text" name="suffix" required><br><br>
            Course:
            <input type="text" name="course" required><br><br>
            Year and Section:
            <input type="text" name="ysection" required><br><br>
            <input type="submit" value="Add">
            <input type="reset" value="Clear">
            <a href="index.php"><input type="button" value="Back"></a>

        </form>
        <?php
            include 'db.php'; // Include db.php for database connection

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Collect form data
                $id = $_POST['id'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $suffix = $_POST['suffix'];
                $course = $_POST['course'];
                $ysection = $_POST['ysection']; 

                // Insert data into database
                $sql = "INSERT INTO students (student_id, fname, mname, lname, suffix, course, year_section) VALUES ('$id', '$fname', '$mname', '$lname', '$suffix', '$course', '$ysection')";
                
                
                if (mysqli_query($conn, $sql)) {
                    echo "<p style='color:green;'>Data added successfully!</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        ?>
    </body>
</html>
