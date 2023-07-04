<?php
    session_start();

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the selected option from the form
        $selectedOption = $_POST['option'];

        // Assign the selected option to $_SESSION['option']
        $_SESSION['option'] = $selectedOption;

        header("location: last_page-display.php");
        exit();
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lastpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>RECORDS</title>
</head>
<body>
<div class="container">
    <div class="inner-container">
        <form method="POST">
            <input type="hidden" name="option" value="IA-Structure">
            <button type="submit" class="record">IA-Structure</button>
        </form>
        <form method="POST">
            <input type="hidden" name="option" value="LAB-Writeups">
            <button type="submit" class="record">LAB Write-ups</button>
        </form>
        <form method="POST">
            <input type="hidden" name="option" value="List-of-Experiments">
            <button type="submit" class="record">List of Experiments</button>
        </form>
        <form action="option_page.php" method="POST">
            <input type="hidden" name="option" value="Course-Exit-Feedback">
            <button type="submit" class="record">Course Exit Feedback</button>
        </form>
        <form action="option_page.php" method="POST">
            <input type="hidden" name="option" value="ISE-Papers">
            <button type="submit" class="record">ISE Papers</button>
        </form>
        <form action="option_page.php" method="POST">
            <input type="hidden" name="option" value="ISE-Solutions">
            <button type="submit" class="record">ISE Solutions</button>
        </form>
        <form action="option_page.php" method="POST">
            <input type="hidden" name="option" value="ESE-Papers">
            <button type="submit" class="record">ESE Papers</button>
        </form>
        <form action="option_page.php" method="POST">
            <input type="hidden" name="option" value="ESE-Solutions">
            <button type="submit" class="record">ESE Solutions</button>
        </form>
        <form action="option_page.php" method="POST">
            <input type="hidden" name="option" value="Projects-Allotted">
            <button type="submit" class="record">Projects Allotted</button>
        </form>
        <form action="option_page.php" method="POST">
            <input type="hidden" name="option" value="Syllabus">
            <button type="submit" class="record">Syllabus</button>
        </form>

    </div>
</div>

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
</body>
</html>