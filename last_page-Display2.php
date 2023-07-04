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
                        <th class="the">Faculty Name</th> <?php endif; ?>
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
   				 <?php endif; ?>
   		 <td data-label="Link">
       		 <a href="<?php echo $link; ?>" class="btn">
           			 Link
       				 </a>
   				 </td>
			</tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>