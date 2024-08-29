<?php
session_start();

if (!$_SESSION["loggedin"] === true) {
    header("location:../login-and-signup-page/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit items</title>



    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="print.css">

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
        include '../../../components/navbar/navbar.php';
        ?>
        <!-- Navbar end -->

        <!-- admin-dashbord-start -->
        <div class="admin-dashbord container">

            <div class="admin-dashbord-tittle">
                <P class="" data-aos="fade-up" data-aos-duration="2000">Item list</P>

            </div>

            <!-- AOS script start -->
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>
                AOS.init();
            </script>
            <!-- AOS script end-->

            <!-- Notification start -->
            <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            ?>
            <!-- Notification end -->

            <!-- filtering ui start -->
            <div class="row mb-2 mt-1 filter-section">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <a href="add-new.php" class="btn btn-dark">Add New</a>
                        </div>

                        <div class="col-md-6">
                            <form action="admin-dashbord.php" method="GET">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="item-id" value="<?= isset($_GET['item-id']) ? $_GET['item-id'] : ''; ?>" class="form-control" placeholder="item id">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="item-name" value="<?= isset($_GET['item-name']) ? $_GET['item-name'] : '' ?>" class="form-control" placeholder="Name">
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <button class="btn btn-dark" type="submit">Filter</button>
                                        <a href="admin-dashbord.php" type="reset" class="btn btn-dark">Reset</a>
                                        <button class="btn btn-dark" onclick="window.print();">Print</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
            <!-- filtering ui end -->



            <!-- Table start -->
            <div class="container-2">
                <table class="table table-hover text-center ">
                    <!-- Table Heading start -->
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Electronic status</th>
                            <th scope="col">Purchase date</th>
                            <th scope="col">In store status</th>
                            <th scope="col">Handler</th>
                            <th scope="col" class="col-remove">Edit</th>
                            <th scope="col" class="col-remove">Delete</th>
                        </tr>
                    </thead>
                    <!-- Table Heading End -->

                    <!-- php filtering start -->
                    <?php
                    if (isset($_GET['item-id']) || isset($_GET['item-name'])) {
                    ?>
                        <tbody>
                            <?php
                            // Include database connection


                            // Initialize an empty array to store conditions
                            $conditions = array();

                            // Check each form field for data and construct conditions accordingly
                            if (!empty($_GET['item-id'])) {
                                $conditions[] = "item_id = {$_GET['item-id']}";
                            }

                            if (!empty($_GET['item-name'])) {
                                $conditions[] = "(item_name LIKE '%{$_GET['item-name']}%')";
                            }



                            include "db_conn.php";

                            // Construct the SQL query
                            $sql = "SELECT * FROM `ati-store`";

                            // Add WHERE clause if conditions are provided
                            if (!empty($conditions)) {
                                $sql = $sql . " WHERE " . implode(" AND ", $conditions);
                            }

                            // Execute the SQL query
                            $result = mysqli_query($conn, $sql);

                            mysqli_close($conn);

                            // Check if query executed successfully
                            if ($result && mysqli_num_rows($result) > 0) {
                                // Display table header


                                // Fetch and display data
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $row["item_id"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["item_name"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["quantity"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["status"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["electonic_status"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["purchase_date"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["in_store_status"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["handler"]; ?>
                                        </td>

                                        <td class="col-remove"><a href="edit.php?id=<?php echo $row["item_id"]; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5"></i></a></td>
                                        <td class="col-remove"><a href="delete.php?id=<?php echo $row["item_id"]; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a></td>
                                    </tr>
                                <?php
                                }
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

                        <!-- php filtering end -->
                    <?php

                    } else { ?>

                        <!-- php database start -->
                        <tbody>
                            <?php
                            include "db_conn.php";
                            $sql = "SELECT * FROM `ati-store`";
                            $result = mysqli_query($conn, $sql);
                            mysqli_close($conn);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>

                                    <td>
                                        <?php echo $row["item_id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["item_name"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["quantity"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["status"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["electonic_status"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["purchase_date"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["in_store_status"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["handler"]; ?>
                                    </td>


                                    <td>
                                        <a href="edit.php?id=<?php echo $row["item_id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 "></i></a>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?php echo $row["item_id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                                    </td>

                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                        <!-- php database end -->
                    <?php } ?>
                </table>
                <!-- Table end -->
            </div>





        </div>
        <!-- admin-dashbord-end -->


        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </div>


</body>

</html>