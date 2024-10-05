<?php
ob_start();
session_start();

function test_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {
    $maxFileSize = 200 * 1024;
    $allowedFileExtension = ["jpg", "jpeg", "png", "webp", "pdf"];

    function fileDetails($variable1, $variable2)
    {
        return $_FILES[$variable1][$variable2];
    }

    function fileExtension($variable1, $variable2)
    {
        return pathinfo(basename(fileDetails($variable1, $variable2), PATHINFO_EXTENSION))['extension'];
    }

    function moveFile($variable1, $variable2, $variable3)
    {
        move_uploaded_file(fileDetails($variable1, 'tmp_name'), "upload/" . $variable3 . "/" . $variable2);
    }

    if (
        isset($_FILES['aadhar_front_upload_file']) &&
        isset($_FILES['aadhar_back_upload_file']) &&
        isset($_FILES['pan_front_upload_file']) &&
        isset($_FILES['image_upload_file'])
    ) {

        $aadhar_front_new_name = time() . '' . rand(10, 99) . '.' . fileExtension('aadhar_front_upload_file', 'name');

        $aadhar_back_new_name = time() . '' . rand(10, 99) . '.' . fileExtension('aadhar_back_upload_file', 'name');

        $pan_front_new_name = time() . '.' . fileExtension('pan_front_upload_file', 'name');

        $image_new_name = time() . '.' . fileExtension('image_upload_file', 'name');

        if (
            in_array(fileExtension('aadhar_front_upload_file', 'name'), $allowedFileExtension) &&
            in_array(fileExtension('aadhar_back_upload_file', 'name'), $allowedFileExtension) &&
            in_array(fileExtension('pan_front_upload_file', 'name'), $allowedFileExtension) &&
            in_array(fileExtension('image_upload_file', 'name'), $allowedFileExtension)
        ) {

            if (
                fileDetails('aadhar_front_upload_file', 'size') <= $maxFileSize &&
                fileDetails('aadhar_back_upload_file', 'size') <= $maxFileSize &&
                fileDetails('pan_front_upload_file', 'size') <= $maxFileSize &&
                fileDetails('image_upload_file', 'size') <= $maxFileSize
            ) {
                moveFile('aadhar_front_upload_file', $aadhar_front_new_name, 'aadhar');
                moveFile('aadhar_back_upload_file',  $aadhar_back_new_name, 'aadhar');
                moveFile('pan_front_upload_file', $pan_front_new_name, 'pan');
                moveFile('image_upload_file', $image_new_name, 'image');

                $aadhar_front_file_url = "upload/aadhar/";
                $aadhar_back_file_url = "upload/aadhar/";
                $pan_front_file_url =  "upload/pan/";
                $image_file_url = "upload/image/";
            } else {
                $_SESSION['msg'] = "<center style='margin-bottom: 20px; color:red;'>Maximum file size should be: 200kb<br>Please refresh and fills it correctly.</center>";
                header("location:index.php");
                exit;
            }
        } else {
            $_SESSION['msg'] = "<center style='margin-bottom: 20px; color:red;'>Only allowed format is: jpg, png, jpeg, webp, pdf;<br>Please refresh and fills it correctly.</center>";
            header("location:index.php");
            exit;
        }
    }

    $servername = "localhost";
    $username = "u144885197_web_user";
    $password = "#p4ABjw|UQw9";
    $db = "u144885197_web_db";

    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        echo "Internal error, please refresh and resubmit the form...";
    }

    $idnumber = test_data($_POST['idnumber']);
    $name = test_data($_POST['name']);
    $contact = test_data($_POST['contact']);
    $email = test_data($_POST['email']);
    $aadhar = test_data($_POST['aadhar']);
    $pan = test_data($_POST['pan']);
    $address = test_data($_POST['address']);
    $designation = test_data($_POST['designation']);

    $sql = "INSERT INTO tbl_student 
    set
    id = '$idnumber',
    std_name = '$name',
    std_contact = '$contact',
    std_email = '$email',
    std_aadhar = '$aadhar',
    std_pan = '$pan',
    std_address = '$address',
    std_designation = '$designation',
    std_aadhar_front_url = '$aadhar_front_file_url',
    std_aadhar_back_url = '$aadhar_back_file_url',
    std_pan_front_url = '$pan_front_file_url',
    std_image_url = '$image_file_url',
    std_aadhar_front_name = '$aadhar_front_new_name',
    std_aadhar_back_name = '$aadhar_back_new_name',
    std_pan_name = '$pan_front_new_name',
    std_image_name = '$image_new_name'
    ";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "<center style='margin-bottom: 20px; color:green;'> <h1>Registration Successfull!!</h1></center>";
        $listing = true;
    } else {
        $_SESSION['msg'] =  "<center style='margin-bottom: 20px; color:red;'> <h1>Error in Submission</h1></center>" . mysqli_error($conn) . "";
    }

    header("location:index.php");
    exit;
}
