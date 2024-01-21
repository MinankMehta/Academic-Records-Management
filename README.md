# Academic Records Management System

## Overview

The Academic Records Management System is a web-based application designed for managing academic materials within an educational institution. It facilitates efficient storage, retrieval, and management of PDFs, syllabus details, and user information.

## Features

- **User Authentication:**
  - Admin, Teacher, and Student login with email and password.

- **User Roles:**
  - Admin: Manage users, syllabus, and PDFs.
  - Teacher: Upload and delete PDFs, access private topics.
  - Student: View and download PDFs.

- **Database Structure:**
  - Three tables: linksdata, subjectdata, userdata.

- **Subject Selection:**
  - Choose Semester, Year, and Branch to access subjects.

- **Subject Information:**
  - View papers, experiment write-ups, etc.

- **PDF Management:**
  - Students: View and download PDFs.
  - Teachers: Upload, delete, and modify PDFs.

## Database Structure

### linksdata
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

### subjectdata
- Semester
- Branch
- Subject
- Year

### userdata
- sno
- Emailid
- Password
- Type (Admin, Teacher, Student)
- Name
