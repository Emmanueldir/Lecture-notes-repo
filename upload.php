<?php include 'header2.php'; ?>
<h2>Upload Lecture Material</h2>
<form action="save_upload.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" required><br>
    <input type="text" name="course_code" placeholder="Course Code" required><br>
    <input type="text" name="department" placeholder="e.g Computer Science" required><br>
    <input type="text" name="semester" placeholder="e.g Rain or Harmathan" required><br>
    <input type="text" name="tag" placeholder="e.g 3rd year" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="file" name="file" required><br>
    <button type="submit">Upload</button>
</form>
<?php include 'footer.php'; ?>
