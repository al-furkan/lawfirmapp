<!-- <?php
// $path = $_SERVER['DOCUMENT_ROOT'];
// require_once $path . "/adminpanal-1/attendence/database/db.php";
// $dbo = new Database();

// // Function to create a table and handle errors
// function createTable($dbo, $query, $tableName) {
//     $stmt = $dbo->con->prepare($query);
//     try {
//         $stmt->execute();
//         echo("<br>{$tableName} created");
//     } catch (PDOException $e) {
//         echo("<br>{$tableName} not created: " . $e->getMessage());
//     }
// }

// // student_details table
// $createStudentDetails = "
//     CREATE TABLE IF NOT EXISTS student_details(
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         roll VARCHAR(255) UNIQUE,
//         name VARCHAR(255)
//     )";
// createTable($dbo, $createStudentDetails, "student_details");

// // course_details table
// $createCourseDetails = "
//     CREATE TABLE IF NOT EXISTS course_details(
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         code VARCHAR(255) UNIQUE,
//         title VARCHAR(255),
//         credit INT
//     )";
// createTable($dbo, $createCourseDetails, "course_details");

// // faculty_details table
// $createFacultyDetails = "
//     CREATE TABLE IF NOT EXISTS faculty_details(
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         user_name VARCHAR(255) UNIQUE,
//         name VARCHAR(255),
//         password VARCHAR(255)
//     )";
// createTable($dbo, $createFacultyDetails, "faculty_details");

// // session_details table
// $createSessionDetails = "
//     CREATE TABLE IF NOT EXISTS session_details(
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         year INT,
//         term VARCHAR(50),
//         UNIQUE(year, term)
//     )";
// createTable($dbo, $createSessionDetails, "session_details");

// // course_registration table
// $createCourseRegistration = "
//     CREATE TABLE IF NOT EXISTS course_registration(
//         student_id INT,
//         course_id INT,
//         session_id INT,
//         PRIMARY KEY(student_id, course_id, session_id)
//     )";
// createTable($dbo, $createCourseRegistration, "course_registration");

// // course_allotment table
// $createCourseAllotment = "
//     CREATE TABLE IF NOT EXISTS course_allotment(
//         faculty_id INT,
//         course_id INT,
//         session_id INT,
//         PRIMARY KEY(faculty_id, course_id, session_id)
//     )";
// createTable($dbo, $createCourseAllotment, "course_allotment");

// // attendance_details table
// $createAttendanceDetails = "
//     CREATE TABLE IF NOT EXISTS attendance_details(
//         faculty_id INT,
//         course_id INT,
//         session_id INT,
//         student_id INT,
//         on_date DATE,
//         PRIMARY KEY(faculty_id, course_id, session_id, student_id, on_date)
//     )";
// createTable($dbo, $createAttendanceDetails, "attendance_details");
?> -->



<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/adminpanal-1/attendence/database/db.php";
$dbo = new Database();

// Function to insert data into a table and handle errors
function insertData($dbo, $query, $params, $tableName) {
    $stmt = $dbo->con->prepare($query);
    try {
        $stmt->execute($params);
        echo("<br>Data inserted into {$tableName}");
    } catch (PDOException $e) {
        echo("<br>Data not inserted into {$tableName}: " . $e->getMessage());
    }
}

// Insert data into student_details
$insertStudentDetails = "
    INSERT INTO student_details (roll, name) 
    VALUES (:roll, :name)";
$params = [
    ':roll' => '1001',
    ':name' => 'John Doe'
];
insertData($dbo, $insertStudentDetails, $params, "student_details");

// Insert data into course_details
$insertCourseDetails = "
    INSERT INTO course_details (code, title, credit) 
    VALUES (:code, :title, :credit)";
$params = [
    ':code' => 'CS101',
    ':title' => 'Introduction to Computer Science',
    ':credit' => 3
];
insertData($dbo, $insertCourseDetails, $params, "course_details");

// Insert data into faculty_details
$insertFacultyDetails = "
    INSERT INTO faculty_details (user_name, name, password) 
    VALUES (:user_name, :name, :password)";
$params = [
    ':user_name' => 'jdoe',
    ':name' => 'Jane Doe',
    ':password' => password_hash('secret', PASSWORD_DEFAULT)
];
insertData($dbo, $insertFacultyDetails, $params, "faculty_details");

// Insert data into session_details
$insertSessionDetails = "
    INSERT INTO session_details (year, term) 
    VALUES (:year, :term)";
$params = [
    ':year' => 2023,
    ':term' => 'Fall'
];
insertData($dbo, $insertSessionDetails, $params, "session_details");

// Insert data into course_registration
$insertCourseRegistration = "
    INSERT INTO course_registration (student_id, course_id, session_id) 
    VALUES (:student_id, :course_id, :session_id)";
$params = [
    ':student_id' => 1,  // Replace with actual student_id
    ':course_id' => 1,   // Replace with actual course_id
    ':session_id' => 1   // Replace with actual session_id
];
insertData($dbo, $insertCourseRegistration, $params, "course_registration");

// Insert data into course_allotment
$insertCourseAllotment = "
    INSERT INTO course_allotment (faculty_id, course_id, session_id) 
    VALUES (:faculty_id, :course_id, :session_id)";
$params = [
    ':faculty_id' => 1,  // Replace with actual faculty_id
    ':course_id' => 1,   // Replace with actual course_id
    ':session_id' => 1   // Replace with actual session_id
];
insertData($dbo, $insertCourseAllotment, $params, "course_allotment");

// Insert data into attendance_details
$insertAttendanceDetails = "
    INSERT INTO attendance_details (faculty_id, course_id, session_id, student_id, on_date) 
    VALUES (:faculty_id, :course_id, :session_id, :student_id, :on_date)";
$params = [
    ':faculty_id' => 1,  // Replace with actual faculty_id
    ':course_id' => 1,   // Replace with actual course_id
    ':session_id' => 1,  // Replace with actual session_id
    ':student_id' => 1,  // Replace with actual student_id
    ':on_date' => '2023-09-01'
];
insertData($dbo, $insertAttendanceDetails, $params, "attendance_details");

?>

