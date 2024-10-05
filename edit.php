<?php
require("common/master.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_student WHERE id = ?";
        $result = execute_sql($sql, $id);

        if ($result == false) {
            echo "query return false";
            echo ("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['std_name'];
            $contact = $row['std_contact'];
            $email = $row['std_email'];
            $address = $row['std_address'];
            $aadhar = $row['std_aadhar'];
            $pan = $row['std_pan'];
            $designation = $row['std_designation'];
        } else {
            echo "Record not found.";
            exit();
        }
    } else {
        echo "No ID specified.";
    }
    ?>


    <center style="margin-top: 10px">
        <h2><u>Edit Your Record</u></h2>
    </center>
    <div class="container mt-4 w-50 mb-3">
        <form class="border border-success mx-auto p-3" enctype="multipart/form-data" action="update.php" method="post">
            <div class="mb-3 mt-2">
                <label for="idnumber" class="form-label">Id</label>
                <input type="text" name="id" class="form-control" id="exampleInputEmail1" value="<?php echo $id; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $name; ?>">
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="number" name="contact" class="form-control" id="exampleInputEmail1" value="<?php echo $contact; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="<?php echo $address; ?>">
            </div>

            <div class="mb-3">
                <label for="aadhar" class="form-label">Aadhar No.</label>
                <input type="number" name="aadhar" class="form-control" id="exampleInputEmail1" value="<?php echo $aadhar; ?>">
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Upload Aadhar Front</label>
                    <div class="input-group">
                        <input type="file" name="new_aadhar_front_upload_file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Upload Aadhar Back</label>
                    <div class="input-group">
                        <input type="file" name="new_aadhar_back_upload_file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                </div>
            </div>






            <div class="mb-3">
                <label for="pan" class="form-label">Pan No.</label>
                <input type="text" name="pan" class="form-control" id="exampleInputEmail1" value="<?php echo $pan; ?>">
            </div>

            <label for="validationCustom03" class="form-label">Upload Pan Front</label>
            <div class="input-group">
                <input type="file" name="new_pan_front_upload_file" class="form-control mb-3" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>

            <label for="validationCustom03" class="form-label">Image</label>
            <div class="input-group">
                <input type="file" name="new_image_upload_file" class="form-control mb-3" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>




            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" id="exampleInputEmail1" value="<?php echo $designation; ?>">
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-outline-primary">Update</button>
            </div>
        </form>
    </div>
</body>

</html>