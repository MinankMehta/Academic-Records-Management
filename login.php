<?php
// all required variables defined here
session_start(); // start the session
session_unset();// unset all session variables
session_destroy();
		
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style.css-->
    <link rel="stylesheet" href="style.css">
    <!--fontawesome - for 5 social media icons in footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>LOGIN</title>
</head>
<div style="font-family: serif; font-size: 65px; color:white; margin-top:25px; margin-left:35px; "> A</div>
<div class="arm" style=" font-family: serif; font-size: 20px; color:white; margin-top:-58px; margin-left:77px;">cademic Records<br> Management System</div>
<body class="img">
    <!-- Home -->
    <section class="home">
    <div class="form_container">
        <div class="form login_form">
            <form method="POST" name="Logform" onsubmit="return ValidationForm()">
                <h2 style="font-family: Marcellus, serif; text-align: center;">Login</h2>
                
                <div class="input_box">
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <i class="uil uil-envelope-alt email"></i>
                </div>

                <div class="input_box">
                    <input type="password" name="password" placeholder="Enter your password" required />
                    <i class="uil uil-lock password"></i>
                    <!-- <i class="uil uil-eye-slash pw_hide"></i> -->
                </div>

                <button class="loginbtn" type="submit">Login Now</button>
            </form>
        </div>
<?php
// Assuming you have your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "academic_records";

// Checking if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Establishing a connection to the database
    $conn = new mysqli($servername,$username, $password, $dbname);

    // Checking if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieving the email and password from the form submission
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the email and password exist in the database
    $sql = "SELECT Type,name FROM Userdata WHERE Emailid = '$email' AND Password = '$password'";
    $result = $conn->query($sql);

    // Checking if a row was returned
    if ($result->num_rows > 0) {
        // Valid credentials
        $row = $result->fetch_assoc();
        $userType = $row['Type'];
	$_SESSION['type'] = $userType;
        $name = $row['name'];
	$_SESSION['username']=$name;      
        $_SESSION['loggedin'] = true;
                
        // Perform actions based on user type (student, teacher, admin)
        if ($userType === 'student') {
            // Student login logic
		echo '<script>window.location.href = "secondpage(gateway_pg).php";</script>';
        } elseif ($userType === 'teacher') {
            // Teacher login logic
		echo '<script>window.location.href = "secondpage(gateway_pg).php";</script>';
        } elseif ($userType === 'admin') {
            // Admin login logic
		echo '<script>window.location.href = "adminpg.php";</script>';
        }
    } else {
        // Invalid credentials
        echo "Invalid email or password.";
    }

    // Closing the database connection
    $conn->close();
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
