<?php
include 'config.php';

if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    // Retrieve user data based on $userId
    $selectQuery = "SELECT * FROM user_form WHERE id = $userId";
    $result = mysqli_query($conn, $selectQuery);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentName = $row['name'];
        $currentEmail = $row['email'];
        
        // Check if form is submitted
        if(isset($_POST['submit'])) {
            $newName = mysqli_real_escape_string($conn, $_POST['new_name']);
            $newEmail = mysqli_real_escape_string($conn, $_POST['new_email']);
            
            // Perform modification logic
            $updateQuery = "UPDATE user_form SET name = '$newName', email = '$newEmail' WHERE id = $userId";
            
            if(mysqli_query($conn, $updateQuery)) {
                header('location:admin_page.php');
            } else {
                header('location:error_page.php'); // Redirect to error page for failed update
            }
        }
    } else {
        header('location:error_page.php'); // Redirect to error page for invalid user ID
    }
} else {
    header('location:error_page.php'); // Redirect to error page for missing 'id' parameter
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Modify User</title>
   <link rel="stylesheet" href="css/modifystyle.css">
</head>
<body>
<div class="container">
   <div class="content">
      <h2>Modify User</h2>
      <form method="post" action="">
         <label for="new_name">New Name:</label><br>
         <input type="text" id="new_name" name="new_name" value="<?php echo $currentName; ?>" required><br>
         <label for="new_email">New Email:</label><br>
         <input type="email" id="new_email" name="new_email" value="<?php echo $currentEmail; ?>" required><br>
         <input type="submit" name="submit" value="Update" class="btn"><br>
      </form>
      <a href="admin_page.php" class="btn">Cancel</a>
   </div>
</div>
</body>
</html>
