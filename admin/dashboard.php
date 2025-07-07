<?php
    include '../includes/db.php';
    include 'auth.php';

    // Pagination variables
    $limit = 6; // records per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $limit;

    // Total number of records
    $total_result = $conn->query("SELECT COUNT(*) AS total FROM registrations");
    $total_row = $total_result->fetch_assoc();
    $total_records = $total_row['total'];
    $total_pages = ceil($total_records / $limit);

    // Fetch records for current page
    $result = $conn->query("SELECT * FROM registrations ORDER BY created_at DESC LIMIT $limit OFFSET $offset");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0">Registered Participants</h2>

      <div class="dropdown">
        <button class="btn border-0 bg-transparent dropdown-toggle" type="button" id="adminMenu" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../assets/images/admin.png" alt="Admin" width="40" height="40" class="rounded-circle">
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminMenu">
          <li><a class="dropdown-item" href="exportcsv.php">Export</a></li>
          <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Pincode</th>
            <th>T-Shirt Size</th>
            <th>Blood Group</th>
            <th>Emergency Contact</th>
            <th>Emergency Phone</th>
            <th>Race Category</th>
            <th>Registered At</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['contact_number']) ?></td>
            <td><?= htmlspecialchars($row['gender']) ?></td>
            <td><?= htmlspecialchars($row['dob']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td><?= htmlspecialchars($row['country']) ?></td>
            <td><?= htmlspecialchars($row['state']) ?></td>
            <td><?= htmlspecialchars($row['city']) ?></td>
            <td><?= htmlspecialchars($row['pincode']) ?></td>
            <td><?= htmlspecialchars($row['tshirt_size']) ?></td>
            <td><?= htmlspecialchars($row['blood_group']) ?></td>
            <td><?= htmlspecialchars($row['emergency_contact_name']) ?></td>
            <td><?= htmlspecialchars($row['emergency_contact_number']) ?></td>
            <td><?= htmlspecialchars($row['race_category']) ?></td>
            <td><?= htmlspecialchars($row['created_at']) ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <!-- Pagination controls -->
      <nav>
        <ul class="pagination justify-content-center">
          <?php if ($page > 1): ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
            </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
              <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
          <?php endfor; ?>

          <?php if ($page < $total_pages): ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
