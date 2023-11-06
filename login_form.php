<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $select = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if(password_verify($password, $row['password'])) {
            if($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                header('location: admin_page.php');
                exit();
            } elseif($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                header('location: user_page.php');
                exit();
            }
        } else {
            $error[] = 'Incorrect email or password!';
        }
    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>Login Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>

      <input type="email" name="email" required placeholder="Enter Your E-Mail">
      <input type="password" name="password" required placeholder="Enter Your Password">
      <select name="user_type" id="user_type">
         <option value="user">USER</option>
         <option value="admin">ADMIN</option>
      </select>
      <div id="admin-code-field">
         <label for="admin_code">Admin Code:</label>
         <input type="text" name="admin_code" id="admin_code">
      </div>
      <script>
      const userTypeSelect = document.getElementById('user_type');
      const adminCodeField = document.getElementById('admin-code-field');

      function showHideAdminCode() {
         if (userTypeSelect.value === 'admin') {
            adminCodeField.style.display = 'block';
         } else {
            adminCodeField.style.display = 'none';
         }
      }

      userTypeSelect.addEventListener('change', showHideAdminCode);
      showHideAdminCode();
      </script>

      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't Have an Account? <a href="register_form.php">Register Now</a></p>
   </form>
</div>

<?php
@include('footer.php');
?>

</body>
</html>
