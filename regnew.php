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

    <a href="lg.php" class="btn btn-outline-primary">Log Out</a>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="img/header.png" alt="Header" class="img-fluid">
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-sm-12 col-md-8 col-lg-6 col-xl-5 form-container">
                <h2>Registration of New Faculty</h2>
                <form  action="regnew.php" method="post">
                    <div class="form-group">
                        <label for="fcname">Name</label>
                        <input type="text" pattern="^[a-zA-Z\.\s]+$" class="form-control" name="fcname" id="fcname" required />
                    </div>
                    <div class="form-group">
                        <label for="coname">Course Name</label>
                        <input type="text" class="form-control" name="coname" id="coname" required />
                    </div>
                    <div class="form-group">
                        <label for="cocode">Course Code</label>
                        <input type="text" class="form-control" name="cocode" id="cocode" required />
                    </div>
                    <div class="form-group">
                        <label for="register_email">Faculty Email:</label>
                        <input type="email" class="form-control" id="register_email" name="register_email" required>
                    </div>
                    <div class="form-group">
                        <label for="register_password">Faculty Password:</label>
                        <input type="password" class="form-control" id="register_password" name="register_password"
                            required>
                    </div>



                    <button type="submit" class="btn btn-primary btn-lg mt-3" name="action"
                        value="reg">Register</button>


                </form>
            </div>
        </div>
    </div>



    </form>
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

// Call the function with the message
</script>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $fcname = $_POST['fcname'];
    $coname = $_POST['coname'];
    $cocode = $_POST['cocode'];
    $email = $_POST['register_email'];
    $password = $_POST['register_password'];
    $role = 'Faculty';
    $branch = $_SESSION['branch'];

    // Check if the email already exists in the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        $message = 'Faculty is already registered';
        echo "<script>showAlert('$message');</script>";
    } else {
        $sql = "INSERT INTO users (email, password, role, branch, fcname, coname, cocode) VALUES ('$email', '$password', '$role', '$branch', '$fcname', '$coname', '$cocode')";
        if (mysqli_query($conn, $sql)) {
            $message = 'Registration successful ';
            echo "<script>showAlert('$message');</script>";
        } else {
            $message = 'Error registering new user' . mysqli_error($conn);
            echo "<script>showAlert('$message');</script>";
        }
    }

}

mysqli_close($conn);
?>