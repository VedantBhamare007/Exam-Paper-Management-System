<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/newform.css">
    <title>Registration Form</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="img/header.png" alt="Header" class="img-fluid">
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-sm-12 col-md-8 col-lg-6 col-xl-5 form-container">
                <h2>Registration</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="fcname">Name</label>
                        <input type="text" class="form-control" id="fcname" name="fcname">
                    </div>
                    <div class="form-group">
                        <label for="coname">Course Name</label>
                        <input type="text" class="form-control" id="coname" name="coname">
                    </div>
                    <div class="form-group">
                        <label for="cocode">Course Code</label>
                        <input type="text" class="form-control" id="cocode" name="cocode">
                    </div>
                    <div class="form-group">
                        <label for="login_email">Email:</label>
                        <input type="email" class="form-control" id="login_email" name="register_email">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password:</label>
                        <input type="password" class="form-control" id="login_password" name="register_password">
                    </div>

                    <label class="l1">Select your role:</label><br>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="faculty" name="role" value="Faculty" class="custom-control-input"
                            required>
                        <label class="custom-control-label" for="faculty">Faculty</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="hod" name="role" value="HOD" class="custom-control-input">
                        <label class="custom-control-label" for="hod">HOD</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="examcell" name="role" value="Examination Cell"
                            class="custom-control-input">
                        <label class="custom-control-label" for="examcell">Examination Cell</label>
                    </div>

                    <label class="l1">Select your Branch :</label><br>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="if" name="branch" value="if" class="custom-control-input">
                        <label class="custom-control-label" for="if">Information Technology</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="cm" name="branch" value="cm" class="custom-control-input">
                        <label class="custom-control-label" for="cm">Computer Technology</label>
                    </div>


                    <div class="custom-control custom-radio">
                        <input type="radio" id="me" name="branch" value="me" class="custom-control-input">
                        <label class="custom-control-label" for="me">Mechanical Engineering</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="ce" name="branch" value="ce" class="custom-control-input">
                        <label class="custom-control-label" for="ce">Civil Engineering</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Default radio
                        </label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="ee" name="branch" value="ee" class="custom-control-input">
                        <label class="custom-control-label" for="ee">Electrical Engineering</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="mk" name="branch" value="mk" class="custom-control-input">
                        <label class="custom-control-label" for="mk">Mechatronics Engineering</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="entc" name="branch" value="entc" class="custom-control-input">
                        <label class="custom-control-label" for="entc">Electronics & Telecommunication</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="ae" name="branch" value="ae" class="custom-control-input">
                        <label class="custom-control-label" for="ae">Automobile Engineering</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="pe" name="branch" value="pe" class="custom-control-input">
                        <label class="custom-control-label" for="pe">Plastic Engineering</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="ddgm" name="branch" value="ddgm" class="custom-control-input">
                        <label class="custom-control-label" for="ddgm">Dress Designing & Garment Manufacturing</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="idd" name="branch" value="idd" class="custom-control-input">
                        <label class="custom-control-label" for="idd">Interior Design & Decoration</label>
                    </div>



                    <button type="submit" class="btn btn-primary btn-lg mt-3">Register</button>
                </form>
            </div>
        </div>
    </div>
    </form>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
        window.location.href = 'lg.php';
    });

    closeButton.style.marginLeft = '12px'; // Add margin-top here
        
    messageBox.appendChild(closeButton);
    modal.appendChild(messageBox);
    document.body.appendChild(modal);
}
</script>";

    $fcname = $_POST['fcname'];
    $coname = $_POST['coname'];
    $cocode = $_POST['cocode'];
    $email = $_POST['register_email'];
    $password = $_POST['register_password'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($role == "Examination Cell") {

        if (mysqli_num_rows($result) > 0) {
            $message = 'ID For Examination Cell is already exists';
            echo "<script>showAlert('$message');</script>";
        } else {
            $sql = "INSERT INTO users (email, password, role, fcname, coname, cocode) VALUES ('$email', '$password', '$role', '$fcname', '$coname', '$cocode')";
            if (mysqli_query($conn, $sql)) {
                $message = 'Registration Successful';
                echo "<script>showAlert('$message');</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        $branch = $_POST['branch'];
        if (mysqli_num_rows($result) > 0) {
            $message = 'Email already registered';
            echo "<script>showAlert('$message');</script>";
        } else {
            $sql = "INSERT INTO users (email, password, role, branch, fcname, coname, cocode) VALUES ('$email', '$password', '$role', '$branch', '$fcname', '$coname', '$cocode')";
            if (mysqli_query($conn, $sql)) {
                $message = 'Registration Successfuls';
                echo "<script>showAlert('$message');</script>";
            } else {
                $message = 'Error registering new user' . mysqli_error($conn);
                echo "<script>showAlert('$message');</script>";
            }
        }
    }
}

mysqli_close($conn);
?>