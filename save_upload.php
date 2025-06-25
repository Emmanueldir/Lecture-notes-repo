<?php include 'header.php';
include 'db.php';

$title = $_POST['title'];
$code = $_POST['course_code'];
$desc = $_POST['description'];
$sem = $_POST['semester'];
$dept = $_POST['department'];
$tag = $_POST['tag'];

$file = $_FILES['file'];
$filename = basename($file['name']);
$target = "uploads/" . $filename;

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
