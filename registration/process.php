<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../includes/PHPMailer/PHPMailer.php';
    require '../includes/PHPMailer/SMTP.php';
    require '../includes/PHPMailer/Exception.php';
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
            $mail = new PHPMailer(true);

            try {
                // SMTP Configuration
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; // or your SMTP host
                $mail->SMTPAuth   = true;
                $mail->Username   = 'hackcoder21@gmail.com'; // replace with your Gmail
                $mail->Password   = 'kfyw jvev bahc qbyg';    // use App Password (not Gmail password)
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                // Sender and recipient
                $mail->setFrom('hackcoder21@gmail.com', 'Marathon Team');
                $mail->addAddress($_POST['email'], $_POST['first_name'] . ' ' . $_POST['last_name']);

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'Thank You for Registering!';
                $mail->Body    = "
                    <h3>Hi {$_POST['first_name']} {$_POST['last_name']},</h3>
                    <p>Thank you for registering for the <strong>Marathon on 3rd August 2025</strong>!</p>
                    <p>We’ve received your registration and will send you more information soon.</p>
                    <p>Get ready to run! 🏃‍♂️🏃‍♀️</p>
                    <br><p>– Marathon Team</p>
                ";

                $mail->send();
                // echo "Email sent successfully.";
            } catch (Exception $e) {
                // echo "Email could not be sent. Error: {$mail->ErrorInfo}";
            }

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
