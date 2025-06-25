<?php
$file = $_GET['file'];
$filepath = "uploads/" . $file;

if (file_exists($filepath)) {
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filepath));
    readfile($filepath);
    exit;
} else {
    echo "File not found.";
}
?>
