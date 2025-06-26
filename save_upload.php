<?php include 'header2.php';
include 'db.php';

$title = $_POST['title'];
$code = $_POST['course_code'];
$desc = $_POST['description'];
$sem = $_POST['semester'];
$dept = $_POST['department'];
$tag = $_POST['tag'];

$file = $_FILES['file'];
$filename = basename($file['name']);
$deptFolder = strtolower(str_replace(' ', '_', $dept));
$semFolder = strtolower(str_replace(' ', '_', $sem));
$uploadPath = "uploads/$deptFolder/$semFolder/";

if (!file_exists($uploadPath)) {
    mkdir($uploadPath, 0777, true);
}

$target = $uploadPath . $filename;
#$target = "uploads/" . $filename;

// Check if the filename already exists in DB
$stmt = $conn->prepare("SELECT * FROM materials WHERE filename = ?");
$stmt->bind_param("s", $filename);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0 && !isset($_POST['confirm_replace'])) {
    echo "A file with the same name already exists.<br><br>";
    echo "<form method='POST' enctype='multipart/form-data'>";
    echo "<input type='hidden' name='title' value='$title'>";
    echo "<input type='hidden' name='year' value='$tag'>";
    echo "<input type='hidden' name='course_code' value='$code'>";
    echo "<input type='hidden' name='description' value='$desc'>";
    echo "<input type='hidden' name='department' value='$dept'>";
    echo "<input type='hidden' name='semester' value='$sem'>";
    echo "<input type='hidden' name='confirm_replace' value='yes'>";
    echo "<input type='file' name='file' required><br><br>";
    echo "<button type='submit'>Replace Existing File</button>";
    echo "</form>";
    exit;
} elseif (isset($_POST['confirm_replace'])) {
    // Delete existing record and file
    $existing = $result->fetch_assoc();
    $existingPath = "uploads/" . $existing['filename'];
    if (file_exists($existingPath)) {
        unlink($existingPath);
    }
    $conn->query("DELETE FROM materials WHERE id = " . $existing['id']);
}

// Upload new file and save to DB
if (move_uploaded_file($file['tmp_name'], $target)) {
    $stmt = $conn->prepare("INSERT INTO materials (title, course_code, description, semester, department, tag, filename) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $title, $code, $desc, $sem, $dept, $tag, $filename);
    $stmt->execute();
    echo "File uploaded successfully.";
    echo "<br><a href='index.php'>Back to Home</a>";
} else {
    echo "File upload failed.";
}
include 'footer.php';
?>
