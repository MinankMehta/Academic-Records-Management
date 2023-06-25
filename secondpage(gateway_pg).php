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
	<style>
		input[type="radio"] {
  		position: absolute;
  		opacity: 0;
  		width: 0;
  		height: 0;
		}
	</style>
    </head>
    <body class="img">
        <form method="post" action="#">
        <div class="main">
            <div class="sem">
                <div class="select">
                    <span class="highlight">Semester</span>
                    <div class="symbol"></div>
                </div>
                <ul class="drop">
                    <li><input type="radio" name="semester" value="SEM I">SEM I</li>
                    <li><input type="radio" name="semester" value="SEM II">SEM II</li>
                    <li><input type="radio" name="semester" value="SEM III">SEM III</li>
                    <li><input type="radio" name="semester" value="SEM IV">SEM IV</li>
                    <li><input type="radio" name="semester" value="SEM V">SEM V</li>
                    <li><input type="radio" name="semester" value="SEM VI">SEM VI</li>
                </ul>
            </div>
            <div class="pastyear">
                <div class="select">
                    <span class="highlight">Year</span>
                    <div class="symbol"></div>
                </div>
                <ul class="drop">
                    <li><input type="radio" name="year" value="2023">2023</li>
                    <li><input type="radio" name="year" value="2022">2022</li>
                    <li><input type="radio" name="year" value="2021">2021</li>
                    <li><input type="radio" name="year" value="2020">2020</li>
                </ul>
            </div>
            <div class="branch">
                <div class="select">
                    <span class="highlight">Branch</span>
                    <div class="symbol"></div>
                </div>
                <ul class="drop">
                    <li><input type="radio" name="branch" value="COMPS">COMPS</li>
                    <li><input type="radio" name="branch" value="IT">IT</li>
                    <li><input type="radio" name="branch" value="EXTC">EXTC</li>
                    <li><input type="radio" name="branch" value="ETRX">ETRX</li>
                    <li><input type="radio" name="branch" value="MECH">MECH</li>
                    <li><input type="radio" name="branch" value="EXCP">EXCP</li>
                </ul>
            </div>   
        </div>
        <button type="submit" class="enterbtn">Enter</button>
    </form>

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
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the selected values from the form
    $semester = $_POST["semester"];
    $year = $_POST["year"];
    $branch = $_POST["branch"];

    // Store the values in session variables
    $_SESSION["semester"] = $semester;
    $_SESSION["year"] = $year;
    $_SESSION["branch"] = $branch;

    
}
?>


</html>
