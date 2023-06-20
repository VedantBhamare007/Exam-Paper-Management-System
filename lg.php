<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/newform.css">
</head>

<?php 

 session_start();
 unset($_SESSION["branch"]);
 unset($_SESSION["role"]);
 session_destroy();
 if(session_status() == PHP_SESSION_NONE){ 
?>
    <body>
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <img src="img/header.png" alt="Header" class="img-fluid">
            </div>
        </div>
        
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-sm-12 col-md-8 col-lg-6 col-xl-5 form-container">
                <h2>Login</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="login_email">Email:</label>
                        <input type="email" class="form-control" id="login_email" name="login_email" required>
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password:</label>
                        <input type="password" class="form-control" id="login_password" name="login_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php }

else{
$error = "Session is not logged out! Destroy the session first to login again.";

echo '<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
<div class="alert alert-danger text-center" role="alert" style="font-size: 2rem;">';
  echo $error;
echo'</div>';
echo'</div>';
}

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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
    });

    closeButton.style.marginLeft = '12px'; // Add margin-top here
        
    messageBox.appendChild(closeButton);
    modal.appendChild(messageBox);
    document.body.appendChild(modal);
}

</script>";


if(isset($_POST['login_email'])){
    $email = $_POST['login_email'];
$password = $_POST['login_password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $branch = $row['branch'];
            $role = $row['role'];

            if ($role == 'Faculty') {
                $fcname = $row['fcname'];
                $_SESSION['fcname']=$fcname;

                $coname = $row['coname'];
                $_SESSION['coname']=$coname;

                $cocode = $row['cocode'];
                $_SESSION['cocode']=$cocode;

                $role = $row['role'];
                $_SESSION['role']=$role;

                $branch = $row['branch'];
                $_SESSION['branch']=$branch;
                header("Location: if_faculty.php");
            }
            
            elseif ($role == 'HOD') {
                $fcname = $row['fcname'];
                $_SESSION['fcname']=$fcname;

                $coname = $row['coname'];
                $_SESSION['coname']=$coname;

                $cocode = $row['cocode'];
                $_SESSION['cocode']=$cocode;

                $role = $row['role'];
                $_SESSION['role']=$role;

                $branch = $row['branch'];
                $_SESSION['branch']=$branch;
                header("Location: if_hod.php");
            }
            
            elseif ($role == 'Examination Cell') {
                $role = $row['role'];
                $_SESSION['role']=$role;
                header("Location: exam.php");
            } 
            
            else {
                echo "No Faulty login: ";
            }
        }
    } else {
        $message = 'No result for the email and password you have entered in database users';
        echo "<script>showAlert('$message');</script>";
    }
    exit();
} else {
    $message = 'Invalid email and password';
    echo "<script>showAlert('$message');</script>";
}
}

mysqli_close($conn);
?>