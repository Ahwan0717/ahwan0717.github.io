<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<title>List of Students in Our Demo Database</title>
<meta name="description" content="List of Students in the Demonstration Database on My 3rd Website" />
</head>
<body>
<h2>Student Demo Page</h2>
<hr />
<?php
  include('database-connect.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,name,email,url,added FROM students";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
echo '<ol>' ;
while($row = $result->fetch_assoc()) {
echo '<li><a href="'.$row["url"].'">'.$row["name"].'</a></li>';

}
echo '</ol>' ;
} else {
echo "0 results";
}
$conn->close();
?>
<hr />
<p><a href="add-student.php">Add a New Student</a></p>
</body>
</html>