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

	if (!isset($_SESSION['subject'])) {
        header("Location: subjects.php"); 
        exit();
    }
	if ($_SESSION['type'] === 'student') {
            header("Location: student.php");
            exit();
        }

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the selected option from the form
        $selectedOption = $_POST['option'];

        // Assign the selected option to $_SESSION['option']
        $_SESSION['option'] = $selectedOption;
		
	    header("location: last_page-Display2.php");
        exit();
        
    }

    $semester = $_SESSION["semester"];
    $branch = $_SESSION["branch"];
    $year = $_SESSION["year"];
    $sub = $_SESSION['subject'];
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
<div class="arm" style="font-family: serif; font-size: 20px; padding-top:20px; padding-left:20px;"><div style="font-size: 65px;font-family: serif; margin-top:-16px; margin-right:-4px;">A</div>cademic Records<br> Management System</div>

<body>
<div class="container">
    <div class="inner-container">
    <form method="POST">
    <div class="gatewaytitle">Records<br></div>
    <div class="tit">
        <?php echo "Semester ".$semester."-".$branch." ".$year." <br>".$sub; ?>
    </div>
            <!-- <input type="hidden" name="option" value="IA_Structure">
            <button type="submit" class="record" disabled>Records</button> -->
        </form>
        <form method="POST">
            <input type="hidden" name="option" value="IA_Structure">
            <button type="submit" class="record">IA-Structure</button>
        </form>
        <form method="POST">
            <input type="hidden" name="option" value="LAB_Writeups">
            <button type="submit" class="record">LAB Write-ups</button>
        </form>
        <form method="POST">
            <input type="hidden" name="option" value="List_of_Experiments">
            <button type="submit" class="record">List of Experiments</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="Course_Exit_Feedback">
            <button type="submit" class="record">Course Exit Feedback</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="ISE_Papers">
            <button type="submit" class="record">ISE Papers</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="ISE_Solutions">
            <button type="submit" class="record">ISE Solutions</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="ESE_Papers">
            <button type="submit" class="record">ESE Papers</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="ESE_Solutions">
            <button type="submit" class="record">ESE Solutions</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="Projects_Allotted">
            <button type="submit" class="record">Projects Allotted</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="Syllabus">
            <button type="submit" class="record">Syllabus</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="CO_PO_Mapping">
            <button type="submit" class="record"> CO-PO Mapping</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="CIS_sheets">
            <button type="submit" class="record"> CIS Sheets</button>
        </form>
        <form  method="POST">
            <input type="hidden" name="option" value="PO_attainment_Batchwise">
            <button type="submit" class="record">PO Attainment - Batchwise</button>
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