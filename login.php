<?php
include("connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form
    $myusername = $_POST['username'];
    $mypassword = md5($_POST['password']);

    $sql = "SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_row($result);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {

        $_SESSION['myusername'] = $myusername;
        header("location: product.php");
        echo "Successfully Logged In";
    }else {

        echo '<div style="text-align: center;font-size: large;background-color: bisque;height: 100px;
    width: 500px;background-color: powderblue;margin-left: 30%;margin-top: 6%;padding-top: 5px"> 
                <p>
                    <strong>Your Username or Password is invalid .Please try again. </strong>
                    <p><strong><a href="index.php">  Log In</a></strong></p>
                </p> 
             </div>';
    }
}
?>