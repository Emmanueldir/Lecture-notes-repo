<?php include 'header2.php';
include 'db.php';

$query = "%" . $_GET['query'] . "%";
$sql = $conn->prepare("SELECT * FROM materials WHERE title LIKE ? OR course_code LIKE ? OR semester LIKE ? OR department LIKE ? OR tag LIKE ?");
$sql->bind_param("sssss", $query, $query, $query, $query, $query);
$sql->execute();
$result = $sql->get_result();

echo "<h2>Search Results:</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='margin-bottom:20px'>";
        echo "<strong>Title:</strong> " . htmlspecialchars($row['title']) . "<br>";
        echo "<strong>Course Code:</strong> " . htmlspecialchars($row['course_code']) . "<br>";
        echo "<strong>Semester:</strong> " . htmlspecialchars($row['semester']) . "<br>";
        echo "<strong>Department:</strong> " . htmlspecialchars($row['department']) . "<br>";
        echo "<strong>Year:</strong> " . htmlspecialchars($row['tag']) . "<br>";
        echo "<strong>Description:</strong> " . htmlspecialchars($row['description']) . "<br>"; "<br";
        echo "<a href='download.php?file=" . urlencode($row['filename']) . "'>Download</a>";
        echo "</div>";
    }
} else {
    echo "No materials found";
}

include 'footer.php';
?>
