<?php
global $conn;
require("common/master.php");
include 'form.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing-Data</title>
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

    <?php


    $listingsql = "SELECT * FROM tbl_student";
    $result = mysqli_query($conn, $listingsql);

    if (mysqli_num_rows($result) > 0) {
        echo "<center class='mt-4'><h2><u>All Students Data</u></h2></center>";
        echo "<div class='container'>";
        echo "<table border='1' class='table table-light table-hover mt-4 p-3'>";
        echo "<tr>
       <th>Member Info</th>
       <th>Contact</th>
       <th>Address</th>
       <th>ID Info</th>
       <th>Action</th>
       </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='align-middle'>";
            echo "<td>" . $row["id"] . '<br>' . $row['std_name'] . "<br><small>" . date_convert($row['on_date']) . "</small></td>";
            echo "<td>" . $row["std_contact"] . '<br>' . $row['std_email'] . "</td>";
            echo "<td>" . $row["std_address"] . "</td>";
            echo "<td>Aadhar: " . $row["std_aadhar"] . '<br>Pan: ' . $row['std_pan'] . '<br>
           <a href=' . $row['std_aadhar_front_url'] . $row['std_aadhar_front_name'] . '>Aadhar Front</a>
           <br>
           <a href=' . $row['std_aadhar_back_url'] . $row['std_aadhar_back_name'] . '>Aadhar Back</a>
           <br>
           <a href=' . $row['std_pan_front_url'] . $row['std_pan_name'] .  '>Pan</a>';

            "</td>";

            echo "<td>";
            echo " <a href='edit.php?id=" . $row['id'] . "' type='button' class='btn btn-outline-primary btn-sm'>📝Edit</a><br><br>

           <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\");' type='button' class='btn btn-outline-danger btn-sm'>📥Delete</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<center><h5>No results found \n 😒</center></h5>";
    }
    ?>

</body>

</html>