<?php
  session_start();
  
  if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
      unset($_SESSION['form_submitted']);
      header("Location: thankyou.php");
      exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Marathon Registration</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <!-- Navbar -->
    <?php include '../includes/navbar.php'; ?>

    <main-register>
      <div class="container">
        <h2 class="text-center mb-4">Marathon Registration Form</h2>
        <form action="process.php" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-2">
                <label for="first_name" class="form-label">First Name</label>
                <input
                  type="text"
                  id="first_name"
                  name="first_name"
                  class="form-control mb-2"
                  placeholder="First Name"
                  required
                />
              </div>

              <div class="mb-2">
                <label for="last_name" class="form-label">Last Name</label>
                <input
                  type="text"
                  id="last_name"
                  name="last_name"
                  class="form-control mb-2"
                  placeholder="Last Name"
                  required
                />
              </div>
              
              <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="form-control mb-2"
                  placeholder="Email"
                  required
                />
              </div>

              <div class="mb-2">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input
                  type="tel"
                  id="contact_number"
                  name="contact_number"
                  class="form-control mb-2"
                  placeholder="Contact Number"
                  required
                />
              </div>
              
              <div class="mb-2">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-control mb-2" required>
                  <option value="">Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Prefer not to say</option>
                  <option>Other</option>
                </select>
              </div>
              
              <div class="mb-2">
                <label for="dob" class="form-label">Date of Birth</label>
                <input
                  type="date"
                  id="dob"
                  name="dob"
                  class="form-control mb-2"
                  placeholder="Date of Birth"
                  required
                />
              </div>
              
              <div class="mb-2">
                <label for="address" class="form-label">Address</label>
                <textarea
                  name="address"
                  id="address"
                  class="form-control mb-2"
                  placeholder="Address"
                  required
                ></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="md-2">
                <label for="country" class="form-label">Country</label>
                <input
                  type="text"
                  id="country"
                  name="country"
                  class="form-control mb-2"
                  placeholder="Country"
                  required
                />
              </div>
              
              <div class="md-2">
                <label for="state" class="form-label">State</label>
                <input
                  type="text"
                  id="state"
                  name="state"
                  class="form-control mb-2"
                  placeholder="State"
                  required
                />
              </div>
              
              <div class="md-2">
                <label for="city" class="form-label">City</label>
                <input
                  type="text"
                  id="city"
                  name="city"
                  class="form-control mb-2"
                  placeholder="City"
                  required
                />
              </div>
              
              <div class="md-2">
                <label for="pincode" class="form-label">Pincode</label>
                <input
                  type="text"
                  id="pincode"
                  name="pincode"
                  class="form-control mb-2"
                  placeholder="Pincode"
                  required
                />
              </div>
              
              <div class="md-2">
                <label for="tshirt_size" class="form-label">T-Shirt Size</label>
                <select name="tshirt_size" class="form-control mb-2" required>
                  <option value="">T-Shirt Size</option>
                  <option>XS</option>
                  <option>S</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                  <option>XXL</option>
                  <option>Other</option>
                </select>
              </div>
              
              <div class="md-2">
                <label for="blood_group" class="form-label">Blood Group</label>
                <select name="blood_group" class="form-control mb-2" required>
                  <option value="">Blood Group</option>
                  <option>A+</option>
                  <option>A-</option>
                  <option>B+</option>
                  <option>B-</option>
                  <option>AB+</option>
                  <option>AB-</option>
                  <option>O+</option>
                  <option>O-</option>
                </select>
              </div>
              
              <div class="md-2">
                <label for="emergency_contact_name" class="form-label">Emergency Contact Name</label>
                <input
                  type="text"
                  id="emergency_contact_name"
                  name="emergency_contact_name"
                  class="form-control mb-2"
                  placeholder="Emergency Contact Name"
                  required
                />
              </div>
              
              <div class="md-2">
                <label for="emergency_contact_number" class="form-label">Emergency Contact Number</label>
                <input
                  type="text"
                  id="emergency_contact_number"
                  name="emergency_contact_number"
                  class="form-control mb-2"
                  placeholder="Emergency Contact Number"
                  required
                />
              </div>
              
              <div class="md-2">
                <label for="race_category" class="form-label">Race Category</label>
                <select name="race_category" class="form-control mb-2" required>
                  <option value="">Select Race Category</option>
                  <option>2 kms</option>
                  <option>5 kms</option>
                  <option>10 kms</option>
                  <option>21 kms</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary shadow mt-3">Register</button>
        </form>
        <div id="result"></div>
      </div>
    </main-register>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
