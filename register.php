<style>
    .gotologin {
        font-family: 'Times New Roman', Times, serif;
        margin-top: 10px;
    }


    .gotoregister {
        font-family: 'Times New Roman', Times, serif;
        margin-left: 5px;
    }

    a {
        text-decoration: none;
    }

    .success {
        display: block;
        text-align: center;
        margin-top: 15%;
        background-color: rgba(160, 214, 241, 0.256);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        margin-left: 35%;
    }

    .goback {
        display: flexbox;
        box-shadow: 2px 3px 4px black;
        padding: 3px;
        margin-left: 200px;
        margin-top: 20px;
        padding-left: 3px;

    }
</style>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // fetching the input variable from the form
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    // $password = $_POST["password"];
    $password = crypt($_POST["password"], PASSWORD_DEFAULT);  //functoin used for hashing
    $cnfpassword = crypt($_POST["cnfpassword"], PASSWORD_DEFAULT);
    $role = 'user';




    //Email Validation   
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        // check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    //connection
    $conn = new mysqli('localhost', 'root', '', 'details');
    if ($conn->connect_error) {
        die('connection Failed : ' . $conn->connect_error);
    } else {
        if ($password == $cnfpassword) {
            $sql = "SELECT * FROM login where username='$username'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "<h2><div class='success'";
            echo "<p>Registration Successfull!!!.. Now you can login.....";
            echo '<br><button class="gotologin"> <a href="login.html" >Go to Login</a></button>';
            echo '<button class="gotoregister"> <a href="registration.html" >Go to Registration</a></button>';
            echo '</div></h2>';
        } else {
            echo 'Password Does Not Match<br>';
            echo '<a class="goback" href="registration.html">Go Back';
            // header('Location:registration.html');
            exit();
        }
    }

    //inserting into the database
    $stmt = $conn->prepare("insert into login(Name, Username, Email, Password,CnfPassword, Role) values (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name, $username, $email, $password, $cnfpassword, $role);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
