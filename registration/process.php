<?php
    include '../includes/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $conn->prepare("INSERT INTO registrations 
            (first_name, last_name, email, contact_number, gender, dob, address, country, state, city, 
            pincode, tshirt_size, blood_group, emergency_contact_name, emergency_contact_number, race_category)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssssssssssss",
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email'],
            $_POST['contact_number'],
            $_POST['gender'],
            $_POST['dob'],
            $_POST['address'],
            $_POST['country'],
            $_POST['state'],
            $_POST['city'],
            $_POST['pincode'],
            $_POST['tshirt_size'],
            $_POST['blood_group'],
            $_POST['emergency_contact_name'],
            $_POST['emergency_contact_number'],
            $_POST['race_category']
        );

        if ($stmt->execute()) {
            $full_name = urlencode($_POST['first_name'] . ' ' . $_POST['last_name']);
            header("Location: thankyou.php?name=$full_name");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
        $conn->close();
    }
?>
