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
        <title>Edit members</title>



        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="print.css" media="print">

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
                    <P class="" style=" margin-bottom: 0 !important;">MEMBERS</P>
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
                </div>
                <!-- Tittle end -->

                <!-- AOS script start -->
                <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                <script>
                    AOS.init();
                </script>
                <!-- AOS script end-->

                <!-- Aleart start -->
                <?php
                if (isset($_SESSION['response'])) {

                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ' . $_SESSION['response'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';

                    unset($_SESSION['response']);
                }
                ?>
                <!-- Aleart end -->

                <!-- filtering ui start -->
                <div class="row mb-2 mt-1 filter-section">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-2 mb-2">
                                <a href="add-new.php" class="btn btn-dark">Add New</a>
                            </div>

                            <div class="col-md-10">
                                <form action="admin-dashbord.php" method="GET">
                                    <div class="row container mb-3">
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`id_prefix`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`id_prefix`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                ID Prefix
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`slta_member_id`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`slta_member_id`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                SLTA Member ID
                                            </label>
                                        </div>
                                        <!-- <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`member_id`"
                                                name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`member_id`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                ID
                                            </label>
                                        </div> -->
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`first_name`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`first_name`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                First Name
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`last_name`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`last_name`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Last Name
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`email`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`email`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Email
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`phone1`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`phone1`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Phone1
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`phone2`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`phone2`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Phone2
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`date_of_birth`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`date_of_birth`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                DOB
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`address`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`address`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Address
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`member_type`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`member_type`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Member Type
                                            </label>
                                        </div>
                                        <div class="form-check col-md">
                                            <input class="form-check-input" type="checkbox" value="`occupation`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`occupation`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Occupation
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`school`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`school`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                School
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`gender`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`gender`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Gender
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`profile_url`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`profile_url`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Profile Picture
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`proof_url`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`proof_url`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Pyament proof
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`payment_status`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`proof_url`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Payment status
                                            </label>
                                        </div>
                                        <div class="form-check col-md-4">
                                            <input class="form-check-input" type="checkbox" value="`registration_date`" name="column[]" id="flexCheckIndeterminate" <?= (isset($_GET['column']) && in_array('`registration_date`', $_GET['column'])) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                Reg Date
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md mb-3">
                                            <input type="text" name="member-id" value="<?= isset($_GET['member-id']) ? $_GET['member-id'] : ''; ?>" class="form-control" placeholder="Member id">
                                        </div>

                                        <div class="col-md mb-3">
                                            <input type="text" name="name" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>" class="form-control" placeholder="Name">
                                        </div>

                                        <div class="col-md mb-2">
                                            <select name="member-type" id="" class="form-select">
                                                <option value="">Member type</option>
                                                <option value="adult" <?= isset($_GET['member-type']) == true ? ($_GET['member-type'] == 'adult' ? 'selected' : '') : '' ?>>Adult</option>
                                                <option value="child" <?= isset($_GET['member-type']) == true ? ($_GET['member-type'] == 'child' ? 'selected' : '') : '' ?>>Child</option>

                                            </select>
                                        </div>

                                        <div class="col-md mb-2">
                                            <select name="payment-status" id="" class="form-select">
                                                <option value="">Payment Status</option>
                                                <option value="rejected" <?= isset($_GET['payment-status']) == true ? ($_GET['payment-status'] == 'rejected' ? 'selected' : '') : '' ?>>Rejected</option>
                                                <option value="pending" <?= isset($_GET['payment-status']) == true ? ($_GET['payment-status'] == 'pending' ? 'selected' : '') : '' ?>>Pending</option>
                                                <option value="approved" <?= isset($_GET['payment-status']) == true ? ($_GET['payment-status'] == 'child' ? 'selected' : '') : '' ?>>Approved</option>
                                            </select>
                                        </div>

                                        <div class="col-md mb-2">
                                            <select name="month" id="" class="form-select">
                                                <option value="">Reg Month</option>
                                                <option value="01" <?= isset($_GET['month']) == true ? ($_GET['month'] == '01' ? 'selected' : '') : '' ?>>January</option>
                                                <option value="02" <?= isset($_GET['month']) == true ? ($_GET['month'] == '02' ? 'selected' : '') : '' ?>>February</option>
                                                <option value="03" <?= isset($_GET['month']) == true ? ($_GET['month'] == '03' ? 'selected' : '') : '' ?>>March</option>
                                                <option value="04" <?= isset($_GET['month']) == true ? ($_GET['month'] == '04' ? 'selected' : '') : '' ?>>April</option>
                                                <option value="05" <?= isset($_GET['month']) == true ? ($_GET['month'] == '05' ? 'selected' : '') : '' ?>>May</option>
                                                <option value="06" <?= isset($_GET['month']) == true ? ($_GET['month'] == '06' ? 'selected' : '') : '' ?>>June</option>
                                                <option value="07" <?= isset($_GET['month']) == true ? ($_GET['month'] == '07' ? 'selected' : '') : '' ?>>July</option>
                                                <option value="08" <?= isset($_GET['month']) == true ? ($_GET['month'] == '08' ? 'selected' : '') : '' ?>>August</option>
                                                <option value="09" <?= isset($_GET['month']) == true ? ($_GET['month'] == '09' ? 'selected' : '') : '' ?>>September</option>
                                                <option value="10" <?= isset($_GET['month']) == true ? ($_GET['month'] == '10' ? 'selected' : '') : '' ?>>October</option>
                                                <option value="11" <?= isset($_GET['month']) == true ? ($_GET['month'] == '11' ? 'selected' : '') : '' ?>>November</option>
                                                <option value="12" <?= isset($_GET['month']) == true ? ($_GET['month'] == '12' ? 'selected' : '') : '' ?>>December</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <button class="btn btn-dark" type="submit">Filter</button>
                                            <a href="admin-dashbord.php" type="reset" class="btn btn-dark">Reset</a>
                                            <button class="btn btn-dark print-btn" onclick="window.print();">Print</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- filtering ui end -->

                <!-- update payment status. start -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["member_id"]) && isset($_POST["status"])) {
                    include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php"; // Include database connection file
                    $memberId = $_POST["member_id"];
                    $status = $_POST["status"];

                    // Prepare and execute SQL statement to update payment status
                    $sql = "UPDATE members SET payment_status = '$status' WHERE member_id = '$memberId'";

                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['response'] = "Payment status updated successfully."; // Store success message in session
                    } else {
                        $_SESSION['response'] = "Error updating payment status: " . $conn->error; // Store error message in session
                    }

                    exit();
                }
                ?>
                <!-- update payment status. end -->

                <!-- scroll to same position when reload. start -->
                <script>
                    // Function to save scroll positions
                    function saveScrollPositions() {
                        var childScrollPosTop = document.getElementById('childScroll').scrollTop;
                        var childScrollPosLeft = document.getElementById('childScroll').scrollLeft;

                        localStorage.setItem('childScrollPosTop', childScrollPosTop);
                        localStorage.setItem('childScrollPosLeft', childScrollPosLeft);
                    }

                    // Function to restore scroll positions
                    function restoreScrollPositions() {
                        console.log("Restoring scroll positions...");
                        var childScrollPosTop = localStorage.getItem('childScrollPosTop');
                        var childScrollPosLeft = localStorage.getItem('childScrollPosLeft');

                        console.log("Retrieved child scroll positions - Top:", childScrollPosTop, "Left:", childScrollPosLeft);

                        if (childScrollPosTop !== null && childScrollPosLeft !== null) {
                            document.getElementById('childScroll').scrollTop = childScrollPosTop;
                            document.getElementById('childScroll').scrollLeft = childScrollPosLeft;
                            console.log("Scroll positions restored successfully.");
                        } else {
                            console.log("No scroll positions found in localStorage.");
                        }
                    }

                    // Call the restoreScrollPositions function when the page loads
                    window.onload = function() {
                        restoreScrollPositions();
                        hideLoadingOverlay();
                    };
                </script>
                <!-- scroll to same position when reload. end -->


                <div class="container-2" id="childScroll" onscroll="saveScrollPositions()">
                    <?php

                    if ((isset($_GET['member-id']) || isset($_GET['name']) || isset($_GET['member-type']) || isset($_GET['month'])) && isset($_GET['column'])) {
                    ?>
                        <table class="table table-hover text-center ">

                            <thead class="table-dark">
                                <tr>
                                    <?php
                                    if (isset($_GET['column']) && in_array('`id_prefix`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">ID Prefix</th>
                                    <?php
                                    }
                                    ?>


                                    <th scope="col">Member ID</th>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`slta_member_id`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">SLTA Member ID</th>
                                    <?php
                                    }
                                    ?>


                                    <?php
                                    if (isset($_GET['column']) && in_array('`first_name`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">First Name</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`last_name`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Last Name</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`email`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Email</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`phone1`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Phone1</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`phone2`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Phone2</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`date_of_birth`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">DOB</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`address`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Address</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`member_type`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Member Type</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`occupation`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Occupation</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`school`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">School</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`gender`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Gender</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`profile_url`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Profile Pic</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`proof_url`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Payment Proof</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`payment_status`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Status</th>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_GET['column']) && in_array('`registration_date`', $_GET['column'])) {
                                    ?>
                                        <th scope="col">Reg Date</th>
                                    <?php
                                    }
                                    ?>

                                    <th scope="col" class="col-remove">Edit</th>

                                    <th scope="col" class="col-remove">Delete</th>

                                </tr>
                            </thead>

                            <!-- php filtering start -->

                            <tbody>

                                <?php
                                // Fetch the selected columns from the form
                                $selectedColumns = isset($_GET['column']) ? $_GET['column'] : '';
                                // Check if $selectedColumns is set and is an array

                                // Construct the SELECT query based on the selected columns
                                $selectQuery = "SELECT `member_id`,";
                                $selectQuery .= implode(',', $selectedColumns);
                                $selectQuery .= " FROM members";

                                // Initialize an empty array to store conditions
                                $conditions = array();

                                // Check each form field for data and construct conditions accordingly
                                if (!empty($_GET['member-id'])) {
                                    $conditions[] = "member_id = {$_GET['member-id']}";
                                }

                                if (!empty($_GET['name'])) {
                                    $conditions[] = "(first_name LIKE '%{$_GET['name']}%' OR last_name LIKE '%{$_GET['name']}%')";
                                }

                                if (!empty($_GET['member-type'])) {
                                    $conditions[] = "member_type = '{$_GET['member-type']}'";
                                }

                                if (!empty($_GET['month'])) {
                                    $conditions[] = "MONTH(registration_date) = '{$_GET['month']}'";
                                }

                                if (!empty($_GET['payment-status'])) {
                                    $conditions[] = "payment_status = '{$_GET['payment-status']}'";
                                }

                                // Include database connection
                                include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";

                                // Add WHERE clause if conditions are provided

                                $sql = $selectQuery . " WHERE " . implode(" AND ", $conditions) . " ORDER BY `member_id` DESC";



                                // Execute the SQL query
                                $result = mysqli_query($conn, $sql);


                                // Check if query executed successfully
                                if ($result && mysqli_num_rows($result) > 0) {
                                    // Display table header

                                    // Fetch and display data
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <?php
                                            if (isset($_GET['column']) && in_array('`id_prefix`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["id_prefix"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>



                                            <td>
                                                <?php echo $row["member_id"]; ?>
                                            </td>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`slta_member_id`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["slta_member_id"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>



                                            <?php
                                            if (isset($_GET['column']) && in_array('`first_name`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["first_name"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>


                                            <?php
                                            if (isset($_GET['column']) && in_array('`last_name`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["last_name"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`email`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["email"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`phone1`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["phone1"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`phone2`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["phone2"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`date_of_birth`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["date_of_birth"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`address`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["address"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`member_type`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["member_type"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`occupation`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["occupation"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`school`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["school"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`gender`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["gender"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`profile_url`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <a href="../../../<?php echo $row["profile_url"]; ?>">view</a>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`proof_url`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <a href="../../../<?php echo $row["proof_url"]; ?>">view</a>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`payment_status`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <!-- Form to update payment status -->
                                                    <form method="post">
                                                        <!-- Hidden input field for fee_id -->
                                                        <input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>">
                                                        <div style="display:flex; justify-content:center;">
                                                            <!-- Dropdown to select payment status -->
                                                            <select style="width:200px;" class="form-select payment-form-select <?php echo ($row["payment_status"]) ?>" name="status" onchange="updatePaymentStatus(<?php echo $row['member_id']; ?>, this.value)">
                                                                <!-- Option for payment status Not yet -->
                                                                <option value="rejected" class="rejected" <?php echo ($row["payment_status"] == 'rejected') ? "selected" : ""; ?>>Rejected</option>
                                                                <!-- Option for payment status Paid -->
                                                                <option value="approved" class="approved" <?php echo ($row["payment_status"] == 'approved') ? "selected" : ""; ?>>Approved</option>
                                                                <!-- Option for payment status Paid -->
                                                                <option value="pending" class="pending" <?php echo ($row["payment_status"] == 'pending') ? "selected" : ""; ?>>Pending</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if (isset($_GET['column']) && in_array('`registration_date`', $_GET['column'])) {
                                            ?>
                                                <td>
                                                    <?php echo $row["registration_date"]; ?>
                                                </td>
                                            <?php
                                            }
                                            ?>

                                            <td class="col-remove"><a href="edit.php?id=<?php echo $row["member_id"]; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5"></i></a></td>

                                            <td class="col-remove"><a href="delete.php?id=<?php echo $row["member_id"]; ?>" class="link-dark" onclick="return confirmDelete();"><i class="fa-solid fa-trash fs-5"></i></a></td>

                                            <script>
                                                function confirmDelete() {
                                                    return confirm("Are you sure you want to delete this record?");
                                                }

                                                // JavaScript function to submit the form asynchronously
                                                function updatePaymentStatus(memberId, status) {
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
                                                    xhr.send("member_id=" + memberId + "&status=" + status);
                                                }
                                            </script>
                                        </tr>

                                    <?php }
                                } else { ?>

                                    <tr>
                                        <td colspan="15">
                                            <?php echo 'No records found' ?>
                                        </td>
                                    </tr>
                                <?php
                                    $conn->close();
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- php filtering end -->
                    <?php

                    } else { ?>

                        <table class="table table-hover text-center ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID Prefix</th>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">SLTA Member ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone1</th>
                                    <th scope="col">Phone2</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Member Type</th>
                                    <th scope="col">Occupation</th>
                                    <th scope="col">School</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Profile Pic</th>
                                    <th scope="col">Payment proof</th>
                                    <th scope="col">Status</th> 
                                    <th scope="col">Reg Date</th>
                                    <th scope="col" class="col-remove">Edit</th>
                                    <th scope="col" class="col-remove">Delete</th>
                                </tr>
                            </thead>

                            <!-- php database start -->

                            <tbody>
                                <?php
                                include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";
                                $sql = "SELECT * FROM `members` ORDER BY `member_id` DESC";
                                $result = mysqli_query($conn, $sql);
                                mysqli_close($conn);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $row["id_prefix"]; ?>
                                        </td>

                                        <td>
                                            <?php echo $row["member_id"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["slta_member_id"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["first_name"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["last_name"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["email"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["phone1"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["phone2"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["date_of_birth"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["address"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["member_type"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["occupation"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["school"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["gender"] ?>
                                        </td>
                                        <td>
                                            <a href="../../../<?php echo $row["profile_url"] ?>">View</a>
                                        </td>
                                        <td>
                                            <a href="../../../<?php echo $row["proof_url"] ?>">View</a>
                                        </td>
                                        <td>
                                            <!-- Form to update payment status -->
                                            <form method="post">
                                                <!-- Hidden input field for fee_id -->
                                                <input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>">
                                                <div style="display:flex; justify-content:center;">
                                                    <!-- Dropdown to select payment status -->
                                                    <select style="width:200px;" class="form-select payment-form-select <?php echo ($row["payment_status"]) ?>" name="status" onchange="updatePaymentStatus(<?php echo $row['member_id']; ?>, this.value)">
                                                        <!-- Option for payment status Not yet -->
                                                        <option value="rejected" class="rejected" <?php echo ($row["payment_status"] == 'rejected') ? "selected" : ""; ?>>Rejected</option>
                                                        <!-- Option for payment status Paid -->
                                                        <option value="approved" class="approved" <?php echo ($row["payment_status"] == 'approved') ? "selected" : ""; ?>>Approved</option>
                                                        <!-- Option for payment status Paid -->
                                                        <option value="pending" class="pending" <?php echo ($row["payment_status"] == 'pending') ? "selected" : ""; ?>>Pending</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </td>
                                        
                                        <td>
                                            <?php echo $row["registration_date"] ?>
                                        </td>


                                        <td class="col-remove">
                                            <a href="edit.php?id=<?php echo $row["member_id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 "></i></a>
                                        </td>
                                        <td class="col-remove">
                                            <a href="delete.php?id=<?php echo $row["member_id"] ?>" class="link-dark" onclick="return confirmDelete();"><i class="fa-solid fa-trash fs-5"></i></a>
                                        </td>

                                        <script>
                                            function confirmDelete() {
                                                return confirm("Are you sure you want to delete this record?");
                                            }

                                            // JavaScript function to submit the form asynchronously
                                            function updatePaymentStatus(memberId, status) {
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
                                                xhr.send("member_id=" + memberId + "&status=" + status);
                                            }
                                        </script>

                                    </tr>

                                <?php

                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- php database end -->
                    <?php } ?>

                </div>





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