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