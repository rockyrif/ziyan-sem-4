<?php
session_start();
if (isset($_SESSION["username"]) && $_SESSION["privilage"] === "admin") {
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/project-holders-project-2/db_conn.php";
$id = $_GET["id"];

if (isset ($_POST["submit"])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone1 = $_POST['phone1'];
  $phone2 = $_POST['phone2'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $member_type = $_POST['member_type'];
  $gender = $_POST['gender'];


  $sql = "UPDATE `members` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone1`='$phone2',`phone1`='$phone2',`date_of_birth`='$dob',`address`='$address',`member_type`='$member_type',`gender`='$gender' WHERE member_id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: admin-dashbord.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- online fonts start -->
  <link href="https://db.onlinewebfonts.com/c/1f182a2cd2b60d5a6ac9667a629fbaae?family=PF+Din+Stencil+W01+Bold"
    rel="stylesheet">
  <!-- online fonts end -->

  <title>ADTC Edit Member</title>
</head>

<body>
  <?php
  include '../../../components/navbar/navbar.php';
  ?>

  <div class="container" style="margin-top:93px;">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/project-holders-project-2/db_conn.php";
    $sql = "SELECT * FROM `members` WHERE member_id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $conn->close();
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="first_name" placeholder="Albert"
              value="<?php echo $row['first_name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="last_name" placeholder="Einstein"
              value="<?php echo $row['last_name'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" placeholder="name@example.com"
            value="<?php echo $row['email'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Phone:</label>
          <input type="text" class="form-control" name="phone2" placeholder="0789642231"
            value="<?php echo $row['phone1'] ?>"><br>
          <input type="text" class="form-control" name="phone1" placeholder="0789642231"
            value="<?php echo $row['phone2'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Date of birth:</label>
          <input type="text" class="form-control" name="dob" placeholder="1999-06-22"
            value="<?php echo $row['date_of_birth'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Address:</label>
          <input type="text" class="form-control" name="address" placeholder="no 3 sahivu road kalmunai-4"
            value="<?php echo $row['address'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label" for="member_type">Member type</label>
          <select class="form-select" name="member_type" id="age">
            <option <?php echo ($row["member_type"] == 'adult') ? "selected" : ""; ?>>Adult</option>
            <option <?php echo ($row["member_type"] == 'child') ? "selected" : ""; ?>>Child</option>
          </select>
        </div>


        <div class="form-group mb-3">
          <label>Gender:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row["gender"] == 'male') ? "checked" : ""; ?>>
          <label for="gender" class="form-input-label">Male</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row["gender"] == 'female') ? "checked" : ""; ?>>
          <label for="gender" class="form-input-label">Female</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="gender" id="transgender" value="trans" <?php echo ($row["gender"] == 'trans') ? "checked" : ""; ?>>
          <label for="gender" class="form-input-label">Transgender</label>
        </div>

        <div class=" mb-3">
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="admin-dashbord.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

</body>

</html>
<?php } else {
    header("Location: ../../../index.php");
} ?>