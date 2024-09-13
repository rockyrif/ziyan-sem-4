<?php
ob_start();
session_start();

// php mailing header
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

?>
<?php
// if (isset($_SESSION["username"]) && $_SESSION["privilage"] === "admin") { 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>



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
                <P class="" style=" margin-bottom: 0 !important;">SEND MAIL</P>
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


                        <div class="col-md-10">
                            <form action="send-mail.php" method="GET">


                                <div class="row">
                                    <div class="col-md mb-3">
                                        <input type="text" name="grade" value="<?= isset($_GET['grade']) ? $_GET['grade'] : ''; ?>" class="form-control" placeholder="Grade">
                                    </div>

                                    <div class="col-md mb-3">
                                        <input type="text" name="name" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>" class="form-control" placeholder="Name">
                                    </div>


                                    <div class="col-md mb-2">
                                        <select name="application-status" id="" class="form-select">
                                            <option value="">Application Status</option>
                                            <option value="rejected" <?= isset($_GET['application-status']) == true ? ($_GET['application-status'] == 'rejected' ? 'selected' : '') : '' ?>>Rejected</option>
                                            <option value="pending" <?= isset($_GET['application-status']) == true ? ($_GET['application-status'] == 'pending' ? 'selected' : '') : '' ?>>Pending</option>
                                            <option value="approved" <?= isset($_GET['application-status']) == true ? ($_GET['application-status'] == 'approved' ? 'selected' : '') : '' ?>>Approved</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md mb-3">
                                    <input type="text" name="description" value="<?= isset($_GET['description']) ? $_GET['description'] : '' ?>" class="form-control" placeholder="Description eg: Your exam date is 2024-05-03">
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <button class="btn btn-dark" type="submit">Send mail</button>
                                        <a href="student-table.php" type="reset" class="btn btn-dark">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- filtering ui end -->

            <?php
            // Construct the SELECT query based on the selected columns
            $selectQuery = "SELECT *";

            $selectQuery .= " FROM students";

            // Initialize an empty array to store conditions
            $conditions = array();

            // Check each form field for data and construct conditions accordingly
            if (!empty($_GET['grade'])) {
                $conditions[] = "grade = {$_GET['grade']}";
            }

            if (!empty($_GET['name'])) {
                $conditions[] = "(first_name LIKE '%{$_GET['name']}%' OR last_name LIKE '%{$_GET['name']}%')";
            }

            if (!empty($_GET['application-status'])) {
                $conditions[] = "status = '{$_GET['application-status']}'";
            }

            // Include database connection
            include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";

            // Add WHERE clause if conditions are provided

            $sql = $selectQuery . " WHERE " . implode(" AND ", $conditions) . " ORDER BY `id` DESC";
            // echo $sql. "<br>";


            // Execute the SQL query
            $result = mysqli_query($conn, $sql);


            // Check if query executed successfully
            if ($result && mysqli_num_rows($result) > 0) {
                // Display table header
                echo "Below students will get email messages" . "<br><br>";
                // Fetch and display data
                while ($row = mysqli_fetch_assoc($result)) {

                    // Include PHPMailer autoload
                    require '../../PHP-mailer/vendor/autoload.php';

                    $mail = new PHPMailer(true);

                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'ziyanmaleek2001@gmail.com';
                        $mail->Password = 'zpjqxvmhswrzrdhy';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port = 465;

                        // Set custom CA certificates to trust the self-signed certificate
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );

                        $mail->setFrom('ziyanmaleek2001@gmail.com', 'Notice about your exam');
                        $mail->addAddress($row["email"], '');

                        $mail->isHTML(true);
                        $mail->Subject = 'Response to Exam application';
                        $mail->Body    = "Your exam Index is ZCK-2025-" . $row["id"] . "<br>" . $_GET['description'];
                        $mail->AltBody = "";


                        $mail->send();
                        // echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }


                    echo $row["id"] . " ";
                    echo $row["last_name"] . " ";
                    echo $row["email"] . "<br>";

                    // $_SESSION['response'] = "Email sent successfully";  
                    // header("Location: send-mail.php");
                    // exit;
                }
                echo "Email Send successfully" . "<br><br>";
            } else {
                echo "No record found";
            }
            ?>

        </div>
        <!-- admin-dashbord-end -->


        <!-- Bootstrap js start -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- Bootstrap js end-->

    </div>


</body>

</html>
<?php
// Existing code

ob_end_flush(); // End output buffering
?>