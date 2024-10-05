
<?php
require("common/master.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $maxFileSize = 200 * 1024;
    $allowedFileExtension = ["jpg", "jpeg", "png", "webp", "pdf"];

    //// To Update Aadhar Front File /////
    $sub_qry_aadhar_front = '';
    if (checkingFiles('new_aadhar_front_upload_file')) {
        $new_aadhar_front_file_tmp = fileDetails('new_aadhar_front_upload_file', 'tmp_name');
        if ($new_aadhar_front_file_tmp != '') {
            $aadhar_front_ext = pathinfo(fileDetails('new_aadhar_front_upload_file', 'name'), PATHINFO_EXTENSION);
            $new_aadhar_front_new_name = time() . '' . rand(10, 99) . '.' . $aadhar_front_ext;

            $result = get_single_column("SELECT std_aadhar_front_name, std_aadhar_front_url FROM tbl_student WHERE id = ?", $id);
            $aadharPathFront_old = $result['std_aadhar_front_url'] . $result['std_aadhar_front_name'];

            unlink($aadharPathFront_old);
            move_uploaded_file($new_aadhar_front_file_tmp, "upload/aadhar/" . $new_aadhar_front_new_name);

            $sub_qry_aadhar_front = ", std_aadhar_front_url = 'upload/aadhar/', std_aadhar_front_name='$new_aadhar_front_new_name'";
        }
    }

    //// To Update Aadhar Back File /////
    $sub_qry_aadhar_back = '';
    if (checkingFiles('new_aadhar_back_upload_file')) {
        $new_aadhar_back_file_tmp = fileDetails('new_aadhar_back_upload_file', 'tmp_name');
        if ($new_aadhar_back_file_tmp != '') {
            $aadhar_back_ext = pathinfo(fileDetails('new_aadhar_back_upload_file', 'name'), PATHINFO_EXTENSION);
            $new_aadhar_back_new_name = time() . '' . rand(10, 99) . '.' . $aadhar_back_ext;

            $result = get_single_column("SELECT std_aadhar_back_name, std_aadhar_back_url FROM tbl_student WHERE id = ?", $id);
            $aadharPathBack_old = $result['std_aadhar_back_url'] . $result['std_aadhar_back_name'];

            unlink($aadharPathBack_old);
            move_uploaded_file($new_aadhar_back_file_tmp, "upload/aadhar/" . $new_aadhar_back_new_name);

            $sub_qry_aadhar_back = ", std_aadhar_back_url = 'upload/aadhar/', std_aadhar_back_name='$new_aadhar_back_new_name'";
        }
    }

    //// To Update Pan Front File /////
    $sub_qry_pan_front = '';
    if (checkingFiles('new_pan_front_upload_file')) {
        $new_pan_front_file_tmp = fileDetails('new_pan_front_upload_file', 'tmp_name');
        if ($new_pan_front_file_tmp != '') {
            $pan_front_ext = pathinfo(fileDetails('new_pan_front_upload_file', 'name'), PATHINFO_EXTENSION);
            $new_pan_front_new_name = time() . '' . rand(10, 99) . '.' . $pan_front_ext;

            $result = get_single_column("SELECT std_pan_name, std_pan_front_url FROM tbl_student WHERE id = ?", $id);
            $panPathFront_old = $result['std_pan_front_url'] . $result['std_pan_name'];

            unlink($panPathFront_old);
            move_uploaded_file($new_pan_front_file_tmp, "upload/pan/" . $new_pan_front_new_name);

            $sub_qry_pan_front = ", std_pan_front_url = 'upload/pan/', std_pan_name='$new_pan_front_new_name'";
        }
    }

    //// To Update Image File /////
    $sub_qry_image = '';
    if (checkingFiles('new_image_upload_file')) {
        $new_image_file_tmp = fileDetails('new_image_upload_file', 'tmp_name');
        if ($new_image_file_tmp != '') {
            $image_ext = pathinfo(fileDetails('new_image_upload_file', 'name'), PATHINFO_EXTENSION);
            $new_image_new_name = time() . '' . rand(10, 99) . '.' . $image_ext;

            $result = get_single_column("SELECT std_image_name, std_image_url FROM tbl_student WHERE id = ?", $id);
            $imagePath_old = $result['std_image_url'] . $result['std_image_name'];

            unlink($imagePath_old);
            move_uploaded_file($new_image_file_tmp, "upload/image/" . $new_image_new_name);

            $sub_qry_image = ", std_image_url = 'upload/image/', std_image_name='$new_image_new_name'";
        }
    }

    ///////////////////////////////////////////////////////////////////////

    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $aadhar = $_POST['aadhar'];
    $pan = $_POST['pan'];
    $designation = $_POST['designation'];

    // Update the record in the database
    $sql = "UPDATE tbl_student SET 
    std_name = '$name', 
    std_contact = '$contact', 
    std_email = '$email', 
    std_address = '$address', 
    std_aadhar = '$aadhar', 
    std_pan = '$pan', 
    std_designation = '$designation' 
    $sub_qry_aadhar_front
    $sub_qry_aadhar_back 
    $sub_qry_pan_front
    $sub_qry_image
    WHERE id = ?";

    if (execute_sql($sql, $id)) {
        $_SESSION['msg'] = "<center style='margin-top: 8px; color: green'><h5>Record Updated Succesfully</h5></center>";
    } else {
        $_SESSION['msg'] = "<center style='margin-top: 8px; color: green'><h5>Error updating record: " . mysqli_error($conn) . "</h5></center>";
    }
    header("location: listing.php");
    exit();
} else {
    echo "Invalid request.";
}
