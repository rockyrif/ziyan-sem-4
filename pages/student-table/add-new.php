<?php
session_start();
// if ((!isset($_SESSION["id"]) && isset($_SESSION["username"])) || $_SESSION["privilage"] == "admin") {
?>

   <?php
   include $_SERVER['DOCUMENT_ROOT'] . "/ziyan-sem-4/db_conn.php";
   if (isset($_POST["submit"])) {
      
      $email = $_SESSION['email'];
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

      
               $sql = "INSERT INTO `students`(`email`,`first_name`, `last_name`, `phone1`,`phone2`, `dob`, `address`, `grade`, `section`, `term`, `gender`) VALUES ('$email','$first_name','$last_name','$phone1','$phone2','$dob','$address','$grade','$section','$term','$gender')";

               if (mysqli_query($conn, $sql)) {
                  $_SESSION['response'] = "student application send for review successfully ";
                  
                  
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

      <title>Gym add</title>
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
                  <div class="col">
                     <label class="form-label">First Name:</label>
                     <input type="text" class="form-control" name="first_name" placeholder="Albert" required>
                  </div>

                  <div class="col">
                     <label class="form-label">Last Name:</label>
                     <input type="text" class="form-control" name="last_name" placeholder="Einstein" required>
                  </div>
               </div>

               <div class="mb-3" style="display:none;">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?= (isset($_SESSION['email'])) ?  $_SESSION["email"] : ''; ?>">
               </div>

               <div class="mb-3">
                  <label class="form-label">Phone:</label>
                  <input type="text" class="form-control" name="phone1" placeholder="0789642231" required><br>
                  <input type="text" class="form-control" name="phone2" placeholder="0789642231 (optional)">
               </div>

               <div class="mb-3">
                  <label class="form-label">Date of birth:</label>
                  <input type="date" class="form-control" name="dob" placeholder="1999-06-22" required>
               </div>

               <div class="mb-3">
                  <label class="form-label">Address:</label>
                  <input type="text" class="form-control" name="address" placeholder="no 3 sahivu road kalmunai-4" required>
               </div>

               <div class="mb-3">
                  <label class="form-label" for="grade">Grade</label>
                  <select class="form-select" name="grade" id="grade" required>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                     <option value="13">13</option>
                  </select>
               </div>

               <div class="mb-3">
                  <label class="form-label" for="section">Section</label>
                  <select class="form-select" name="section" id="section" required>
                     <option value="A">A</option>
                     <option value="B">B</option>
                     <option value="C">C</option>
                     <option value="D">D</option>
                     <option value="E">E</option>
                     <option value="F">F</option>
                     <option value="G">G</option>
                     <option value="H">H</option>
                     <option value="I">I</option>
                     <option value="J">J</option>
                     <option value="K">K</option>
                     <option value="L">L</option>
                     <option value="M">M</option>
                  </select>
               </div>

               <div class="mb-3">
                  <label class="form-label" for="term">Term</label>
                  <select class="form-select" name="term" id="term" required>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                  </select>
               </div>
   

               <div id="schoolInput" class="mb-3" style="display: none;">
                  <label class="form-label" for="school">School</label>
                  <input type="text" class="form-control" name="school" id="school">
               </div>

               <div class="form-group mb-3">
                  <label>Gender:</label>
                  &nbsp;
                  <input type="radio" class="form-check-input" name="gender" id="male" value="male" required>
                  <label for="gender" class="form-input-label">Male</label>
                  &nbsp;
                  <input type="radio" class="form-check-input" name="gender" id="female" value="female" required>
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