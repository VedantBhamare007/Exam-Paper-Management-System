<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$branch = $_SESSION['branch'];
$role = $_SESSION['role'];
if (!$branch || !$role) {
    header("location:lg.php");
}

$branch = $_SESSION['branch'];
$table_name;
if ($branch == "if") {
    $table_name = "if_uploaded_files";
} elseif ($branch == "cm") {
    $table_name = "cm_uploaded_files";
} elseif ($branch == "ce") {
    $table_name = "ce_uploaded_files";
} elseif ($branch == "me") {
    $table_name = "me_uploaded_files";
} elseif ($branch == "mk") {
    $table_name = "mk_uploaded_files";
} elseif ($branch == "ae") {
    $table_name = "ae_uploaded_files";
} elseif ($branch == "pe") {
    $table_name = "pe_uploaded_files";
} elseif ($branch == "idd") {
    $table_name = "idd_uploaded_files";
} elseif ($branch == "ddgm") {
    $table_name = "ddgm_uploaded_files";
} elseif ($branch == "ee") {
    $table_name = "ee_uploaded_files";
} elseif ($branch == "entc") {
    $table_name = "entc_uploaded_files";
}

if ($branch == "if") {
    $html = '<p class="h3">Information Technology - Faculty</p>';
} elseif ($branch == "cm") {
    $html = '<p class="h3">Computer Technology - Faculty</p>';
} elseif ($branch == "ce") {
    $html = '<p class="h3">Civil Engineering - Faculty</p>';
} elseif ($branch == "me") {
    $html = '<p class="h3">MEchanical Engineering - Faculty</p>';
} elseif ($branch == "mk") {
    $html = '<p class="h3">Mechatronics Engineering - Faculty</p>';
} elseif ($branch == "ae") {
    $html = '<p class="h3">Automobile Engineering - Faculty</p>';
} elseif ($branch == "pe") {
    $html = '<p class="h3">Plastic Engineering - Faculty</p>';
} elseif ($branch == "idd") {
    $html = '<p class="h3">Interior Design & Decoration Engineering - Faculty</p>';
} elseif ($branch == "ddgm") {
    $html = '<p class="h3">Dress Designing & Garment Manufacturing Engineering - Faculty</p>';
} elseif ($branch == "ee") {
    $html = '<p class="h3">Electrical Engineering - Faculty</p>';
} elseif ($branch == "entc") {
    $html = '<p class="h3">Electronics & Telecommunication Engineering - Faculty</p>';
}
?>

<head>
    <title>Course List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/upd.css">
</head>

<body>

    <a href="lg.php" class="btn btn-outline-primary">Log Out</a>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="img/header.png" alt="Header" class="img-fluid">
        </div>
    </div>
    <?php echo $html; ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-sm-12 col-md-8 col-lg-6 col-xl-5 form-container">
                <h2>Upload Your Question Paper</h2>

                <div class="mx-auto" style="width: 97%;">
                    <form method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="acyear">Academic Year</label>
                            <input type="text"  placeholder="YYYY-YY" pattern="\d{4}-\d{2}" class="form-control" name="acyear" id="acyear" required>
                        </div>

                        <div class="form-group">
                            <label>Select Exam</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="pt1" name="exam" value="pt1" required>
                                <label class="form-check-label" for="pt1">Periodic Test 1</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="pt2" name="exam" value="pt2">
                                <label class="form-check-label" for="pt2">Periodic Test 2</label>
                            </div>

                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text btn btn-primary" for="inputGroupFile02">Choose File</label>
                            <input type="file" class="form-control" name="pdf_file" id="inputGroupFile02" required>
                        </div>

                        <button type="submit" class="btn upbt btn-primary" name="upload">Upload PDF file</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<?php

echo "<script>
function showAlert(message) {
    var modal = document.createElement('div');
    modal.style.position = 'fixed';
    modal.style.top = '0';
    modal.style.right = '0';
    modal.style.bottom = '0';
    modal.style.left = '0';
    modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
    modal.style.display = 'flex';
    modal.style.alignItems = 'center';
    modal.style.justifyContent = 'center';
    
    var messageBox = document.createElement('div');
    messageBox.style.backgroundColor = '#80dfff';
    messageBox.style.padding = '20px';
    messageBox.style.borderRadius = '10px';
    messageBox.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
    messageBox.style.fontSize = '18px';
    messageBox.style.maxWidth = '50%';
    messageBox.textContent = message;
    
    var closeButton = document.createElement('button');
    closeButton.textContent = 'Close';
    closeButton.style.cursor = 'pointer';
    closeButton.className = 'btn btnmsg btn-primary';

    closeButton.addEventListener('click', function() {
        modal.parentNode.removeChild(modal);
        window.location.href = 'if_faculty.php';
    });

    closeButton.style.marginLeft = '12px'; // Add margin-top here
        
    messageBox.appendChild(closeButton);
    modal.appendChild(messageBox);
    document.body.appendChild(modal);
}

</script>";


if (isset($_POST['upload'])) {
    $i = -1;
    do {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $file_size = $_FILES['pdf_file']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Only allow PDF files to be uploaded
        /*$allowed_ext = array("pdf");
        if(in_array($file_ext, $allowed_ext) === false){
        die("Error: Only PDF files are allowed to be uploaded.");
        }*/

        $upload_dir = "uploads/";
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            $faculty_name = $_SESSION['fcname'];
            $coursename = $_SESSION['coname'];
            $coursecode = $_SESSION['cocode'];
            $acyear = $_POST['acyear'];
            $exam = $_POST['exam'];
            $status1 = "-";
            $hod_notes = "-";

            $sql = "INSERT INTO $table_name (file_name, file_path, faculty_name, status1, hod_notes, coursename, coursecode, acyear, exam) VALUES ('$file_name', '$file_path', '$faculty_name', '$status1', '$hod_notes', '$coursename', '$coursecode', '$acyear', '$exam')";

            if (mysqli_query($conn, $sql)) {
                $message = 'File has been uploaded successfully';
                echo "<script>showAlert('$message');</script>";
                break;
            } else {
                $message = 'Error inserting file into a adatabase : ' . mysqli_error($conn);
                echo "<script>showAlert('$message');</script>";
            }
        } else {
            $message = 'Error uploading a file : ' . mysqli_error($conn);
            echo "<script>showAlert('$message');</script>";
        }
    } while ($i > 1);
}

?>
<script>
    function printPDF(filepath) {
        var pdfWindow = window.open(filepath, "_blank");
        pdfWindow.print();
    }

</script>