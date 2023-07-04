<?php
    session_start();
 
    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the selected option from the form
        $selectedOption = $_POST['option'];

        // Assign the selected option to $_SESSION['subject']
        $_SESSION['subject'] = $selectedOption;

        if ($_SESSION['type'] === 'teacher') {
            header("Location: teacher.php");
            exit();
        } elseif ($_SESSION['type'] === 'student') {
            header("Location: student.php");
            exit();
        }
	else {
	header("Location: admin.php");
            exit();
	}
    }
?><!DOCTYPE html>
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
    <div class="row">
        <form  method="post">
            <input type="hidden" name="option" value="Advanced Databases">
            <button type="submit" class="form_container">Advanced Databases</button>
        </form>
        <form method="post">
            <input type="hidden" name="option" value="Analysis of Algorithms">
            <button type="submit" class="form_container">Analysis of Algorithms</button>
        </form>
        <form  method="post">
            <input type="hidden" name="option" value="Information Theory and Coding">
            <button type="submit" class="form_container">Information Theory and Coding</button>
        </form>
        <form method="post">
            <input type="hidden" name="option" value="Web Programming-I">
            <button type="submit" class="form_container">Web Programming-I</button>
        </form>
        <form  method="post">
            <input type="hidden" name="option" value="Competitive Programming">
            <button type="submit" class="form_container">Competitive Programming</button>
        </form>
        <form  method="post">
            <input type="hidden" name="option" value="PSOT">
            <button type="submit" class="form_container">PSOT</button>
        </form>
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