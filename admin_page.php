<?php
// Include config.php and start session
include 'config.php';
session_start();

// Check if admin is logged in
if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit();
}

// Retrieve user data from the database
$selectUsers = "SELECT * FROM user_form";
$result = mysqli_query($conn, $selectUsers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Page</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
   <div class="content">
      <h3>Hello, <span>Admin</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['admin_name']; ?></span></h1>
      <p>This is an admin page</p>
      <h2>User Information:</h2>
      <<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Display user data in table rows with modify and delete actions
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='modify_user.php?id={$row['id']}'>Modify</a>
                        <a href='delete_user.php?id={$row['id']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </tbody>
</table>
      <a href="logout.php" class="btn">Logout</a>
   </div>
</div>
</body>
</html>
