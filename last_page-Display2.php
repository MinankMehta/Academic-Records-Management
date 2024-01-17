
<?php
    session_start();

		$serial=1;
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
	
	if (!isset($_SESSION['option'])) {
        // Check the session type
        if ($_SESSION['type'] === 'student') {
            header("Location: student.php");
            exit();
        } elseif ($_SESSION['type'] === 'teacher' || $_SESSION['type'] === 'admin') {
            header("Location: teacher.php");
            exit();
        }
    }

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
    $query = "SELECT id, link, date, faculty_name,title FROM linksdata WHERE semester = ? AND year = ? AND branch = ? AND type = ? AND subject= ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($query);
    
    // Bind the session variables to the statement parameters
    $stmt->bind_param("sssss", $_SESSION['semester'], $_SESSION['year'], $_SESSION['branch'],  $_SESSION['option'],$_SESSION['subject']);
    
    // Execute the statement
    $stmt->execute();
    
    // Bind the result variables
    $stmt->bind_result($id, $link, $uploadDate, $facultyName,$title);
    
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
                            <!-- <td data-label="Upload File">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="link_id" value="<?php echo $serialNumber; ?>">
                                    <input type="file" name="file_upload" accept=".pdf,.doc,.docx">
                                    <button type="submit" class="btn">Upload</button>
                                </form>
                            </td> -->
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

<?php if ($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'admin'): ?>
<div class="upload-delete-container">
    <div class="upload">
        <button type="button" class="collapsible">UPLOAD FILES</button>
        <div class="content">
            <form method="POST" class="form" enctype="multipart/form-data">
                <input type="text" placeholder="Enter File Name" name="file_name">
                <input type="hidden" name="link_id" value="<?php echo $serialNumber; ?>">
                <input type="file" class="choosefile" name="file_upload" accept=".pdf,.doc,.docx">
                <button type="submit" class="btn2" name="upload">Upload</button>
            </form>
        </div>
    </div>

    
    <div class="delete">
        <button type="button" class="collapsible2">DELETE FILES</button>
        <div class="content2">
            <form method="POST" class="form" enctype="application/x-www-form-urlencoded">
                <label for="referrer" id="label">Select the file you want to delete
                    <select id="referrer" name="referrer">
                        <option value="">Select one</option>
                        <?php
                        if($_SESSION['type'] == 'teacher')
                        {
                        // Retrieve files based on faculty name, year, subject, etc.
                            $facultyName = $_SESSION['username'];
                            $year = $_SESSION['year'];
                            $semester = $_SESSION['semester'];
                            $branch = $_SESSION['branch'];
                            $subject = $_SESSION['subject'];
                            $type= $_SESSION['type'];

                            $stmt = $conn->prepare("SELECT title FROM linksdata WHERE faculty_name = ? AND year = ? AND semester = ? AND branch = ? AND subject = ?");
                            $stmt->bind_param("sssss", $facultyName, $year, $semester, $branch, $subject);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Generate options based on the retrieved files
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                echo "<option value='$link'>$title</option>";
                            }
                        }
                        elseif($_SESSION['type'] == 'admin')
                        {
                            $year = $_SESSION['year'];
                            $semester = $_SESSION['semester'];
                            $branch = $_SESSION['branch'];
                            $subject = $_SESSION['subject'];
                            $type= $_SESSION['type'];
                            $stmt = $conn->prepare("SELECT title FROM linksdata WHERE year = ? AND semester = ? AND branch = ? AND subject = ?");
                            $stmt->bind_param("ssss", $year, $semester, $branch, $subject);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Generate options based on the retrieved files
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                echo "<option value='$link'>$title</option>";
                            }
                        }

                        $stmt->close();
                        ?>
                    </select>
                    <button type="submit" class="btn2" name="delete">Delete</button>
                </label>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

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
    if ($_SESSION['type'] === 'teacher' || $_SESSION['type'] == 'admin') {
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