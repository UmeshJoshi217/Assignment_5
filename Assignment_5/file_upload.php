<?php
class FileUploadException extends Exception {}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] !== UPLOAD_ERR_OK) {
            throw new FileUploadException("No file uploaded or upload error occurred.");
        }

        $fileName = $_FILES['myfile']['name'];
        $tmpName  = $_FILES['myfile']['tmp_name'];

        $allowed = ['jpg', 'png', 'pdf'];
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed)) {
            throw new FileUploadException("Invalid file type. Allowed: JPG, PNG, PDF.");
        }
        $destination = "uploads/" . $fileName;

        if (!move_uploaded_file($tmpName, $destination)) {
            throw new FileUploadException("Failed to save uploaded file.");
        }

        echo "<h3>File uploaded successfully: $fileName</h3>";
    }
} catch (FileUploadException $e) {
    echo "<h3 style='color:red;'>Error: " . $e->getMessage() . "</h3>";
} finally {
    echo "<p>File upload process completed.</p>";
}

?>

<!DOCTYPE html>
<html>

<body>

    <h2>Upload a File</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="myfile" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>

</body>

</html>