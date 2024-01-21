# Academic Records Management System

## Overview

The Academic Records Management System is a web-based application designed for efficient management of academic materials within an educational institution. The system caters to three main user roles: Admin, Teacher, and Student, each equipped with specific functionalities to streamline data management.

## Features

### 1. User Authentication

- Users (Admin, Teacher, Student) can securely log in using their email and password.
- User credentials, including email, password, and user type, are stored in the "userdata" table within the "academic_records" database.

### 2. User Roles and Permissions

#### Admin

- **Manage Users:**
  - Add, delete, and modify user details (email, password, type, name).
- **Syllabus Management:**
  - Add, delete, and modify syllabus/subjects.
- **PDF Management:**
  - Upload, delete, and modify PDFs.

#### Teacher

- **PDF Management:**
  - Upload and delete PDFs related to subjects.
  - Access additional private topics.

#### Student

- **PDF Access:**
  - View and download PDFs related to their selected subjects.

### 3. Database Structure

- Three tables: "linksdata," "subjectdata," and "userdata" in the "academic_records" database.

#### linksdata Table

- id
- Year
- Branch
- Type (Admin, Teacher, Student)
- Link (PDF URL)
- Title
- Date
- Faculty_name
- Semester
- Subject

#### subjectdata Table

- Semester
- Branch
- Subject
- Year

#### userdata Table

- sno
- Emailid
- Password
- Type (Admin, Teacher, Student)
- Name

### 4. Subject Selection

- Users can choose the Semester, Year, and Branch to access relevant subjects.

### 5. Subject Information

- Upon selecting a subject, the system displays associated papers, experiment write-ups, etc., stored in the "linksdata" table.

### 6. PDF Management

- Students can view and download PDFs.
- Teachers can upload, delete, and modify PDFs, with additional private topics accessible only to them.

## Getting Started

Follow the steps below to set up and run the Academic Records Management System locally.

1. Clone the repository.
2. Configure the database settings.
3. Run the application.

