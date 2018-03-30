 <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$connect = new mysqli($servername, $username, $password,"schedule_mgmt");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 