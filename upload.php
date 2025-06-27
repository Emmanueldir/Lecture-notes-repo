<?php include 'header2.php'; ?>
<h2>Upload Lecture Material</h2>
<form action="save_upload.php" method="POST" enctype="multipart/form-data">
    <label for="title">Course Title: </label><br><input type="text" name="title" placeholder="Title" required><br>
    <label for="course_code">Course code: </label><br><input type="text" name="course_code" placeholder="Course Code" required><br>
    <label for="department">Department: </label><br><input type="text" name="department" placeholder="e.g Computer Science" required><br>
    <label for="semester">Semester: </label><br><input type="text" name="semester" placeholder="e.g Rain or Harmathan" required><br>
    <label for="tag">Year: </label><br><input type="text" name="tag" placeholder="e.g 3rd year" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="file" name="file" required><br>
    <button type="submit">Upload</button>
</form>
<?php include 'footer.php'; ?>
