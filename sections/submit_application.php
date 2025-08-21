<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data safely
    $fullname         = $conn->real_escape_string($_POST['fullname']);
    $id_number        = $conn->real_escape_string($_POST['id_number']);
    $email            = $conn->real_escape_string($_POST['email']);
    
    // Get international phone (E.164 format from intl-tel-input)
    $phone            = $conn->real_escape_string($_POST['phone_full']);
    
    $programme        = $conn->real_escape_string($_POST['programme']);
    $proposal_title   = $conn->real_escape_string($_POST['proposal_title']);
    $abstract         = $conn->real_escape_string($_POST['abstract']);

    // Handle file upload
    $proposal_file = NULL;
    if (isset($_FILES['proposal_file']) && $_FILES['proposal_file']['error'] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = time() . "_" . basename($_FILES["proposal_file"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["proposal_file"]["tmp_name"], $targetFile)) {
            $proposal_file = $fileName;
        }
    }

    // Insert into DB
    $sql = "INSERT INTO applications 
            (fullname, id_number, email, phone, programme, proposal_title, abstract, proposal_file) 
            VALUES 
            ('$fullname', '$id_number', '$email', '$phone', '$programme', '$proposal_title', '$abstract', '$proposal_file')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Application Submitted Successfully ✅</h2>";
        echo "<p>Thank you, $fullname. Your application has been received.</p>";
        echo "<p><strong>Contact Number (saved):</strong> $phone</p>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
