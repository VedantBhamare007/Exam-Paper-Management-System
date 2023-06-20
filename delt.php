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
$fcname = $_SESSION['fcname'];
$coname = $_SESSION['coname'];
$cocode = $_SESSION['cocode'];

if (!$branch || !$role) {
    header("location:lg.php");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/table.css">
    <title>Delete Faculty</title>
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
                    <th>Faculty Name</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM users WHERE branch='$branch' AND role='Faculty'";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['fcname'] . "</td>";
                    echo "<td>" . $row['coname'] . "</td>";
                    echo "<td>" . $row['cocode'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='fcname' value='" . $row['fcname'] . "'>";
                    echo "<input type='hidden' name='cocode' value='" . $row['coname'] . "'>";
                    echo "<input type='hidden' name='coname' value='" . $row['cocode'] . "'>";
                    echo "<input type='hidden' name='email' value='" . $row['email'] . "'>";
                    echo "<button class='btn btn-primary' type='submit' name='delete'>Delete</button>";
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
        window.location.href = 'delt.php';
    });

    closeButton.style.marginLeft = '12px'; // Add margin-top here
        
    messageBox.appendChild(closeButton);
    modal.appendChild(messageBox);
    document.body.appendChild(modal);
}
</script>";


if (isset($_POST['delete'])) {

    $fcname = $_POST['fcname'];
    $coname = $_POST['coname'];
    $cocode = $_POST['cocode'];
    $email = $_POST['email'];
    $role1 = "Faculty";
    $branch = $_SESSION['branch'];

    $sql = "SELECT * FROM users WHERE email='$email' AND branch='$branch' AND role='$role1'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        if ($row["branch"] == $branch) {
            $sql = "DELETE FROM users WHERE email='$email' AND branch='$branch'AND role='$role1'";
            if (mysqli_query($conn, $sql)) {
                $message = 'Faculty Login credentials has been deleted successfully';
                echo "<script>showAlert('$message');</script>";
            } else {
                $message = 'Error Deleting Faculty Login Credentials : ' . mysqli_error($conn);
                echo "<script>showAlert('$message');</script>";
            }
        } else {
            $message = 'No Faculty Login Credentials Found';
            echo "<script>showAlert('$message');</script>";
        }
        exit();
    }
    $message = 'No Faculty Login Credentials Found';
    echo "<script>showAlert('$message');</script>";
}

mysqli_close($conn);

?>