<?php
session_start();
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || $_SESSION['type'] === 'student' || $_SESSION['type'] === 'teacher') {
      header("Location: login.php"); 
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style.css-->
    <link rel="stylesheet" href="style.css">
    <!--fontawesome - for 5 social media icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Admin Dashboard</title>
</head>
<div style="font-family: serif; font-size: 65px; color:white; margin-top:25px; margin-left:35px; "> A</div>
<div class="arm" style=" font-family: serif; font-size: 20px; color:white; margin-top:-58px; margin-left:77px;">cademic Records<br> Management System</div>

<body class="img">
    <h1 class="admintitle">Admin Page</h1>
    <!-- <br><br> -->
    <div class="updatebtn">
        <button class="userup" onclick="window.location.href='userupdate.php'">User Update</button>
        <button class="pdfup" onclick="window.location.href='secondpage(gateway_pg).php'">PDF Update</button>
        <button class="syllup" onclick="window.location.href='syllabusupdate.php'">Syllabus Update</button>
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

    <!--js file-->
    <script src="script.js"></script>
</body>
</html>
