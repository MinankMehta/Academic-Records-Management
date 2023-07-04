<?php
    session_start();

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
    $query = "SELECT id, link, date, faculty_name FROM linksdata WHERE semester = ? AND year = ? AND branch = ? AND type = ? AND subject= ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($query);
    
    // Bind the session variables to the statement parameters
    $stmt->bind_param("sssss", $_SESSION['semester'], $_SESSION['year'], $_SESSION['branch'],  $_SESSION['option'],$_SESSION['subject'] );
    
    // Execute the statement
    $stmt->execute();
    
    // Bind the result variables
    $stmt->bind_result($serialNumber, $link, $uploadDate, $facultyName);
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
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        
        .table-container {
            margin-top: 20px;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .the {
            font-weight: bold;
            background-color: #f1f1f1;
        }
        
        .table td,
        .table th {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
    </style>
</head>
<body>
   <div class="container">
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th class="the">Sr No.</th>
                    <?php if ($_SESSION['type'] == 'teacher'): ?>
                        <th class="the">Upload Date</th>
                        <th class="the">Faculty Name</th>
                        <th class="the">Upload File</th>
                    <?php endif; ?>
                    <th class="the">Link</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($stmt->fetch()) { ?>
                    <tr>
                        <td data-label="Sr No."><?php echo $serialNumber; ?></td>
                        <?php if ($_SESSION['type'] == 'teacher'): ?>
                            <td data-label="Upload Date"><?php echo $uploadDate; ?></td>
                            <td data-label="Faculty Name"><?php echo $facultyName; ?></td>
                            <td data-label="Upload File">
                                <form method="POST" >
                                    <input type="hidden" name="link_id" value="<?php echo $serialNumber; ?>">
                                    <input type="file" name="file_upload" accept=".pdf,.doc,.docx">
                                    <button type="submit" class="btn">Upload</button>
                                </form>
                            </td>
                        <?php endif; ?>
                        <td data-label="Link">
                            <a href="<?php echo $link; ?>" class="btn">Link</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>


<?php

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        

        // Handle file upload logic
        if ($_SESSION['type'] === 'teacher') {
            // Check if a file was uploaded
            if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
                // Specify the directory to save uploaded files
                $uploadDir = 'uploads/';

                // Generate a unique file name
                $fileName = uniqid() . '_' . $_FILES['file_upload']['name'];

                // Move the uploaded file to the designated directory
                if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $uploadDir . $fileName)) {
                    // File upload successful, update the database or perform any other necessary actions

                    // Example: Store the file information in the linksdata table
                    $stmt = $conn->prepare("INSERT INTO linksdata (link, date, faculty_name, subject) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $fileName, date('Y-m-d'), $_SESSION['username'], $_SESSION['subject']);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
    }
?>