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

if ($branch == "if" && $role == "HOD") {
    $html = '<p class="h3">Information Technology - HOD</p>';
} elseif ($branch == "cm" && $role == "HOD") {
    $html = '<p class="h3">Computer Technology - HOD</p>';
} elseif ($branch == "ce" && $role == "HOD") {
    $html = '<p class="h3">Civil Engineering - HOD</p>';
} elseif ($branch == "me" && $role == "HOD") {
    $html = '<p class="h3">MEchanical Engineering - HOD</p>';
} elseif ($branch == "mk" && $role == "HOD") {
    $html = '<p class="h3">Mechatronics Engineering - HOD</p>';
} elseif ($branch == "ae" && $role == "HOD") {
    $html = '<p class="h3">Automobile Engineering - HOD</p>';
} elseif ($branch == "pe" && $role == "HOD") {
    $html = '<p class="h3">Plastic Engineering - HOD</p>';
} elseif ($branch == "idd" && $role == "HOD") {
    $html = '<p class="h3">Interior Design & Decoration Engineering - HOD</p>';
} elseif ($branch == "ddgm" && $role == "HOD") {
    $html = '<p class="h3">Dress Designing & Garment Manufacturing Engineering - HOD</p>';
} elseif ($branch == "ee" && $role == "HOD") {
    $html = '<p class="h3">Electrical Engineering - HOD</p>';
} elseif ($branch == "entc" && $role == "HOD") {
    $html = '<p class="h3">Electronics & Telecommunication Engineering - HOD</p>';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>HOD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<body>

    <a href="lg.php" class="btn btn-outline-primary">Log Out</a>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="img/header.png" alt="Header" class="img-fluid">
        </div>
    </div>
    <?php echo $html; ?>
    <div class="facupdate">
        <button class="btn btn-primary" onclick="location.href='hodupd.php'">Update HOD Information</button>
        <button class="btn btn-primary" onclick="location.href='regnew.php'">Register New Faculty</button>
        <button class="btn btn-primary" onclick="location.href='if_facupdate.php'">Update Faculty Login
            Credentials</button>
        <button class="btn btn-primary" onclick="location.href='delt.php'">Delete Faculty Login Credentials</button>
    </div>

    <div class="mx-auto" style="width: 97%;">
        <table class="table table-striped">
            <thead class="table-header">
                <tr>
                    <th>Faculty Name</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Exam</th>
                    <th>Question Paper</th>
                    <th>Academic Year</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM $table_name";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['faculty_name'] . "</td>";
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
                    echo "<input type='hidden' name='acyear' value='" . $row['acyear'] . "'>";
                    echo "<button class='btn btn-primary' type='submit' name='approve' class='btn'>Approve</button>";
                    echo "<button class='btn btn-primary' type='submit' name='disapprove' class='btn'>Disapprove</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
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
        window.location.href = 'if_hod.php';
    });

    closeButton.style.marginLeft = '12px'; // Add margin-top here
        
    messageBox.appendChild(closeButton);
    modal.appendChild(messageBox);
    document.body.appendChild(modal);
}
</script>";


