<?php
require("common/master.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching User</title>
</head>

<body>
    <?php
    require 'navbar.php';
    ?>

    <div class="container mt-4 mb-4">
        <form class="d-flex" role="search" action="" method="get">
            <input class="form-control me-2 border border-success fs-5" type="text" placeholder="Search via ID" name='id' id="id" aria-label="Search" required>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <?php
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT std_name, std_email, std_contact, std_address, std_image_url, std_image_name, std_aadhar, std_pan FROM tbl_student WHERE id = ?";
        $result = execute_sql($sql, $id);

        if (mysqli_num_rows($result) > 0) {
            echo "<center class='mt-4'><h2><u>User Data</u></h2></center>";
            echo "<div class='container'>";
            echo "<table border='1' class='table table-light table-hover mt-4 p-3'>";
            echo "<tr>
       <th>Profile Img</th>
       <th>Name</th>
       <th>Contact</th>
       <th>ID Info</th>
       </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class='align-middle'>";
                echo "<td><img src='" . $row['std_image_url'] . $row['std_image_name'] . "' alt='User Image' style='width:150px;height:150px;border-radius:50%'> </td>";

                echo "<td>"  . $row['std_name'] . "</td>";

                echo "<td>" . $row['std_contact'] . "<br>";
                echo  $row['std_email'] . "<br>";
                echo  $row['std_address'] . "</td>";

                echo "<td>Aadhar: " . $row['std_aadhar'] . '<br>Pan: ' . $row['std_pan'] . "</td>";

                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "<center><p>No user found with ID " . htmlspecialchars($id) . "<br>😒</p></center>";
        }
    }

    ?>


</body>

</html>