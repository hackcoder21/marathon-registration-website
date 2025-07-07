<?php
    include '../includes/db.php';

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="participants.csv"');

    $output = fopen('php://output', 'w');

    // Column headers
    fputcsv($output, ['ID', 'Name', 'Email', 'Phone', 'Gender', 'DOB', 'Address', 'Country', 'State', 'City', 'Pincode', 'T-Shirt Size', 'Blood Group', 'Emergency Contact Name', 'Emergency Contact Number', 'Race Category', 'Registered At']);

    // Fetch data
    $query = $conn->query("SELECT * FROM registrations ORDER BY created_at DESC");

    while ($row = $query->fetch_assoc()) {
        fputcsv($output, [
            $row['id'],
            $row['first_name'] . ' ' . $row['last_name'],
            $row['email'],
            $row['contact_number'],
            $row['gender'],
            $row['dob'],
            $row['address'],
            $row['country'],
            $row['state'],
            $row['city'],
            $row['pincode'],
            $row['tshirt_size'],
            $row['blood_group'],
            $row['emergency_contact_name'],
            $row['emergency_contact_number'],
            $row['race_category'],
            $row['created_at']
        ]);
    }

    fclose($output);
exit;