if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $sql = "SELECT status1 FROM $table_name WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $field_value;
    if ($result) {
        $row = mysqli_fetch_array($result);
        $field_value = $row['status1'];
    } else {
    
    }
    if ($field_value == "Disapproved") {
        $sql = "UPDATE $table_name SET hod_notes='-' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {

        } else {
            $message = 'Error updating hod notes when hod approves file after once he disapproves with reason : ' . mysqli_error($conn);
            echo "<script>showAlert('$message');</script>";
        }
    }
    if ($field_value == "Approved") {
            $message = 'File has been previously approved' . mysqli_error($conn);
            echo "<script>showAlert('$message');</script>";
        
    }

    $i = -1;
    do {
        $id = $_POST['id'];
        $file_name = $_POST['file_name'];
        $faculty_name = $_POST['faculty_name'];
        $file_path = $_POST['file_path'];
        $exam = $_POST['exam'];
        $coursename = $_POST['coursename'];
        $coursecode = $_POST['coursecode'];
        $acyear = $_POST['acyear'];
        $hod_notes = $_POST['hod_notes'];
        $status1 = 'Approved';

        $branch = $_SESSION['branch'];
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

        $sql = "SELECT * FROM exam WHERE file_name = '$file_name' AND faculty_name = '$faculty_name' AND file_path = '$file_path' AND status1 = '$status1' AND hod_notes = '$hod_notes' AND coursename = '$coursename' AND coursecode = '$coursecode' AND exam = '$exam' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $message = 'File has been previously approved';
            echo "<script>showAlert('$message');</script>";
            break;
        } else {

            $sql1 = "UPDATE $table_name SET status1='Approved' WHERE id=$id";
            $sql2 = "INSERT INTO exam (file_name, faculty_name, branch, file_path, status1, hod_notes, coursename, coursecode, acyear, exam) VALUES('$file_name', '$faculty_name','$brnm', '$file_path', '$status1','$hod_notes', '$coursename', '$coursecode', '$acyear', '$exam')";
            $sql = $sql1 . ";" . $sql2;
            $i = 1;
            if (mysqli_multi_query($conn, $sql)) {
                $message = 'File has been approved';
                echo "<script>showAlert('$message');</script>";
                break;
            } else {
                $message = 'Error Approving record' . mysqli_error($conn);
                echo "<script>showAlert('$message');</script>";
            }
        }

    } while ($i > 1);

} elseif (isset($_POST['disapprove'])) {
    $id = $_POST['id'];
    $file_name = $_POST['file_name'];
    $faculty_name = $_POST['faculty_name'];
    $file_path = $_POST['file_path'];
    $exam = $_POST['exam'];
    $coursename = $_POST['coursename'];
    $coursecode = $_POST['coursecode'];
    $acyear = $_POST['acyear'];
    $status1 = 'Dispproved';

    $sql = "SELECT file_name FROM $table_name WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $fn = $row['file_name'];
            $sql = "DELETE FROM exam WHERE file_name='$fn'";
            if (mysqli_query($conn, $sql)) {

            } else {
                $message = 'Error Disapproving record - Can not delete a record from exam database : ' . mysqli_error($conn);
                echo "<script>showAlert('$message');</script>";
            }
        }
    } else {
        echo "No results found for ID $id.";
    }

    $sql = "INSERT INTO disapprove (file_name, faculty_name, file_path, status1, coursename, coursecode, acyear, exam) VALUES ('$file_name', '$faculty_name', '$file_path', '$status1', '$coursename', '$coursecode', '$acyear', '$exam')";
    if (mysqli_query($conn, $sql)) {
    } else {
        $message = 'Error Inserting record - Can not delete a record from exam database : ' . mysqli_error($conn);
        echo "<script>showAlert('$message');</script>";
    }
    $sql = "UPDATE $table_name SET status1='Disapproved' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
    } else {
        $message = 'Error updating record status - Can not delete a record from exam database : ' . mysqli_error($conn);
        echo "<script>showAlert('$message');</script>";
    }

    echo '<div class="container">';
    echo '<div class="row justify-content-center mt-4">';
    echo '<div class="rsnbox col-sm-12 col-md-8 col-lg-6 col-xl-5 form-container">';
    echo '<form method="post">';

    echo "<input type='hidden' name='id' value='" . $id . "'>";
    echo "<input type='hidden' name='file_name' value='" . $file_name . "'>";

    echo "<div class='form-group'>";
    echo "<label for='hodn'>Reason for Disapproval:</label>";
    echo "<textarea class='form-control' name='hodn' id='hodn' placeholder='Please enter reason for disapproval' required></textarea>";
    echo "</div>";
    echo "<button class='btn btn-primary' type='submit' name='disapprove_submit'>Submit</button>";

    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}
if (isset($_POST['disapprove_submit'])) {
    $id = $_POST['id'];
    $hod_notes1 = $_POST['hodn'];
    $sql = "UPDATE $table_name SET hod_notes='$hod_notes1' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
    } else {
        $message = 'Error seting hod_notes for the record ' . mysqli_error($conn);
        echo "<script>showAlert('$message');</script>";
    }

    $file_name;
    $sql = "SELECT file_name FROM $table_name WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $fn = $row['file_name'];
            $sql = "UPDATE disapprove SET hod_notes='$hod_notes1' WHERE file_name='$fn'";
            if (mysqli_query($conn, $sql)) {
                $message = 'File has been disapproved successfully';
                echo "<script>showAlert('$message');</script>";

            } else {
                $message = 'Error Disapproving record : Updating hod-notes in disapprove database ' . mysqli_error($conn);
                echo "<script>showAlert('$message');</script>";
            }
        }
    } else {
        echo "No results found for ID $id.";
    }

}

mysqli_close($conn);

?>