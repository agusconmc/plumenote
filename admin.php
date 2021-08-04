<?php
  session_start();
  include("connect.php");
  include("function.php");
  include("check_department.php");
  
  $user_data = check_login($link);

  $user_query = "SELECT * FROM users ";
  $departments_query = "SELECT * FROM department";
  $message_query = "SELECT * FROM messages ORDER BY creation_date DESC";

  $users=mysqli_query($link,$user_query);
  $departments = mysqli_query($link,$departments_query);
  $dept_messages = mysqli_query($link,$message_query);
  
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a class="brand" href="index.php"><img src="logo.png" alt="LOGO"></a>
      <div class="nav-items">
        <a class="links" href="logout.php">Log-out</a>
      </div>
    </nav>

    <div class="container">
      <div class="user-records">
        <h2>Users</h2>
        <table>
          <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
          <?php
            while ($row = mysqli_fetch_array($users)){
              $id = $row['id'];
              $ticket = 'other';
              echo "<tr>";
              echo "<td>".$row['gname']." ".$row['fname']."</td>";
              echo "<td>".$row['username']."</td>";
              echo "<td>".$row['email']."</td>";
              echo "<td>".$row['creation_date']."</td>";
              echo "<td><a href='resetpassword.php?item=$id&ticket=$ticket'>Reset password</a></td>";
              echo "</tr>";
            }

           ?>
        </table>
      </div>

      <div class="department-records">
        <h2>Departments</h2>
        <a href="addItem.php">Add Department</a>
        <table>
          <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Messages</th>
            <th>Action</th>
          </tr>
            <?php
                while ($row = mysqli_fetch_array($departments)){
                  $id = $row['id'];
                  $ticket = 'department';
                  $user= $row['dept_username'];
                  echo "<tr>";
                  echo "<td>".$row['dept_name']."</td>";
                  echo "<td>".$row['dept_username']."</td>";
                  echo "<td>".$row['dept_email']."</td>";
                  echo "<td> <a href='view.php?user=$user'>View Records</a> </td>";
                  echo "<td> <a href='resetpassword.php?item=$id&ticket=$ticket'>Reset password</a> </td>";
                  echo "</tr>";
                }
               ?>
        </table>
      </div>

    </div>

  </body>
</html>

