<?php
session_start();
?>
<?php
// if (isset($_SESSION["username"]) && $_SESSION["privilage"] === "admin") { 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>

    <link rel="stylesheet" href="style.css">

    <!-- bootstarp start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- bootstrap end -->

    <!-- online fonts start -->
    <link href="https://db.onlinewebfonts.com/c/1f182a2cd2b60d5a6ac9667a629fbaae?family=PF+Din+Stencil+W01+Bold" rel="stylesheet">
    <!-- online fonts end -->

    <!-- Goolge fonts start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet">
    <!-- Goolge fonts end -->

    <!-- AOS  start-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- AOS  end-->

    <!-- Font Awesome start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome end-->

</head>

<body>

    <div class="home">

        <!-- Navbar start -->
        <?php
        include '../../components/navbar/navbar.php';
        ?>
        <!-- Navbar end -->

        <!-- admin-dashbord-start -->
        <div class="admin-dashbord container">

            <!-- tittle start -->
            <div class="admin-dashbord-tittle mb-4" style="position: relative;">
                <P class="" style=" margin-bottom: 0 !important;">User Status</P>

                <!-- current time seter start -->
                <div class="time" style=" position: absolute; right: 0%;">
                    <?php
                    // Set the default timezone
                    date_default_timezone_set('Asia/Colombo');
                    // Get the current date and time
                    $currentDateTime = date('Y-m-d H:i:s');
                    // Display the current date and time
                    echo $currentDateTime;
                    ?>
                </div>
                <!-- current time seter end -->

            </div>
            <!-- Tittle end -->

            <!-- AOS script start -->
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>
                AOS.init();
            </script>
            <!-- AOS script end-->

            <!-- filtering ui start -->
            <div class="row mb-2 mt-1 filter-section">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-10">
                            <form action="admin-manager.php" method="GET">

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="name" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>" class="form-control" placeholder="Name">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <select name=privilage-status id="" class="form-select">
                                            <option value="">Privilege Status</option>
                                            <option value="teacher" <?= isset($_GET['privilage-status']) == true ? ($_GET['privilage-status'] == 'teacher' ? 'selected' : '') : '' ?>>Teacher
                                            </option>
                                            <option value="student" <?= isset($_GET['privilage-status']) == true ? ($_GET['privilage-status'] == 'student' ? 'selected' : '') : '' ?>>Student
                                            </option>

                                        </select>
                                    </div>


                                    <div class="col-md-4 mb-2">
                                        <button class="btn btn-dark" type="submit">Filter</button>
                                        <a href="admin-manager.php" type="reset" class="btn btn-dark">Reset</a>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- filtering ui end -->

            <!-- scroll to same position when reload. start -->
            <script>
                // Function to save scroll positions
                function saveScrollPositions() {

                    var childScrollPos = document.getElementById('childScroll').scrollTop;

                    localStorage.setItem('childScrollPos', childScrollPos);
                }

                // Function to restore scroll positions
                function restoreScrollPositions() {

                    console.log("Restoring scroll positions...");
                    var childScrollPos = localStorage.getItem('childScrollPos');
                    console.log("Retrieved child scroll position:", childScrollPos);

                    if (childScrollPos !== null) {
                        document.getElementById('childScroll').scrollTop = childScrollPos;
                        console.log("Scroll position restored successfully.");
                    } else {
                        console.log("No scroll position found in localStorage.");
                    }
                }

                // Call the restoreScrollPositions function when the page loads
                window.onload = function() {
                    restoreScrollPositions();
                    hideLoadingOverlay();
                };
            </script>
            <!-- scroll to same position when reload. end -->

            <!-- update user status. start -->
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"]) && isset($_POST["status"])) {
                include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php"; // Include database connection file
                $userId = $_POST["user_id"];
                $status = $_POST["status"];

                // Prepare and execute SQL statement to update payment status
                $sql = "UPDATE user_login SET privilage = '$status' WHERE user_id = '$userId'";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION['response'] = "User status updated successfully."; // Store success message in session
                } else {
                    $_SESSION['response'] = "Error updating user status: " . $conn->error; // Store error message in session
                }

                exit();
            }

            //  updated user Aleart start
            if (isset($_SESSION['response'])) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            ' . $_SESSION['response'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';


                unset($_SESSION['response']);
            }
            //  updated user Aleart end
            ?>
            <!-- update user status. end -->

            <!-- update delete status. start -->
            <?php
            if (isset($_GET["id"])) {

                $id = isset($_GET["id"]) ? $_GET["id"] : '';

                include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";

                $sql = "DELETE FROM `user_login` WHERE user_id = ?";

                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param($stmt, "i", $id);

                $result = mysqli_stmt_execute($stmt);

                $conn->close();


                if ($result) {
                    $_SESSION['delete_response'] = "Data deleted successfully";
                } else {

                    $_SESSION['delete_response'] = "Failed: " . mysqli_stmt_error($stmt);
                }

                // Close the statement
                mysqli_stmt_close($stmt);

                echo "<script>
                                // Clear the query parameters from the URL
                                window.history.replaceState({}, document.title, window.location.pathname);
                         </script>";

                //  Delete Aleart start
                if (isset($_SESSION['delete_response'])) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            ' . $_SESSION['delete_response'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';

                    // Unset the response from session to clear it after displaying
                    unset($_SESSION['delete_response']);
                }
                // delete Aleart end

            }
            ?>
            <!-- update delete status. end -->

            <div class="container-2" id="childScroll" onscroll="saveScrollPositions()">

                <?php

                if ((isset($_GET['name']) || isset($_GET['privilage-status']))) {
                ?>

                    <table class="table table-hover text-center ">

                        <thead class="table-dark">
                            <tr>


                                <th scope="col">User ID</th>



                                <th scope="col">User Name</th>



                                <th scope="col">Email</th>


                                <th scope="col">Privilege</th>





                                <th scope="col" class="col-remove">Delete</th>

                            </tr>
                        </thead>

                        <!-- php filtering start -->

                        <tbody>

                            <?php
                            include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";

                            // Sanitize and validate input values
                            $name = isset($_GET['name']) ? $_GET['name'] : '';
                            $privilageStatus = isset($_GET['privilage-status']) ? $_GET['privilage-status'] : '';

                            // Initialize SQL query
                            $sql = "SELECT * FROM user_login WHERE 1";

                            // Add condition for 'name' if provided
                            if (!empty($name)) {
                                // Sanitize the input to prevent SQL injection
                                $name = mysqli_real_escape_string($conn, $name);
                                $sql .= " AND username LIKE '%$name%'";
                            }

                            // Add condition for 'privilage-status' if provided
                            if (!empty($privilageStatus)) {
                                // Sanitize the input to prevent SQL injection
                                $privilageStatus = mysqli_real_escape_string($conn, $privilageStatus);
                                $sql .= " AND privilage = '$privilageStatus'";
                            }

                            echo $sql;

                            // Execute the SQL query
                            $result = mysqli_query($conn, $sql);
                            $conn->close();
                            // Check if query executed successfully
                            if ($result && mysqli_num_rows($result) > 0) {
                                // Display table header

                                // Fetch and display data
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>

                                        <td>
                                            <?php echo $row["user_id"]; ?>
                                        </td>


                                        <td>
                                            <?php echo $row["username"]; ?>
                                        </td>



                                        <td>
                                            <?php echo $row["email"]; ?>
                                        </td>



                                        <td>
                                            <!-- Form to update payment status -->
                                            <form method="post">
                                                <!-- Hidden input field for fee_id -->
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <div style="display:flex; justify-content:center;">
                                                    <!-- Dropdown to select payment status -->
                                                    <select style="width:200px;" class="form-select payment-form-select" name="status" onchange="updatePaymentStatus(<?php echo $row['user_id']; ?>, this.value)">
                                                        <!-- Option for payment status Not yet -->
                                                        <option value="teacher" <?php echo ($row["privilage"] == 'teacher') ? "selected" : ""; ?>>teacher</option>
                                                        <!-- Option for payment status Paid -->
                                                        <option value="student" <?php echo ($row["privilage"] == 'student') ? "selected" : ""; ?>>student</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </td>


                                        <td class="col-remove"><a href="admin-manager.php?id=<?php echo $row["user_id"]; ?>" class="link-dark" onclick="return confirmDelete();"><i class="fa-solid fa-trash fs-5"></i></a></td>

                                    </tr>

                                <?php }
                            } else { ?>

                                <tr>
                                    <td colspan="15">
                                        <?php echo 'No records found' ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- auto submit and conform delete script start -->
                    <script>
                        function confirmDelete() {
                            return confirm("Are you sure you want to delete this record?");
                        }

                        function updatePaymentStatus(userId, status) {
                            // Create a new XMLHttpRequest object
                            var xhr = new XMLHttpRequest();

                            // Prepare the request
                            xhr.open("POST", "", true); // Use current URL for the request
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                            // Define what happens on successful data submission
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {
                                        // Reload the page upon successful submission
                                        window.location.reload();
                                    } else {
                                        // Log error message to console
                                        console.error("Error updating payment status. Status code: " + xhr.status);
                                    }
                                }
                            };

                            // Send the request
                            xhr.send("user_id=" + userId + "&status=" + status);
                        }
                    </script>
                    <!-- auto submit and conform delete script end -->


                <?php

                } else { ?>



                    <!-- Displaying member fees table -->
                    <table class="table table-hover text-center">
                        <!-- Table headers -->
                        <thead class="table-dark">
                            <tr>
                                <!-- Table column headers -->
                                <th scope="col">User ID </th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Privilege</th>

                                <th scope="col" class="col-remove">Delete</th>
                            </tr>
                        </thead>

                        <!-- Table data -->
                        <tbody>
                            <?php
                            include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";
                            // Select data from member_fees table
                            $sql = "SELECT * FROM `user_login` ORDER BY `user_id` DESC";
                            $result = mysqli_query($conn, $sql);
                            $conn->close();
                            if ($result && mysqli_num_rows($result) > 0) {
                                // Loop through query results
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <!-- Displaying table data -->
                                        <td><?php echo $row["user_id"]; ?></td>
                                        <td><?php echo $row["username"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td>
                                            <!-- Form to update payment status -->
                                            <form method="post">
                                                <!-- Hidden input field for fee_id -->
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <div style="display:flex; justify-content:center;">
                                                    <!-- Dropdown to select payment status -->
                                                    <select style="width:200px;" class="form-select payment-form-select" name="status" onchange="updatePaymentStatus(<?php echo $row['user_id']; ?>, this.value)">
                                                        <!-- Option for payment status Not yet -->
                                                        <option value="teacher" <?php echo ($row["privilage"] == 'teacher') ? "selected" : ""; ?>>teacher</option>
                                                        <!-- Option for payment status Paid -->
                                                        <option value="student" <?php echo ($row["privilage"] == 'student') ? "selected" : ""; ?>>student</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </td>
                                        <!-- Edit and delete buttons -->

                                        <td class="col-remove"><a href="admin-manager.php?id=<?php echo $row['user_id']; ?>" class="link-dark" onclick="return confirmDelete();"><i class="fa-solid fa-trash fs-5"></i></a></td>
                                    </tr>
                                <?php

                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td colspan="15">
                                        <?php echo 'No records found' ?>
                                    </td>
                                </tr>
                            <?php

                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- JavaScript function for auto submit and confirming deletion -->
                    <script>
                        function confirmDelete() {
                            return confirm("Are you sure you want to delete this record?");
                        }

                        // JavaScript function to submit the form asynchronously
                        function updatePaymentStatus(userID, status) {
                            // Create a new XMLHttpRequest object
                            var xhr = new XMLHttpRequest();

                            // Prepare the request
                            xhr.open("POST", "", true); // Use current URL for the request
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                            // Define what happens on successful data submission
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {


                                        // Reload the page upon successful submission
                                        window.location.reload();
                                    } else {
                                        // Log error message to console
                                        console.error("Error updating payment status. Status code: " + xhr.status);
                                    }
                                }
                            };

                            // Send the request
                            xhr.send("user_id=" + userID + "&status=" + status);
                        }
                    </script>

                    <!-- auto submit and conform delete script end -->

                    <!-- php database end -->
                <?php } ?>
            </div>
            <script>

            </script>

        </div>
        <!-- admin-dashbord-end -->


        <!-- Bootstrap js start -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- Bootstrap js end-->

    </div>


</body>

</html>
<?php
// } else {
//     header("Location: ../../../index.php");
// } 
?>