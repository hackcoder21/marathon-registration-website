<?php
  session_start();
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  if (!isset($_SESSION['form_submitted']) || $_SESSION['form_submitted'] !== true) {
      header("Location: ../register.php");
      exit;
  }

  $name = isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Participant';

  unset($_SESSION['form_submitted']);
  unset($_SESSION['user_name']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marathon Registration</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
</head>
<body class="bg-light">
  <div class="container text-center mt-5">
    <h1 class="text-success">🎉 Thank You for Registering!</h1>
    <p class="lead mt-3">
      Thank you <code class="bg-light px-2 py-1 border rounded"><?= $name ?></code> 
    </p>
    <p class="lead mt-3">
      We're excited to have you participate in the <strong>Marathon on 3rd August 2025</strong>!
    </p>
    <p>
      You will receive a confirmation email with all the details shortly.
    </p>
    <p>
      For any queries, feel free to contact us. Get ready to run! 🏃‍♂️🏃‍♀️
    </p>
    <a href="../index.html" class="btn btn-primary mt-4">Go Back to Home</a>
  </div>

  <script>
    // Prevent user from going back to form
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
      history.go(1);
    };
  </script>
</body>
</html>