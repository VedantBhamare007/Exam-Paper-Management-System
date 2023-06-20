<style>
<?php include 'css/approve4.css'; ?>
</style>

<?php
// Replace values with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from your database
$sql = "SELECT * FROM if_uploaded_files";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0){
// Generate a table with the data
echo "<h3>Your Question papers</h3>";
echo "<table>";
echo "<tr><th>Course Name</th><th>Course Code</th><th>Exam</th><th>Question Paper</th><th>Status</th><th>Hod Remark</th><th>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['coursename'] . "</td>";
    echo "<td>" . $row['coursecode'] . "</td>";
    if($row['exam'] == 'pt1') {echo "<td>" . "Periodic Test 1" . "</td>";}
    if($row['exam'] == 'pt2') {echo "<td>" . "Periodic Test 2" . "</td>";}
    if($row['exam'] == 'final') {echo "<td>" . "Final" . "</td>";}
    echo "<td> <a href='uploads/" . $row["file_name"] . "'>" . $row["file_name"] . "</a></td>";
    echo "<td>" . $row['status1'] . "</td>";
    echo "<td>" . $row['hod_notes'] . "</td>";
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
    echo "<button type='submit' name='delete'>Delete</button>";
    echo "<button type='submit' name='reupload'>Reupload</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
    
    
}
echo "</table>";

echo "<button type='submit' name='upload'><a href='IFUpload.php'>Upload a new Question Paper</a></button>";
}
else{
    echo "<button type='submit' name='upload'><a href='IFUpload.php'>Upload a new Question Paper</a></button>";

}
function refreshPage() {
    echo '<meta http-equiv="refresh" content="0">';
}
if (isset($_POST['delete'])) {
    $i=-1;
    do{
        $id = $_POST['id'];
    
        $sql = "DELETE FROM if_uploaded_files WHERE id = $id";
        
        if (mysqli_query($conn, $sql)) {
            $message = 'File has been deleted successfully';

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
                messageBox.style.backgroundColor = 'white';
                messageBox.style.padding = '20px';
                messageBox.textContent = message;
                
                var closeButton = document.createElement('button');
                closeButton.textContent = 'Close';
                closeButton.addEventListener('click', function() {
                    modal.parentNode.removeChild(modal);
                    window.location.href = 'if_faculty.php';
                });
            
                messageBox.appendChild(closeButton);
                modal.appendChild(messageBox);
                document.body.appendChild(modal);
            }
        
            showAlert('$message');
            </script>";
            break;
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        
    }while($i==0);
}

if (isset($_POST['reupload'])) {

        $id = $_POST['id'];
    
        echo "<form method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='" . $id . "'>";
    
        #echo"<label for='pdf_file'>Select a PDF file to upload:</label>";
        echo"<input type='file' name='pdf_file' id='pdf_file' /><br /><br />";
        echo"<input type='submit' name='newupload' value='Upload PDF file' />";
        echo "</form>";

     
}

if (isset($_POST['newupload'])) {
    $i=-1;
    do{
        $id = $_POST['id'];
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $file_size = $_FILES['pdf_file']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $upload_dir = "uploads/";
        $file_path = $upload_dir . $file_name;
        
        $sql = "UPDATE if_uploaded_files SET file_name = '$file_name', file_path = '$file_path', status1='-', hod_notes='-' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            $message = 'File has been reuploaded successfully';

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
                messageBox.style.backgroundColor = 'white';
                messageBox.style.padding = '20px';
                messageBox.textContent = message;
                
                var closeButton = document.createElement('button');
                closeButton.textContent = 'Close';
                closeButton.addEventListener('click', function() {
                    modal.parentNode.removeChild(modal);
                    window.location.href = 'if_faculty.php';
                });
            
                messageBox.appendChild(closeButton);
                modal.appendChild(messageBox);
                document.body.appendChild(modal);
            }
        
            showAlert('$message');
            </script>";
            break;
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }while($i==0);
     
}


mysqli_close($conn);
?>


<script>
function delete() {
    alert("File has been deleted.");
}
function reupload() {
    alert("File has been reuploaded.");
}


</script>
