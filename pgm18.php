<html><head>
<title>BOOK DETAILS</title>
</head><body><center>
<h2>BOOK DETAILS</h2>
<!-- FORM TO INSERT BOOK DETAILS -->
<form name="book" action="pgm18.php" method="post">
BOOK ID: <input type="text" name="bid"><br><br>
TITLE: <input type="text" name="title"><br><br>
AUTHORS: <input type="text" name="authors"><br><br>
EDITION: <input type="text" name="edition"><br><br>
PUBLISHER: <input type="text" name="publisher"><br><br>
<input type="submit" name="submit" value="Submit">
</form><br><br>
<form name="search" action="pgm18.php" method="post">
Search by Author: <input type="text" name="sea">
<input type="submit" name="search" value="Search"> </form>
<?php
$conn = mysqli_connect("localhost:3307", "root", "", "mca");
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());}
if (isset($_POST['submit'])) {
$bid = $_POST['bid'];
$title = $_POST['title'];
$authors = $_POST['authors'];
$edition = $_POST['edition'];
$publisher = $_POST['publisher'];
echo "<h3>Entered Details:</h3>";
echo "BOOK ID: $bid<br>";
echo "TITLE: $title<br>";
echo "AUTHORS: $authors<br>";
echo "EDITION: $edition<br>";
echo "PUBLISHER: $publisher<br>";
$insert = "INSERT INTO books (bid, title, authors, edition, publisher)
VALUES ('$bid', '$title', '$authors', '$edition', '$publisher')";
if (mysqli_query($conn, $insert)) {
echo "<br><b>Record Inserted Successfully</b><br>";
} else {
echo "Error: " . mysqli_error($conn); }}
if (isset($_POST['search'])) {
$sea = $_POST['sea'];
$sql = "SELECT * FROM books WHERE authors LIKE '%$sea%'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) == 0) {
echo "<br>No record found.";
} else {
echo "<h3>Search Results</h3>";
echo "<table border='1' cellpadding='5'>
<tr>
<th>Book ID</th>
<th>Title</th>
<th>Authors</th>
<th>Edition</th>
<th>Publisher</th>
</tr>";
while ($row = mysqli_fetch_assoc($res)) {
echo "<tr>
<td>".$row['bid']."</td>
<td>".$row['title']."</td>
<td>".$row['authors']."</td>
<td>".$row['edition']."</td>
<td>".$row['publisher']."</td>
</tr>"; }
echo "</table>"; }}
mysqli_close($conn);
?>
</center></body></html>