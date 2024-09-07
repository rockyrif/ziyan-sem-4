<?php
session_start();
// if ((!isset($_SESSION["id"]) && isset($_SESSION["username"])) || $_SESSION["privilage"] == "admin") {
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";
if (isset($_POST["submit"])) {

   $email = $_POST['email'];
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $phone1 = $_POST['phone1'];
   $phone2 = $_POST['phone2'];
   $dob = $_POST['dob'];
   $address = $_POST['address'];
   $grade = $_POST['grade'];
   $section = $_POST['section'];
   $term = $_POST['term'];
   $gender = $_POST['gender'];


   // Assuming there is an identifier like `id` to specify which student record to update
   $id = $_GET['id']; // Get the ID from the request, make sure to validate and sanitize input

   $sql = "UPDATE `students` 
        SET 
            `email` = '$email',
            `first_name` = '$first_name',
            `last_name` = '$last_name',
            `phone1` = '$phone1',
            `phone2` = '$phone2',
            `dob` = '$dob',
            `address` = '$address',
            `grade` = '$grade',
            `section` = '$section',
            `term` = '$term',
            `gender` = '$gender'
        WHERE `id` = '$id'"; // Make sure `$id` matches the record you want to update

   if (mysqli_query($conn, $sql)) {
      $_SESSION['response'] = "Student application updated successfully.";
   } else {
      $_SESSION['response'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
}
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- online fonts start -->
   <link href="https://db.onlinewebfonts.com/c/1f182a2cd2b60d5a6ac9667a629fbaae?family=PF+Din+Stencil+W01+Bold" rel="stylesheet">
   <!-- online fonts end -->

   <title>Applicaiton</title>
</head>

<body>
   <?php
   include '../../components/navbar/navbar.php';
   ?>

   <div class="container" style="margin-top:93px;">



      <div class="text-center mb-4">
         <h3>Student Application</h3>
         <p class="text-muted">Complete the form below to Apply for the examination</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
            <div class="row mb-3">

              <?php // Include your database connection
               include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";

               // Assuming $id is the student's unique identifier
               $id = $_GET['id']; // Get the student ID from the GET request, ensure to validate and sanitize this input

               // Fetch the student's details
               $sql = "SELECT * FROM students WHERE id = ?";
               $stmt = $conn->prepare($sql);
               $stmt->bind_param('i', $id);
               $stmt->execute();
               $result = $stmt->get_result();
               $student = $result->fetch_assoc(); // Fetch the data as an associative array

               // Close statement and connection
               $stmt->close();
               $conn->close();

               ?>


               <div class="col">
                  <label class="form-label">First Name:</label>
                  <input type="text" class="form-control" name="first_name" placeholder="Albert" required value="<?= htmlspecialchars($student['first_name'] ?? '', ENT_QUOTES); ?>">
               </div>

               <div class="col">
                  <label class="form-label">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" placeholder="Einstein" required value="<?= htmlspecialchars($student['last_name'] ?? '', ENT_QUOTES); ?>">
               </div>
            </div>

            <div class="mb-3" >
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?= htmlspecialchars($student['email'] ?? '', ENT_QUOTES); ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Phone:</label>
               <input type="text" class="form-control" name="phone1" placeholder="0789642231" required value="<?= htmlspecialchars($student['phone1'] ?? '', ENT_QUOTES); ?>"><br>
               <input type="text" class="form-control" name="phone2" placeholder="0789642231 (optional)" value="<?= htmlspecialchars($student['phone2'] ?? '', ENT_QUOTES); ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Date of birth:</label>
               <input type="date" class="form-control" name="dob" placeholder="1999-06-22" required value="<?= htmlspecialchars($student['dob'] ?? '', ENT_QUOTES); ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Address:</label>
               <input type="text" class="form-control" name="address" placeholder="no 3 sahivu road kalmunai-4" required value="<?= htmlspecialchars($student['address'] ?? '', ENT_QUOTES); ?>">
            </div>

            <div class="mb-3">
               <label class="form-label" for="grade">Grade</label>
               <select class="form-select" name="grade" id="grade" required>
                  <?php for ($i = 1; $i <= 13; $i++): ?>
                     <option value="<?= $i; ?>" <?= (isset($student['grade']) && $student['grade'] == $i) ? 'selected' : ''; ?>><?= $i; ?></option>
                  <?php endfor; ?>
               </select>
            </div>

            <div class="mb-3">
               <label class="form-label" for="section">Section</label>
               <select class="form-select" name="section" id="section" required>
                  <?php foreach (range('A', 'M') as $section): ?>
                     <option value="<?= $section; ?>" <?= (isset($student['section']) && $student['section'] == $section) ? 'selected' : ''; ?>><?= $section; ?></option>
                  <?php endforeach; ?>
               </select>
            </div>

            <div class="mb-3">
               <label class="form-label" for="term">Term</label>
               <select class="form-select" name="term" id="term" required>
                  <?php for ($i = 1; $i <= 4; $i++): ?>
                     <option value="<?= $i; ?>" <?= (isset($student['term']) && $student['term'] == $i) ? 'selected' : ''; ?>><?= $i; ?></option>
                  <?php endfor; ?>
               </select>
            </div>

            <div class="form-group mb-3">
               <label>Gender:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="male" value="male" required <?= (isset($student['gender']) && $student['gender'] == 'male') ? 'checked' : ''; ?>>
               <label for="gender" class="form-input-label">Male</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="female" value="female" required <?= (isset($student['gender']) && $student['gender'] == 'female') ? 'checked' : ''; ?>>
               <label for="gender" class="form-input-label">Female</label>
               &nbsp;
            </div>


            <div class="mb-3">
               <button type="submit" class="btn btn-success" name="submit">Apply</button>
               <a href="admin-dashbord.php" class="btn btn-danger ">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
<?php
?>