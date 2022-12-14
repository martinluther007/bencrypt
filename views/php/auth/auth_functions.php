<?php

function empty_input_signup($full_name, $email, $phone, $password)
{
    $result = false;
    if (empty($full_name) || empty($email) || empty($phone) || empty($password))
        $result = true;
    // echo "<script> alert('$result')</script>";
    return $result;
}


function invalid_email($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $result = true;
    return $result;
}


function invalid_phone($phone)
{
    $result = false;
    // NOT GOOD PHONE NUMBER VERIFICATION
    if (preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', $phone))
        $result = true;
    return $result;
}
function invalid_password($password)
{
    $result = false;
    if (strlen($password) < 8)
        $result = true;
    return $result;
}
function email_exists($conn, $email)
{
    $result = false;
    $sql = "SELECT email FROM users WHERE email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        print "something went wrong";
        header('location:../index.php?error=stmtfailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result_data = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function  create_user($conn, $full_name, $email, $phone, $password)
{
    $sql = "INSERT INTO users(full_name,email,password,phone_number) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        print "Something went wrong";
        header('location:../index.php?error=stmtfailed');
        exit();
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, 'sssi', $full_name, $email, $hashed_password, $phone);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location:../index.php?error=none');
        exit();
    }
}
