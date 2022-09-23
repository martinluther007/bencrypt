<?php
if (isset($_POST['submit'])) {
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phoneNumber'];
    $password = $_POST['password'];
    print $email;
    require_once "../server.php";
    require_once "./auth_functions.php";

    if (empty_input_signup($full_name, $email, $phone, $password) !== false) {
        header("location:../index.php?error=emptyinputs");
        exit();
    }

    if (invalid_email($email) !== false) {
        header("location:../index.php?error=invalidemail");
        exit();
    }
    if (invalid_phone($phone) !== false) {
        header("location:../index.php?error=invalidphone");
        exit();
    }
    if (invalid_password($password) !== false) {
        header("location:../index.php?error=invalidpassword");
        exit();
    }

    if (email_exists($conn, $email) !== false) {
        header("location:../index.php?error=emailexists");
        exit();
    }

    create_user($conn, $full_name, $email, $phone, $password);
} else {
    header("location:./index.php");
    exit();
}
