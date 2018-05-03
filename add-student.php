<!DOCTYPE html>
<head>
<title>Add A Student</title>
<meta name="description" content="Form to add a new student to our database" />
</head>
<body>

<h2>Add A New Student</h2>

<?php
include('database-connect.php');

if(isset($_POST['add']))
{

$conn = mysql_connect($servername, $username, $password, $dbname );
if(! $conn )
{
die('Could not connect: ' . mysql_error());
}

if(! get_magic_quotes_gpc() )
{
$student_name = addslashes ($_POST['student_name']);
$student_email_address = addslashes ($_POST['student_email_address']);
}
else
{
$student_name = $_POST['student_name'];
$student_email_address = $_POST['student_email_address'];
}
$student_website = $_POST['student_website'];

$sql = "INSERT INTO students". "(name,email, url, added) ". "VALUES('$student_name','$student_email_address','$student_website', NOW())";
mysql_select_db($dbname);
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
die('Could not enter data: ' . mysql_error());
}
echo '<a href="students.php">Student Info Entered Successfully</a>!';
mysql_close($conn);
}
else
{
?>
<form method="post" action="add-student.php">
<table style="width:300px;padding:10px">
<tr>
<td style="width:100px">Student Name</td>
<td><input name="student_name" type="text" id="student_name" /></td>
</tr>
<tr>
<td style="width:100px">Email Address</td>
<td><input name="student_email_address" type="text" id="student_email_address" /></td>
</tr>
<tr>
<td style="width:100px">Website</td>
<td><input name="student_website" type="text" id="student_website" /></td>
</tr>
<tr>
<td style="width:100px"></td>
<td> </td>
</tr>
<tr>
<td style="width:100px"></td>
<td>
<input name="add" type="submit" id="add" value="Add Student" />
</td>
</tr>
</table>
</form>
<a href="students.php">Students Page</a>
<?php
}
?>
</body>
</html>