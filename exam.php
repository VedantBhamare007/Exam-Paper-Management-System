<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_system";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$role = $_SESSION['role'];
if (!$role) {
    header("location:lg.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Examination Cell</title>
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

    <p class="h3">Examination Cell</p>
    <div class="mx-auto" style="width: 97%;">
        <table class="table table-striped">
            <thead class="table-header">
                <tr>
                    <th>Faculty Name</th>
                    <th>Branch</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Exam</th>
                    <th>Question Paper</th>
                    <th>Academic Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM exam";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['faculty_name'] . "</td>";
                    echo "<td>" . $row['branch'] . "</td>";
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

                    echo '<td><button class="btn btn-primary" onclick="printPDF(\'' . $row['file_path'] . '\')">Print</button></td>';
                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
    </div>
</body>

</html>


<script>
    function printPDF(filepath) {
        var pdfWindow = window.open(filepath, "_blank");
        pdfWindow.print();
    }
</script>