
# 📚 Lecture Notes Repository

A simple web-based repository built with PHP and MySQL that allows users to upload, search, and download lecture notes by year, department, course code, and semester.

---

## 🌟 Features

- Upload lecture materials (PDF, DOCX, etc.)
- Search for notes by **title**, **course code**, **year**, or **department**
- Download lecture materials easily
- Files organized in `/uploads/` by **department/semester**
- Clean and simple UI with HTML + CSS

---

## 🛠 Technologies Used

- **PHP** (Backend)
- **MySQL** (Database)
- **HTML/CSS** (Frontend)
- **XAMPP** or **InfinityFree** (for local or live hosting)

---

## 🧱 Database Schema

Table: `materials`

```sql
CREATE TABLE materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    year VARCHAR(100),
    course_code VARCHAR(50),
    description TEXT,
    department VARCHAR(100),
    semester VARCHAR(50),
    filename VARCHAR(255),
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🚀 How to Run Locally

### 1. Clone or Download the Project

```bash
git clone https://github.com/your-username/lecture-notes-repo.git
```

Or manually extract it to your web server root (e.g., `htdocs/` in XAMPP).

### 2. Create the Database

- Go to `http://localhost/phpmyadmin`
- Create a database named `lecture_repo`
- Import the table above into it

### 3. Configure Database Connection

In `db.php`, update your database credentials:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lecture_repo";
```

### 4. Start the Server

Using XAMPP:
- Start **Apache** and **MySQL**
- Visit: `http://localhost/lecture_repo`

---

## 📂 Project Structure

```
lecture_repo/
├── index.php           # Homepage with search
├── upload.php          # Upload form
├── save_upload.php     # Handles file upload
├── search.php          # Displays search results
├── download.php        # Downloads selected file
├── db.php              # Database connection
├── header.php          # Shared header (HTML + nav)
├── footer.php          # Shared footer
├── style.css           # Simple CSS styling
└── uploads/            # Stores uploaded files
        └──sub folder
            └──sub dolder

```

---

## 📌 Future Improvements

- Add user authentication (admin-only uploads)
- Pagination for search results
- Filter by department or semester
- Tagging or rating system for documents
- Upload preview or document type icons

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

## Credits

Built by Emmanuel ❤️  
Inspired by GitHub repositories like `NoteRepo`, `KingsGambitLab`, and others.
