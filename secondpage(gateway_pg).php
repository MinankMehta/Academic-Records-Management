<?php
		
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gateway</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body class="img">
        <div class="main">
            <div class="sem">
                <div class="select">
                    <span class="highlight">Semester</span>
                    <div class="symbol"></div>
                </div>
                <ul class="drop">
                    <li>SEM I</li>
                    <li>SEM II</li>
                    <li>SEM III</li>
                    <li>SEM IV</li>
                    <li>SEM V</li>
                    <li>SEM VI</li>
                </ul>
            </div>
            <div class="pastyear">
                <div class="select">
                    <span class="highlight">Year</span>
                    <div class="symbol"></div>
                </div>
                <ul class="drop">
                    <li>2023</li>
                    <li>2022</li>
                    <li>2021</li>
                    <li>2020</li>
                </ul>
            </div>
            <div class="branch">
                <div class="select">
                    <span class="highlight">Branch</span>
                    <div class="symbol"></div>
                </div>
                <ul class="drop">
                    <li>COMPS</li>
                    <li>IT</li>
                    <li>EXTC</li>
                    <li>ETRX</li>
                    <li>MECH</li>
                    <li>EXCP</li>
                </ul>
            </div>   
        </div>
        <button class="enterbtn">Enter</button>

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
