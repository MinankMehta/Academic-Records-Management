<?php
    session_start();

	if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
        header("Location: login.php");
        exit();
    }
	if (!isset($_SESSION['semester']) || !isset($_SESSION['year']) || !isset($_SESSION['branch'])) {
        header("Location: secondpage(gateway_pg).php"); 
        exit();
    }


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "academic_records";
    $conn = mysqli_connect( $servername, $username, $password, $dbname);
    if (!$conn)
    {
        die("Error" . mysqli_connect_error ());
    }
    $semester = $_SESSION["semester"];
    $branch = $_SESSION["branch"];
    $year = $_SESSION["year"];
    $sql = "Select subject from subjectdata where semester='$semester' and branch='$branch' and year='$year'";
    $result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style.css-->
    <link rel="stylesheet" href="style_sub.css">
    <!--fontawesome - for 5 social media icons in footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>Subjects</title>
</head>
<body class="img">
    
    <!-- Home -->
    <section class="home">
        <div class="roww">
            <?php
               if (mysqli_num_rows($result) > 0) 
               {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $subject_name = $row['subject'];
                        echo "<a href='?subject=$subject_name'><div class='form_container'>$subject_name</div></a>";
                    }
                }

                // PHP code to handle storing the subject value in session and redirecting based on user type
                if (isset($_GET['subject'])) 
                {
                    $_SESSION['subject'] = $_GET['subject'];

                    if ($_SESSION['type'] === 'teacher') {
                        header("Location: teacher.php"); // Redirect to the teacher.php page for teachers
                    } elseif ($_SESSION['type'] === 'student') {
                        header("Location: student.php"); // Redirect to the student.php page for students
                    } else {
                        header("Location: teacher.php"); // Redirect to the admin.php page for other user types
                    }
                    exit();
                }
            ?>
        </div>
    </section>

    <footer>
        <div class="logo"><!--2 clg logos-->
            <img src="svu_kjsce.jpg" alt="SVU-KJSCE" class="logo1">
            <img src="somaiya_trust.png" alt="Somaiya-trust" class="logo2">
        </div>
        <div class="footer1">.<!--don't remove this dot/fullstop--></div><!--light red small rectangle-->
        <div class="footer2"><!--dark red big rectangle with 5 social media icons-->
            <div class="social">
                <a href="https://www.facebook.com/pages/Somaiya-Vidyavihar/122977847737512/" target="_blank"><span class="fab fa-facebook-f"></span></a>
                <a href="https://twitter.com/Somaiya_SVU/" target="_blank"><span class="fab fa-twitter"></span></a>
                <a href="https://instagram.com/somaiyatrust/" target="_blank"><span class="fab fa-instagram"></span></a>
                <a href="http://www.youtube.com/somaiyavidyavihar/" target="_blank"><span class="fab fa-youtube"></span></a>
                <a href="https://www.linkedin.com/school/somaiya-vidyavihar-university/" target="_blank"><span class="fab fa-linkedin"></span></a>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>

