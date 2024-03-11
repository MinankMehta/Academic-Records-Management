
<?php
    session_start();

		$serial=1;
	if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
        header("Location: login.php"); 
        exit();
    }
	if (!isset($_SESSION['semester']) || !isset($_SESSION['year']) || !isset($_SESSION['branch'])) {
        header("Location: report1.php"); 
        exit();
    }

	if (!isset($_SESSION['subject'])) {
        header("Location: report2.php");
        exit();
    }
	
	// if (!isset($_SESSION['option'])) {
    //     // Check the session type
    //     if ($_SESSION['type'] === 'student') {
    //         header("Location: student.php");
    //         exit();
    //     } elseif ($_SESSION['type'] === 'teacher') {
    //         header("Location: teacher.php");
    //         exit();
    //     } elseif ($_SESSION['type'] === 'admin') {
    //         header("Location: report3.php");
    //         exit();
    //     }
    // }
    // if (!isset($_SESSION['option'])) {
    //     // Check the session type
    //     if ($_SESSION['type'] === 'admin') {
    //         header("Location: report3.php");
    //         exit();
    //     }
    // }

    $semester = $_SESSION["semester"];
    $branch = $_SESSION["branch"];
    $year = $_SESSION["year"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "academic_records";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the query
    $query = "SELECT id, link, date, faculty_name, type, title FROM linksdata WHERE semester = ? AND year = ? AND branch = ? AND type = ? AND subject= ?";
    // $query = "SELECT id, link, date, faculty_name, type, title FROM linksdata WHERE semester = ? AND year = ? AND branch = ? AND subject= ?";

    // Prepare the statement
    $stmt = $conn->prepare($query);
    
    // Bind the session variables to the statement parameters
    $stmt->bind_param("sssss", $_SESSION['semester'], $_SESSION['year'], $_SESSION['branch'],  $_SESSION['option'],$_SESSION['subject']);
    // $stmt->bind_param("sssss", $_SESSION['semester'], $_SESSION['year'], $_SESSION['branch'], $_SESSION['subject']);

    // Execute the statement
    $stmt->execute();
    
    // Bind the result variables
    $stmt->bind_result($id, $link, $uploadDate, $facultyName, $type, $title);
    
    $counter = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lastpage_display2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>RECORDS</title>
</head>

<!-- <div class="arm" style="font-family: serif; font-size: 20px; padding-top:20px; padding-left:20px;"><div style="font-size: 65px;font-family: serif; margin-top:-16px; margin-right:-4px;">A</div>cademic Records<br> Management System</div> -->

<body>
<div class="container">
    <div class="table-container">
        <!-- <table class="table"> -->
        <table>
            <thead>
                <div class="gatewaytitle"><?php echo "".$_SESSION['subject']; ?>
        <br></div>
        <div class="tit">
        <?php echo "Semester ".$semester."-".$branch."-".$year; ?>
    </div>
                <tr>
                    <th class="the">Sr No.</th>
                    <th class="the">Title</th>
                    <?php if ($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'admin'): ?>
                        <th class="the">Upload Date</th>
                        <th class="the">Faculty Name</th>
                        <!-- <th class="the">Upload File</th> -->
                    <?php endif; ?>
                    <?php if ($_SESSION['type'] == 'admin'): ?>
                        <th class="the">Category</th>
                    <?php endif; ?>
                    <th class="the">View</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($stmt->fetch()) 
                    { 
                ?>
                    <tr>
                        <td data-label="Sr No."><?php echo $counter; ?></td>
                        <td><?php echo $title; ?></td>
                        <?php if ($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'admin'): ?>
                            <td data-label="Upload Date"><?php echo $uploadDate; ?></td>
                            <td data-label="Faculty Name"><?php echo $facultyName; ?></td>
                        <?php endif; ?>
                        <?php if ($_SESSION['type'] == 'admin'): ?>
                            <td data-label="Category"><?php echo $type; ?></td>
                        <?php endif; ?>
                        <td data-label="Link">
                            <a href="<?php echo $link; ?>" class="btn">Link</a>
                        </td>
                    </tr>
                <?php 
                    $counter++;
                    } 
                ?>
            </tbody>
        </table>
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
<script src="display2.js"></script>
</body>
</html>


<?php

    // Check if the form was submitted
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])){
        // Handle file upload logic
        if ($_SESSION['type'] == 'admin') {
            // Check if a file was uploaded
            if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
                // Specify the directory to save uploaded files
                $uploadDir = 'Academic_Records/linksdata/';
                $file_name = $_POST['file_name'];
                // Generate a unique file name
                $fileName = uniqid() . '_' . $_FILES['file_upload']['name'];
    
                // Move the uploaded file to the designated directory
                if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $uploadDir . $fileName)) {
                    // File upload successful, update the database or perform any other necessary actions
    
                    $link = $link = 'Academic_Records/linksdata/' . $fileName;
    $date = date('Y-m-d');
    if($_SESSION['type'] == 'admin')
    {
        $facultyName = 'Admin';
    }
    elseif($_SESSION['type'] === 'teacher')
    {
        $facultyName = $_SESSION['username'];
    }
    $subject = $_SESSION['subject'];
    $branch=$_SESSION['branch'];
    $option=$_SESSION['option'];
    $semester=$_SESSION['semester'];
    $year=$_SESSION['year'];
    
    
    
    $stmt = $conn->prepare("INSERT INTO linksdata (link, date, faculty_name, subject,branch,semester,type,year,title) VALUES (?, ?, ?, ?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss", $link, $date, $facultyName, $subject,$branch,$semester,$option,$year,$file_name);
    $stmt->execute();
    $stmt->close();
               echo "upload_success";
    
                   
                } else {
                    // Failed to move the uploaded file
                    echo "Error: Failed to move the uploaded file.";
                }
            } else {
                // No file uploaded or file upload error occurred
                echo "Error: Please select a file to upload.";
            }
        }
    
?><script>
  
    window.location.href = window.location.href;
  
</script>
<?php
}
?>

<?php
// Check if the delete button was clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Get the selected file to delete
    $selectedFile = $_POST['referrer'];

    if (!empty($selectedFile)) {
        // Delete the file from the database
        $stmt = $conn->prepare("DELETE FROM linksdata WHERE link = ?");
        $stmt->bind_param("s", $selectedFile);
        $stmt->execute();
        $stmt->close();

        // Delete the file from the file system
       $filePath = $selectedFile;

        if (file_exists($filePath)) {
            unlink($filePath);
            echo "File deleted successfully.";



        } else {
            echo "Error: File not found.";
        }
    }
?><script>
  
    window.location.href = window.location.href;
  
</script>
<?php
}
?>