
<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.html");
    exit();
}
$conn = new mysqli('localhost', 'root', '', 'details');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newRole = $_POST['role'];
    $userEmail = $_POST['usermail'];

    // Update the role in the database
    $updateSql = "UPDATE login SET Role = '$newRole' WHERE Email = '$userEmail'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Role updated successfully";
        echo '<meta http-equiv="refresh" content="1;url=admin_page.php">';
    } else {
        echo "Error updating role: " . $conn->error;
    }
}
$conn->close();
?>