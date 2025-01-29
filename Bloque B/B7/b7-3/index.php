<?php
$message = '';                             // Initialize
$moved   = false;                          // Initialize
$allowed_types = ['image/jpeg'];            // Allowed MIME types (only JPEG)
$max_size = 2 * 1024 * 1024;                // Max size: 2MB

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If sent +
    if ($_FILES['image']['error'] === 0) {  // No errors

        // Validate file type
        $file_type = mime_content_type($_FILES['image']['tmp_name']);
        if (!in_array($file_type, $allowed_types)) {
            $message = 'Only JPEG files are allowed.';
        } elseif ($_FILES['image']['size'] > $max_size) {
            // Validate file size
            $message = 'File size exceeds the maximum allowed size of 2MB.';
        } else {
            // Sanitize file name
            $original_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $safe_name = preg_replace('/[^a-zA-Z0-9_-]/', '_', $original_name);
            $path = './var/www/' . $safe_name . '.' . $extension;

            // Avoid overwriting files
            $counter = 1;
            while (file_exists($path)) {
                $path = './var/www/' . $safe_name . "_" . $counter . '.' . $extension;
                $counter++;
            }

            // Move the file and store result in $moved
            $temp = $_FILES['image']['tmp_name'];
            $moved = move_uploaded_file($temp, $path);
        }
    }

    if ($moved === true) { // If move worked, show image
        $message = '<img src="' . $path . '">';
    } elseif (empty($message)) { // Else store generic error message if not set
        $message = 'The file could not be saved.';
    }
}
?>
<?php include 'includes/header.php' ?>
<?= $message ?>
<form method="POST" action="EJ3.php" enctype="multipart/form-data">
  <label for="image"><b>Upload file:</b></label>
  <input type="file" name="image" accept="image/jpeg" id="image"><br>
  <input type="submit" value="upload">
</form>
<?php include 'includes/footer.php' ?>