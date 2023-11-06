<?php
include 'config.php';

$successMessage = '';
$errorMessage = '';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    if($password != $cpassword){
        $errorMessage = 'Passwords do not match!';
    } else {
        // Hash the password securely
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if($user_type === 'admin') {
            $admin_code = mysqli_real_escape_string($conn, $_POST['admin_code']);
            // Validate the admin code, for example:
            if($admin_code !== 'Admin023') {
                $errorMessage = 'Invalid Admin Code!';
            } else {
                // Prepare and execute the insert statement for admins table
                $stmt = $conn->prepare("INSERT INTO admins(name, email, password, admin_code) VALUES(?, ?, ?, ?)");
                $stmt->bind_param("ssss", $name, $email, $hashedPassword, $admin_code);

                if($stmt->execute()){
                    $successMessage = 'Registration successful!';
                    header('Location: login_form.php');
                } else {
                    $errorMessage = 'Registration failed. Please try again later.';
                }
                $stmt->close();
            }
        } else {
            // Prepare and execute the insert statement for user_form table
            $stmt = $conn->prepare("INSERT INTO user_form(name, email, password) VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if($stmt->execute()){
                $successMessage = 'Registration successful!';
                header('Location: login_form.php');
            } else {
                $errorMessage = 'Registration failed. Please try again later.';
                
            }
            $stmt->close();
        }
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
<title>Register form</title>

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h3>register now</h3>
        <?php
        if(!empty($errorMessage)){
            echo '<span class="error-msg">'.$errorMessage.'</span>';
        }
        ?>
   <select name="user_type" id="user_type">
   <option value="user">USER</option>
   <option value="admin">ADMIN</option>
</select>

<div id="admin-code-field" style="display: none;">
   <label for="admin_code">Admin Code:</label>
   <input type="text" name="admin_code" id="admin_code" placeholder="Admin Access Code">
</div>
<script>
   const userTypeSelect = document.getElementById('user_type');
   const adminCodeField = document.getElementById('admin-code-field');

   userTypeSelect.addEventListener('change', function() {
      if (this.value === 'admin') {
         adminCodeField.style.display = 'block';
      } else {
         adminCodeField.style.display = 'none';
      }
   });
</script>
   <input type="text" name="name" required placeholder="Enter Your Name">
   <input type="email" name="email" required placeholder="Enter Your E-Mail">
   <input type="password" name="password" required placeholder="Enter Your Password">
   <input type="password" name="cpassword" required placeholder="Confirm Your Password">
   <input type="submit" name="submit" value="register now" class="form-btn">
   <p>Already Have an Account? <a href="login_form.php">Login Now</a></p>
</form>
</div>

</body>
</html>