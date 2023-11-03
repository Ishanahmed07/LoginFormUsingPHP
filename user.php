<head>
    <title>User</title>
</head>

<style>
    .container {
        display: block;
        text-align: center;
        display: block;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        margin-left: 37%;
        margin-top: 8px;
        background-color: rgba(242, 236, 222, 0.8);
    }

    .lg {
        margin-top: 5px;
    }

    h2 {
        text-align: center;
    }
</style>
<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}
$username = $_SESSION["Username"];


$conn = new mysqli('localhost', 'root', '', 'details');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<h2>Welcome back $username...!!<br> Your current Role is User</h2>";

$sql = "SELECT * FROM login where Role='user' and Username = '$username'";

$result = $conn->query($sql);

$userData = $result->fetch_assoc();

echo "<div class='container'>";
echo "Name: " . "<b>" . $userData["Name"] . "</b>" . "<br>";
echo "Username: " . "<b>" . $userData["Username"] . "</b>" . "<br>";
echo "Email: " . "<b>" . $userData["Email"] . "</b>" . "<br>";
echo "Role: " . "<b>" . $userData["Role"] . "</b>" . "<br>";

echo '<form action="logout.php" method="post">';
echo "<div class=lg><button type='submit' class='logoutbtn'>Log Out</div>";
echo "</form>";
echo "</div>";

?>