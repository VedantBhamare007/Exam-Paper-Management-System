<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$branch = $_SESSION['branch'];
$role = $_SESSION['role'];
$fcname = $_SESSION['fcname'];
$coname = $_SESSION['coname'];
$cocode = $_SESSION['cocode'];

if (!$branch || !$role) {
    header("location:lg.php");
}


$branch = $_SESSION['branch'];
$role = $_SESSION['role'];

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
    $brnm = "Information Technology";
} elseif ($branch == "cm") {
    $brnm = "Computer Tchnology";
} elseif ($branch == "ce") {
    $brnm = "Civil Engineering";
} elseif ($branch == "me") {
    $brnm = "Mechanical Engineering";
} elseif ($branch == "mk") {
    $brnm = "Mechatronics Engineering";
} elseif ($branch == "ae") {
    $brnm = "utomobile Engineering";
} elseif ($branch == "pe") {
    $brnm = "Plastic Engineering";
} elseif ($branch == "idd") {
    $brnm = "Interior Dress & Decoration Engineering";
} elseif ($branch == "ddgm") {
    $brnm = "Dress Designing & Garment Manufacturing";
} elseif ($branch == "ee") {
    $brnm = "Electrical Engineering";
} elseif ($branch == "entc") {
    $brnm = "Electronics & Telecommunication Engineering";
}

if ($branch == "if" && $role == "Faculty") {
    $html = '<p class="h3">Information Technology - Faculty</p>';
} elseif ($branch == "cm" && $role == "Faculty") {
    $html = '<p class="h3">Computer Technology - Faculty</p>';
} elseif ($branch == "ce" && $role == "Faculty") {
    $html = '<p class="h3">Civil Engineering - Faculty</p>';
} elseif ($branch == "me" && $role == "Faculty") {
    $html = '<p class="h3">MEchanical Engineering - Faculty</p>';
} elseif ($branch == "mk" && $role == "Faculty") {
    $html = '<p class="h3">Mechatronics Engineering - Faculty</p>';
} elseif ($branch == "ae" && $role == "Faculty") {
    $html = '<p class="h3">Automobile Engineering - Faculty</p>';
} elseif ($branch == "pe" && $role == "Faculty") {
    $html = '<p class="h3">Plastic Engineering - Faculty</p>';
} elseif ($branch == "idd" && $role == "Faculty") {
    $html = '<p class="h3">Interior Design & Decoration Engineering - Faculty</p>';
} elseif ($branch == "ddgm" && $role == "Faculty") {
    $html = '<p class="h3">Dress Designing & Garment Manufacturing Engineering - Faculty</p>';
} elseif ($branch == "ee" && $role == "Faculty") {
    $html = '<p class="h3">Electrical Engineering - Faculty</p>';
} elseif ($branch == "entc" && $role == "Faculty") {
    $html = '<p class="h3">Electronics & Telecommunication Engineering - Faculty</p>';
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Faculty</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/faculty.css">
    <style>
    
        td#hnt{
            max-width: 15rem;
            word-wrap: break-word;
            /* text-align: justify; */
        }
    </style>

</head>

<body>

    <a href="lg.php" class="btn btn-outline-primary">Log Out</a>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="img/header.png" alt="Header" class="img-fluid">
        </div>
    </div>

    <?php echo $html; ?>
    <div class="mx-auto" style="width: 97%;">
        <table class="table table-striped">
            <thead class="table-header">
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Exam</th>
                    <th>Question Paper</th>
                    <th>Academic Year</th>
                    <th>Status</th>
                    <th>HOD-NOTES</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM $table_name WHERE faculty_name='$fcname'";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['coursename'] . "</td>";
                    echo "<td>" . $row['coursecode'] . "</td>";
                    if ($row['exam'] == 'pt1') {
                        echo "<td>" . "Periodic Test 1" . "</td>";
                    }
                    if ($row['exam'] == 'pt2') {
                        echo "<td>" . "Periodic Test 2" . "</td>";
                    }
                    if ($row['exam'] == 'final') {
                        echo "<td>" . "Final" . "</td>";
                    }
                    echo "<td> <a class='a1' href='uploads/" . $row["file_name"] . "'>" . $row["file_name"] . "</a></td>";
                    echo "<td>" . $row['acyear'] . "</td>";
                    echo "<td>" . $row['status1'] . "</td>";
                    echo "<td id='hnt'>" . $row['hod_notes'] . "</td>";
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<input type='hidden' name='file_name' value='" . $row['file_name'] . "'>";
                    echo "<input type='hidden' name='faculty_name' value='" . $row['faculty_name'] . "'>";
                    echo "<input type='hidden' name='file_path' value='" . $row['file_path'] . "'>";
                    echo "<input type='hidden' name='hod_notes' value='" . $row['hod_notes'] . "'>";
                    echo "<input type='hidden' name='exam' value='" . $row['exam'] . "'>";
                    echo "<input type='hidden' name='coursename' value='" . $row['coursename'] . "'>";
                    echo "<input type='hidden' name='coursecode' value='" . $row['coursecode'] . "'>";
                    echo "<button class='btn btn-primary' type='submit' name='delete'>Delete</button>";
                    echo "<button class='btn btn-primary' type='submit' name='reupload'>Reupload</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
    </div>
    <button type='submit' class="btup btn btn-primary" name='upload' onclick="redirectTo('IFUpload.php')">Upload a new Question Paper</button>

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

