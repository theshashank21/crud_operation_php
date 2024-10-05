<?php
include 'form.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  require 'navbar.php';
  ?>
  <p>
    <?php
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
  </p>

  <center style="margin-top: 10px">
    <h2><u>Registration Form</u></h2>
  </center>
  <div class="container mt-4 w-50 mb-3">

    <form class="border border-success mx-auto p-3" action="form.php" method="post" enctype="multipart/form-data">
      <div class="mb-3 mt-2">
        <label for="idnumber" class="form-label">Id No.<span style="color:red">*</span></label>
        <input type="text" name="idnumber" class="form-control" id="exampleInputEmail1" required>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Name<span style="color:red">*</span></label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
      </div>

      <div class="mb-3">
        <label for="contact" class="form-label">Contact<span style="color:red">*</span></label>
        <input type="number" name="contact" maxlength="10" class="form-control" id="exampleInputEmail1" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email<span style="color:red">*</span></label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
      </div>

      <div class="mb-3">
        <label for="aadhar" class="form-label">Aadhar No.<span style="color:red">*</span></label>
        <input type="number" name="aadhar" maxlength="12" class="form-control" id="exampleInputEmail1" required>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <label for="validationCustom03" class="form-label">Upload Aadhar Front<span style="color:red">*</span></label>
          <div class="input-group">
            <input type="file" name="aadhar_front_upload_file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
          </div>
        </div>
        <div class="col-md-6">
          <label for="validationCustom03" class="form-label">Upload Aadhar Back<span style="color:red">*</span></label>
          <div class="input-group">
            <input type="file" name="aadhar_back_upload_file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="pan" class="form-label">Pan No.<span style="color:red">*</span></label>
        <input type="text" name="pan" class="form-control" id="exampleInputEmail1" required>
      </div>
      <label for="validationCustom03" class="form-label">Upload Pan Front<span style="color:red">*</span></label>
      <div class="input-group">
        <input type="file" name="pan_front_upload_file" class="form-control mb-3" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
      </div>

      <label for="validationCustom03" class="form-label">Image<span style="color:red">*</span></label>
      <div class="input-group">
        <input type="file" name="image_upload_file" class="form-control mb-3" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
      </div>

      <label for="address" class="form-label mt-2">Address<span style="color:red">*</span></label>
      <div class="form-floating mt-2 mb-2">
        <textarea class="form-control" name="address" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">House No., Street/Colony, City, State</label>
      </div>

      <div class="mb-3">
        <label for="designation" class="form-label mt-2">Designation<span style="color:red">*</span></label>
        <input type="text" name="designation" class="form-control" id="exampleInputPassword1" required>
      </div>

      <div class="d-flex justify-content-center">
        <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
      </div>
    </form>
  </div>

</body>

</html>