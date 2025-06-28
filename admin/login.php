<?php
    session_start();

    $admin_username = "admin";
    $admin_password = "admin@123";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === $admin_username && $password === $admin_password) {
            $_SESSION["admin_logged_in"] = true;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Admin Login</h2>
    <form method="POST" class="mx-auto" style="max-width: 400px;">
      <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
      <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</body>
</html>