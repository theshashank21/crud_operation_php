<?php
global $conn;

$servername = "localhost";
$username = "u144885197_web_user";
$password = "#p4ABjw|UQw9";
$db = "u144885197_web_db";

$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    echo "Internal error, please refresh and resubmit the form...";
}

//function for getting company name
function get_company_name()
{
    return 'My Mini Task';
}

//funciton used for converting the date format 
function  date_convert($date)
{
    if ($date != '')
        return date("d M Y", strtotime($date));
    else
        return 'No Date';
}

//this function will build the connection and return the data in assoc array
function execute_sql($sql, $id)
{
    global $conn;
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Error preparing the statement: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, 's', $id);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    } else {
        echo "Error updating record: " . mysqli_stmt_error($stmt);
    }
}

// this funciton is used to get the row according to the id
function get_single_column($sql, $id)
{
    global $conn;
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Error preparing the statement: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, 's', $id);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        return  mysqli_fetch_assoc($result);
    } else {
        echo "Error updating record: " . mysqli_stmt_error($stmt);
    }

    // $qry = mysqli_query($conn, $sql);
    // return mysqli_fetch_assoc($qry);
}

//The below two function are used for session start and session close
function sessionStart()
{
    ob_start();
    session_start();
}
function sessionClose()
{
    header("location:index.php");
    exit;
}

//function for getting the details of uploaded files (e.g. file_name, file_size, file_tmp)
function fileDetails($variable1, $variable2)
{
    return $_FILES[$variable1][$variable2];
}

//function for checking if there is any uploaded file or not (return true or false)
function checkingFiles($file)
{
    return isset($_FILES[$file]);
}

//function used for checking extension
function checkExtension()
{
    $allowedFileExtension = ["jpg", "jpeg", "png", "webp", "pdf"];
    if (
        in_array(fileExtension('aadhar_front_upload_file', 'name'), $allowedFileExtension) &&
        in_array(fileExtension('aadhar_back_upload_file', 'name'), $allowedFileExtension) &&
        in_array(fileExtension('pan_front_upload_file', 'name'), $allowedFileExtension) &&
        in_array(fileExtension('image_upload_file', 'name'), $allowedFileExtension)
    ) {
        return true;
    } else {
        return false;
    }
}

function moveFile($variable1, $variable2)
{
    move_uploaded_file(fileDetails($variable1, 'tmp_name'), "upload/aadhar/" . $variable2);
}
