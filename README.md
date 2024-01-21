#Academic Records Management System

Introduction:
The Academic Records Management System is a web-based application designed to streamline the management of academic materials, such as papers, experiment write-ups, and syllabus information. The system provides access to three main user types: Admin, Teacher, and Student. Each user type has specific functionalities tailored to their roles, ensuring efficient data management within an educational institution.

Features:

User Authentication:

Users (Admin, Teacher, Student) can log in with their email and password.
User information (email, password, type) is stored in the "userdata" table in the "academic_records" database.
User Roles and Permissions:

Admin:
Add, delete, and modify user details (email, password, type, name).
Add, delete, and modify syllabus/subjects.
Upload, delete, and modify PDFs.
Teacher:
Upload and delete PDFs related to subjects.
Access additional private topics.
Student:
View and download PDFs related to their selected subjects.
Database Structure:

The database "academic_records" consists of three tables: "linksdata," "subjectdata," and "userdata."
linksdata:
id
Year
Branch
Type (Admin, Teacher, Student)
Link (PDF URL)
Title
Date
Faculty_name
Semester
Subject
subjectdata:
Semester
Branch
Subject
Year
userdata:
sno
Emailid
Password
Type (Admin, Teacher, Student)
Name
Subject Selection:

Users can choose the Semester, Year, and Branch to access relevant subjects.
Subject Information:

Upon selecting a subject, the system displays associated papers, experiment write-ups, etc., stored in the "linksdata" table.
PDF Management:

Students can view and download PDFs.
Teachers can upload, delete, and modify PDFs, with additional private topics accessible only to them.
