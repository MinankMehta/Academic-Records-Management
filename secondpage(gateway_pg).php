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
		.drop li {
    padding: 0.6em 0.5em;
    margin: 0.3em 0;
    border-radius: 0.5em;
    cursor: pointer;
    font-family: 'Fira sans';
    font-size: 15px;
    position: relative;
}

.drop li input[type="radio"] {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    cursor: pointer;
}
</style>
    </head>
    <body class="img">
       <form method="post" name="gateway" onsubmit="return ValidationForm2()">
    <div class="main">
        <div class="sem">
            <div class="select">
                <span class="highlight">Semester</span>
                <div class="symbol"></div>
            </div>
            <ul class="drop">
                <li>
                    <label>
                        <input type="radio" name="semester" value="SEM I">
                        <span>SEM I</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="semester" value="SEM II">
                        <span>SEM II</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="semester" value="SEM III">
                        <span>SEM III</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="semester" value="SEM IV">
                        <span>SEM IV</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="semester" value="SEM V">
                        <span>SEM V</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="semester" value="SEM VI">
                        <span>SEM VI</span>
                    </label>
                </li>
            </ul>
        </div>
        <div class="pastyear">
            <div class="select">
                <span class="highlight">Year</span>
                <div class="symbol"></div>
            </div>
            <ul class="drop">
                <li>
                    <label>
                        <input type="radio" name="year" value="2023">
                        <span>2023</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="year" value="2022">
                        <span>2022</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="year" value="2021">
                        <span>2021</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="year" value="2020">
                        <span>2020</span>
                    </label>
                </li>
            </ul>
        </div>
        <div class="branch">
            <div class="select">
                <span class="highlight">Branch</span>
                <div class="symbol"></div>
            </div>
            <ul class="drop">
                <li>
                    <label>
                        <input type="radio" name="branch" value="COMPS">
                        <span>COMPS</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="branch" value="IT">
                        <span>IT</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="branch" value="EXTC">
                        <span>EXTC</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="branch" value="ETRX">
                        <span>ETRX</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="branch" value="MECH">
                        <span>MECH</span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="branch" value="EXCP">
                        <span>EXCP</span>
                    </label>
                </li>
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
