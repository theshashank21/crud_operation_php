<?php
require("common/master.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  ob_start();
  session_start();

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  $sql_query = "SELECT std_aadhar_front_name, std_aadhar_back_name, std_pan_name, std_image_name FROM tbl_student WHERE id = ?";
  $result = execute_sql($sql_query, $id);

  if ($result && mysqli_num_rows($result) > 0) {
    $record = mysqli_fetch_assoc($result);
    echo $record;
    $aadharPathFront = 'upload/aadhar/' . $record['std_aadhar_front_name'];
    $aadharPathBack = 'upload/aadhar/' . $record['std_aadhar_back_name'];
    $panPath = 'upload/pan/' . $record['std_pan_name'];
    $imagePath = 'upload/image/' . $record['std_image_name'];

    // Delete the image file
    if (file_exists($aadharPathFront) && file_exists($aadharPathBack) && file_exists($panPath) && file_exists($imagePath)) {
      unlink($aadharPathFront);
      unlink($aadharPathBack);
      unlink($panPath);
      unlink($imagePath);
    } else {
      echo "Files not found to delete....";
    }
  }


  //DELETING FROM THE TABLE
  $sql = "DELETE FROM tbl_student WHERE id = ?";
  if (execute_sql($sql, $id)) {
    $_SESSION['msg'] = "<center style='margin-top: 8px; color: green'><h5>Record deleted successfully.</h5></center>";
  }
  // else {
  //   $_SESSION['msg'] = "<center style='margin-top: 8px; color: red'><h5>Error deleting record: " . mysqli_error($conn) . "</h5></center>";
  // }


  header("location:listing.php");
  exit;
  ?>
</body>

</html>