<?php
session_start();
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || $_SESSION['type'] === 'student' || $_SESSION['type'] === 'teacher' || $_SESSION['type'] === 'Teacher' || $_SESSION['type'] === 'Student') {
      header("Location: login.php"); 
      exit();
  }
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$Branch = "";
$database = "academic_records";  

// Create a connection
$conn = mysqli_connect($servername, $username, $Branch, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `subjectdata` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST["snoEdit"])){
  // Update the record
    $sno = $_POST["snoEdit"];
    $Semester = $_POST["titleEdit"];
    $Branch = $_POST["descriptionEdit"];
    $Year = $_POST["name1Edit"];
    $Subject = $_POST["type1Edit"];

  // Sql query to be executed
  $sql = "UPDATE `subjectdata` SET `Semester` = '$Semester', `Branch` = '$Branch', `Subject` = '$Subject' , `Year` = '$Year'  WHERE `subjectdata`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
    $Semester = $_POST["title"];
    $Branch = $_POST["description"];
    $Subject = $_POST["name1"];
    $Year = $_POST["type1"];

  // Sql query to be executed
  $sql = "INSERT INTO `subjectdata` (`Semester`, `Branch`, `Subject`, `Year`) VALUES ('$Semester', '$Branch', '$Subject', '$Year')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!--style.css-->
  <link rel="stylesheet" href="sty.css">
  <!--fontawesome - for 5 social media icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>


  <title>Syllabus Updates</title>
  <style>

@import url('https://fonts.googleapis.com/css2?family=Marcellus&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap'); 

                                                    /*basic.html*/
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: 'Fira Sans', sans-serif;
    font-weight: 2000; 
}


footer{
    position:fixed;
    bottom:0px;
    width:100%;
}

.logo{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 2px;
}


.logo .logo1{
    width:250px;
}

.logo .logo2{
    width:100px;
}

.footer1{
    background: #ed1c24;
    width:80%;
    color: #ed1c24;
}

.footer2{
    display:flex;
    justify-content: center;
    color: #ffffff;
    background: #b7202e;
}

.footer2 .social{
    margin: 10px 0 10px 0;
    color:#ffffff;
}

.footer2 .social a{
    padding: 0 2px; 
}

.footer2 .social a span{
    height: 40px;
    width: 40px;
    /* background: #58595b; */
    line-height: 40px;
    text-align:center;
    font-size: 20px;
    border-radius: 5px;
    color:#ffffff;
    transition: 0.3s;
    
}

.footer2 .social a span:hover{
    background:#58595b;
}

.uuflex .logo{
  display: flex;
}

.uuhd{
    font-family: 'Marcellus';
    font-size:40px;
    display: flex;
    justify-content: center;
    margin-top: 7px;
    font-style: bold;
    text-align:center;
}

.notetitle,.notedesc{
    font-family: 'Marcellus';
    font-size:22px;
    display: flex;
    margin-top: 5px;
    font-style: bold;
}

.addnotebtn{
    display: flex;
    justify-content: center;
    text-align: center;
    cursor:pointer;
    background-color:#b7202e;
    padding:5px 5px;
    margin:8px;
    /* margin-left: 46%;
    margin-right: auto; */
    border-color: red;
    border-radius: 10px;
    height:40px;
    width:120px;
    font-family: 'Fira Sans';
    font-size: 20px;
    color:white;
}

.tblcontent{
  font-family: 'Fira Sans', sans-serif;
  font-weight: 2000; 
}

.editbtn,.delbtn{
  text-align: center;
  cursor:pointer;
  color:white;
  background-color:#b7202e;
  padding:10px 10px;
  margin:auto;
  border-color: red;
  font-family: 'Fira Sans';
  font-size: 15px;
}

textarea{
  height:auto;
}

</style>

</head>


<body class="img">
 

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Syllabus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="syllabusupdate.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Semester</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc" class="notedesc">Branch</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"rows="1" ></textarea>
            </div> 
            <div class="form-group">
              <label for="desc" class="notedesc">Subject</label>
              <textarea class="form-control" id="name1Edit" name="name1Edit" rows="1" ></textarea>
            </div> 
            <div class="form-group">
              <label for="desc" class="notedesc">Year</label>
              <textarea class="form-control" id="type1Edit" name="type1Edit" rows="1" ></textarea>
            </div> 
            
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your subject has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your subject has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your subject has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <div class="container uuflex my-4">
    <div class="logo"><!--2 clg logos-->
        <img src="svu_kjsce.jpg" alt="SVU-KJSCE" class="logo1">
        <h2 class="uuhd">Syllabus Updates</h2>
        <img src="somaiya_trust.png" alt="Somaiya-trust" class="logo2">
    </div>
    <br>
    <form action="syllabusupdate.php" method="POST">
      <div class="form-group">
        <label for="title" class="notetitle">Semester</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="desc" class="notedesc">Branch</label>
        <textarea class="form-control" id="description" name="description" rows="1"></textarea>
      </div>

      <div class="form-group">
        <label for="title" class="notetitle">Subject</label>
        <input type="text" class="form-control" id="name1" name="name1">
      </div>

      <div class="form-group">
        <label for="title" class="notetitle">Year</label>
        <input type="text" class="form-control" id="type1" name="type1">
      </div>
      <button type="submit" class="btn addnotebtn">Add Data</button>
    </form>
  </div>

  <div class="container my-4">

    <table class="table tblcontent" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Semester</th>
          <th scope="col">Branch</th>
          <th scope="col">Subject</th>
          <th scope="col">Year</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `subjectdata`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['Semester'] . "</td>
            <td>". $row['Branch'] . "</td>
            <td>". $row['Subject'] . "</td>
            <td>". $row['Year'] . "</td>
            <td><button class='edit btn btn-sm btn-primary editbtn' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary delbtn' id=d".$row['sno'].">Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <br><br>
    
    
    <footer>
        
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

    <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        type = tr.getElementsByTagName("td")[2].innerText;
        console.log(title, description, type);
        titleEdit.value = title;
        descriptionEdit.value = description;
        type1Edit.value = type;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this data?")) {
          console.log("yes");
          window.location = `syllabusupdate.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>