if (isset($_POST['delete'])) {
    $i = -1;
    do {
        $id = $_POST['id'];
        $file_name = $_POST['file_name'];
        $file_path = $_POST['file_path'];
        $faculty_name = $_POST['faculty_name'];
        $coursename = $_POST['coursename'];
        $coursecode = $_POST['coursecode'];
        $exam = $_POST['exam'];
        $status1 = 'Approved';

        $sql = "SELECT * FROM exam WHERE file_name = '$file_name' AND status1='$status1' AND faculty_name = '$faculty_name' AND file_path = '$file_path' AND coursename = '$coursename' AND coursecode = '$coursecode' AND exam = '$exam' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $message = 'File can not be deleted because it is already approved by HOD';
            echo "<script>showAlert('$message');</script>";
        } else {
            $id = $_POST['id'];
            $sql = "DELETE FROM $table_name WHERE id = $id";
            if (mysqli_query($conn, $sql)) {
                $message = 'File has been deleted successfully';
                echo "<script>showAlert('$message');</script>";
                break;
            } else {
                $message = 'Error Deleting record : ' . mysqli_error($conn);
                echo "<script>showAlert('$message');</script>";
            }
        }
    } while ($i == 0);
}

if (isset($_POST['reupload'])) {
    $id = $_POST['id'];
    $file_name = $_POST['file_name'];
    $file_path = $_POST['file_path'];
    $faculty_name = $_POST['faculty_name'];
    $coursename = $_POST['coursename'];
    $coursecode = $_POST['coursecode'];
    $exam = $_POST['exam'];
    $status1 = 'Approved';

    $sql = "SELECT * FROM exam WHERE file_name = '$file_name' AND status1='$status1' AND faculty_name = '$faculty_name' AND file_path = '$file_path' AND coursename = '$coursename' AND coursecode = '$coursecode' AND exam = '$exam' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $message = 'File can not be reuploaded because it is already approved by HOD';
        echo "<script>showAlert('$message');</script>";
    } else {


        $id = $_POST['id'];
        echo '<div class="container">';
        echo '<div class="row justify-content-center mt-4">';
        echo '<div class="col-sm-12 col-md-8 col-lg-6 col-xl-5 form-container">';
        echo '<h3>Reupload Your Question Paper</h3>';

        echo '<div class="mx-auto" style="width: 97%;">';
        echo '<form method="post" enctype="multipart/form-data">';

        echo "<input type='hidden' name='id' value='" . $id . "'>";
        echo '<div class="input-group mb-3">';
        echo '<label class="input-group-text btn btn-primary" for="inputGroupFile02">Choose File</label>';
        echo '<input type="file" class="form-control" name="pdf_file" id="inputGroupFile02" required>';
        echo '</div>';

        echo '<button type="submit" class="btn upbt btn-primary" name="newupload">Upload PDF file</button>';
        echo '</form>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

if (isset($_POST['newupload'])) {
    $i = -1;
    do {
        $id = $_POST['id'];
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $file_size = $_FILES['pdf_file']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $upload_dir = "uploads/";
        $file_path = $upload_dir . $file_name;

        $sql = "UPDATE $table_name SET file_name = '$file_name', file_path = '$file_path', status1='-', hod_notes='-' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            $message = 'File has been reuploaded successfully';
            echo "<script>showAlert('$message');</script>";
            break;
        } else {
            $message = 'Error reuploading file : ' . mysqli_error($conn);
            echo "<script>showAlert('$message');</script>";
        }
    } while ($i == 0);

}

mysqli_close($conn);
?>
<script>
function redirectTo(url) {
  window.location.href = url;
}
</script>