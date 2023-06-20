<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_system";
session_start();
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$branch = $_SESSION['branch'];
$role = $_SESSION['role'];

if (!$branch || !$role) {
    header("location:lg.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Delete a faculty login credentials</title>

    <style>
        .form-container {
            background-color: #87cefa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            max-width: 75%;
            margin-bottom: 5%;
            margin-top: 3%;
        }

        body {
            background-image: url("img/bg1.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        label,
        .l1 {
            color: #000;
        }

        h2 {
            margin: 8px 0 16px 3px;
        }

        label,
        input,
        .l1 {
            font-size: 22px;
            padding: 5px;
        }

        button {
            font-size: 24px;
            padding: 10px 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            /* Change the font family to Arial or a sans-serif font */
            font-size: 22px;
            /* Change the font size to 16px */
        }

        button.btn-primary {
            background-color: rgb(49, 49, 254);
            border-color: blue;
        }

        .custom-radio .custom-control-input:checked~.custom-control-label::before {
            background-color: rgb(49, 49, 254);
            border-color: blue;
        }

        .custom-radio .custom-control-label {
            font-size: 22px;
        }

        input[type="radio"],
        label {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }

        input[type="radio"],
        .custom-control-label {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }

        .btn-outline-primary {
            visibility: 50%;
            position: absolute;
            top: 0;
            right: 0;
            margin: 20px;
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

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-sm-12 col-md-8 col-lg-6 col-xl-5 form-container">
                <h2>Deletion of Faculty</h2>
                <form method="post">

                    <div class="form-group">
                        <label for="register_email">Faculty Email:</label>
                        <input type="email" class="form-control" id="register_email" name="register_email" required>
                    </div>
                    <div class="form-group">
                        <label for="register_password">Faculty Password:</label>
                        <input type="password" class="form-control" id="register_password" name="register_password"
                            required>
                    </div>

                    <input type="hidden" name="role" value="Faculty">

                    <button type="submit" class="btn btn-primary btn-lg mt-3" name="action" value="upd">Delete Faculty
                        Login Credentials </button>

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
    if (isset($_POST["action"])) {
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];
        $role = $_POST['role'];
        $branch = $_SESSION['branch'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND branch='$branch' AND role='$role'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            if ($row["branch"] == $branch) {
                $sql = "DELETE FROM users WHERE email='$email' AND password = '$password' AND branch='$branch'AND role='$role'";
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
}


?>