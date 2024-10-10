<?php
require("../config/connection.php");
// Database connection parameters

// Query to count the number of records in a table
$sql_student = "SELECT COUNT(*) as total_records FROM student";
$sql_department = "SELECT COUNT(*) as total_records FROM department";
$sql_course = "SELECT COUNT(*) as total_records FROM course";
$sql_instructor = "SELECT COUNT(*) as total_records FROM instructor";

$result_student = $conn->query($sql_student);
$result_department = $conn->query($sql_department);
$result_course = $conn->query($sql_course);
$result_instructor = $conn->query($sql_instructor);


$total_student = $result_student->fetch_assoc()['total_records'];
$total_department = $result_department->fetch_assoc()['total_records'];
$total_course = $result_course->fetch_assoc()['total_records'];
$total_instructor = $result_instructor->fetch_assoc()['total_records'];


?>