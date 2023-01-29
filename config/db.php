<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "php-crud-blog");

// Check connection
if (mysqli_connect_errno()) {
 // Connection failed
 echo "Failed to connect to MySQL " . mysqli_connect_errno();
}
